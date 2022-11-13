<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\Show\ShowCategoryRequest;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $paginate = request()->input('paginate');

        if (isset($paginate) && $paginate >= 10 && $paginate <= 100) {
            $categories = $this->categoryRepository->paginate($paginate);
        } else {
            $categories = $this->categoryRepository->paginate();
        }

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $getParents = $this->categoryRepository->getParents();
        return view('admin.categories.create', compact('getParents'));
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $category = $this->categoryRepository->store($request);
                if ($request->exists('image')) {
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'categories', null)->id;
                    $this->categoryRepository->addImage($image_id, $category->id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('categories.create');
    }

    public function show($id)
    {
        $category = $this->categoryRepository->findById($id);

        if ($category['level'] == 1 || $category['level'] == 2) {
            $categories = $this->categoryRepository->getSubs($category['id']);
            return view('admin.categories.show', compact('categories', 'category'));
        } else {
            abort(404);
        }
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->findById($id);
        $getParents = $this->categoryRepository->getParents();
        return view('admin.categories.edit', compact('category', 'getParents'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $category = $this->categoryRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->categoryRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'categories', null)->id;
                    $this->categoryRepository->addImage($image_id, $category->id);
                    if ($category->image) {
                        $category->image->delete();
                    }
                } else {
                    $this->categoryRepository->update($request, $category->image_id, $id);
                }

            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('categories.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $category = $this->categoryRepository->findById($id);

                if ($category['level'] == 1) {
                    if (count($category->sub)) {
                        newFeedback('پیام', 'این دسته بندی دارای زیر دسته است لطفا ابتدا زیر دسته ها را حذف کنید', 'warning');
                        return redirect()->route('categories.index');
                    } else {
                        $category->delete();
                        DB::commit();
                        newFeedback();
                        return redirect()->route('categories.index');
                    }
                }

                if ($category['level'] == 2) {
                    if (count($category->sub)) {
                        newFeedback('پیام', 'این دسته بندی دارای زیر دسته است لطفا ابتدا زیر دسته ها را حذف کنید', 'warning');
                        return redirect()->route('categories.index');
                    } else {
                        $category->delete();
                        DB::commit();
                        newFeedback();
                        return redirect()->route('categories.show', $category->parent->id);
                    }
                }

                if ($category['level'] == 3) {
                    $category->delete();
                    DB::commit();
                    newFeedback();
                    return redirect()->route('categories.show', $category->parent->id);
                }
            });
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('categories.index');
    }

    public function index_show()
    {
        $categories = $this->categoryRepository->getParents();
        $getShow = $this->categoryRepository->getShow();
        $array_selectShowCategories = $getShow->pluck('category_id')->toArray();
        return view('admin.categories.show.index',
            compact('categories', 'getShow', 'array_selectShowCategories'));
    }

    public function store_show(ShowCategoryRequest $request)
    {
        try {
            $this->categoryRepository->storeShow($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('categories.index_show');
    }

    public function destroy_show($id)
    {
        try {
            $showCategory = $this->categoryRepository->findShowById($id);
            $showCategory->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('categories.index_show');
    }
}
