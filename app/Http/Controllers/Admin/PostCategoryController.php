<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCategory\StorePostCategoryRequest;
use App\Http\Requests\Admin\PostCategory\UpdatePostCategoryRequest;
use App\Repositories\PostCategoryRepository;
use Exception;

class PostCategoryController extends Controller
{
    private $postCategoryRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function index()
    {
        $categories = $this->postCategoryRepository->paginate();
        return view('admin.posts.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.posts.categories.create');
    }

    public function store(StorePostCategoryRequest $request)
    {
        try {
            $this->postCategoryRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('postsCategories.create');
    }

    public function edit($id)
    {
        $category = $this->postCategoryRepository->findById($id);
        return view('admin.posts.categories.edit', compact('category'));
    }

    public function update(UpdatePostCategoryRequest $request, $id)
    {
        try {
            $this->postCategoryRepository->update($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('postsCategories.edit', $id);
    }

    public function destroy($id)
    {
        try {
            $category = $this->postCategoryRepository->findById($id);
            $category->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('postsCategories.index');
    }
}
