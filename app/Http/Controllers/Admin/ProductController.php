<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\Excel\ImportRequest;
use App\Http\Requests\Admin\Product\Gallery\GalleryRequest;
use App\Http\Requests\Admin\Product\Media\MediaRequest;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Imports\ProductsImport;
use App\Models\Product;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ExcelMediaRepository;
use App\Repositories\GroupRepository;
use App\Repositories\ProductRepository;
use App\Services\Media\MediaFileService;
use Exception;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    private $brandRepository;
    private $excelMediaRepository;
    private $groupRepository;

    public function __construct(ProductRepository    $productRepository,
                                CategoryRepository   $categoryRepository,
                                BrandRepository      $brandRepository,
                                ExcelMediaRepository $excelMediaRepository,
                                GroupRepository      $groupRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->excelMediaRepository = $excelMediaRepository;
        $this->groupRepository = $groupRepository;
    }

    public function index()
    {
        $paginate = request()->input('paginate');

        if (isset($paginate) && $paginate >= 10 && $paginate <= 100) {
            $products = $this->productRepository->paginateByFilters($paginate);
        } else {
            $products = $this->productRepository->paginateByFilters();
        }

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getParents();
        $brands = $this->brandRepository->getAll();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(StoreProductRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $product = $this->productRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'products', null)->id;
                $this->productRepository->addImage($image_id, $product->id);
                if ($request->hasFile('pdf')) {
                    $pdf_id = MediaFileService::publicUpload($request->file('pdf'),
                        'products', null)->id;
                    $this->productRepository->addPdf($pdf_id, $product->id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.create');
    }

    public function edit($id)
    {
        $product = $this->productRepository->findById($id);
        $categories = $this->categoryRepository->getParents();
        $brands = $this->brandRepository->getAll();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $product = $this->productRepository->findById($id);

                if ($request->hasFile('image')) {
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'products', null)->id;

                    $this->productRepository->addImage($image_id, $product->id);

                    if ($product->image) {
                        if (!$this->excelMediaRepository->checkMediaId($product->image->id)) {
                            $product->image->delete();
                        }
                    }
                }

                if ($request->hasFile('pdf')) {
                    $pdf_id = MediaFileService::publicUpload($request->file('pdf'),
                        'products', null)->id;

                    $this->productRepository->addPdf($pdf_id, $product->id);

                    if ($product->pdf) {
                        if (!$this->excelMediaRepository->checkMediaId($product->pdf->id)) {
                            $product->pdf->delete();
                        }
                    }
                }

                $product->refresh();

                $this->productRepository->update($request, $product->image_id, $product->pdf_id, $id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.edit', $id);
    }

    public function deleteItem($id)
    {
        $product = $this->productRepository->findById($id);

        if ($product->image) {
            if (!$this->excelMediaRepository->checkMediaId($product->image->id)) {
                $product->image->delete();
            }
        }

        if ($product->pdf) {
            if (!$this->excelMediaRepository->checkMediaId($product->pdf->id)) {
                $product->pdf->delete();
            }
        }

        if (count($product->gallery)) {
            foreach ($product->gallery as $gallery) {
                $gallery->image->delete();
            }
        }

        $product->delete();
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $this->deleteItem($id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.index');
    }

    public function destroy_all(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                if ($request->exists('id')) {
                    $ids = $request->id;
                    if (count($ids) <= 50) {
                        foreach ($ids as $id) {
                            $this->deleteItem($id);
                        }
                    } else {
                        newFeedback('پیام', 'حداکثر تعداد آیتم انتخابی 50 عدد است', 'error');
                    }
                } else {
                    newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }

        return redirect()->route('products.index');
    }

    public function active_all(Request $request)
    {
        try {
            if ($request->exists('id')) {
                $ids = $request->id;
                if (count($ids) <= 50) {
                    foreach ($ids as $id) {
                        $product = $this->productRepository->findById($id);
                        if ($product['status'] == Product::INACTIVE) {
                            $this->productRepository->updateStatus($id, Product::ACTIVE);
                        }
                    }
                } else {
                    newFeedback('پیام', 'حداکثر تعداد آیتم انتخابی 50 عدد است', 'error');
                }
            } else {
                newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
            }
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }

        return redirect()->route('products.index');
    }

    public function inactive_all(Request $request)
    {
        try {
            if ($request->exists('id')) {
                $ids = $request->id;
                if (count($ids) <= 50) {
                    foreach ($ids as $id) {
                        $product = $this->productRepository->findById($id);
                        if ($product['status'] == Product::ACTIVE) {
                            $this->productRepository->updateStatus($id, Product::INACTIVE);
                        }
                    }
                } else {
                    newFeedback('پیام', 'حداکثر تعداد آیتم انتخابی 50 عدد است', 'error');
                }
            } else {
                newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
            }
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }

        return redirect()->route('products.index');
    }

    public function import_page()
    {
        $groups = $this->groupRepository->getAll();
        return view('admin.products.exel.import', compact('groups'));
    }

    public function import(ImportRequest $request)
    {
        try {
            $group = $this->groupRepository->findById($request->group_id);

            $result = $this->productRepository->checkByGroupId($group['id']);

            if ($result == 0) {
                Excel::import(new ProductsImport(), $request->file('file'));
                $excel_id = MediaFileService::publicUpload($request->file('file'),
                    'excels', $group->name)->id;
                $this->groupRepository->addExcel($excel_id, $group['id']);
            } else {

                $rows = Excel::toArray(new ProductsImport, $request->file('file'));
                foreach ($rows[0] as $key => $row) {
                    $values[] =
                        [
                            'name' => $row[0],
                            'slug' => str_slug_persian($row[1]),
                            'category_id' => $row[2],
                            'brand_id' => $row[3],
                            'image_id' => $row[4],
                            'pdf_id' => $row[5],
                            'price' => $row[6],
                            'discount' => $row[7],
                            'text' => $row[8],
                            'count' => $row[9],
                            'status' => $row[10],
                            'group_id' => $row[11],
                            'code' => $row[12]
                        ];

                    $this->productRepository->updateOrCreateByCode($row[12], $group['id'], $key, $values);
                }

                if ($group->excel) {
                    $group->excel->delete();
                }

                $path = glob(public_path('uploads/excels/' . $group->name . '/*'));
                foreach ($path as $value) {
                    if (is_file($value)) {
                        unlink($value);
                    }
                }

                $excel_id = MediaFileService::publicUpload($request->file('file'),
                    'excels', $group->name)->id;
                $this->groupRepository->addExcel($excel_id, $group['id']);
            }

            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.import_page');
    }

    public function export()
    {
        try {
            return Excel::download(new ProductsExport(), 'products.xlsx');
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('products.import_page');
    }

    public function media_index($id)
    {
        $product = $this->productRepository->findById($id);
        $media = $this->productRepository->findMediaByProductId($id);
        return view('admin.products.media.index', compact('product', 'media'));
    }

    public function media_store(MediaRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request) {
                $product = $this->productRepository->storeMedia($request);
                $media_id = MediaFileService::publicUpload($request->file('media'),
                    'products/media', null)->id;
                $this->productRepository->addMedia($media_id, $product->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('product_media_index', $id);
    }

    public function media_destroy($id, $media_id)
    {
        try {
            DB::transaction(function () use ($media_id) {
                $media = $this->productRepository->findMediaById($media_id);

                if ($media->media) {
                    $media->media->delete();
                }

                $media->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('product_media_index', $id);
    }

    public function gallery_index($id)
    {
        $product = $this->productRepository->findById($id);
        $gallery = $this->productRepository->findGalleryByProductId($id);
        return view('admin.products.gallery.index', compact('product', 'gallery'));
    }

    public function gallery_store(GalleryRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request) {
                $product = $this->productRepository->storeGallery($request);
                $media_id = MediaFileService::publicUpload($request->file('image'),
                    'products/gallery', null)->id;
                $this->productRepository->addImageGallery($media_id, $product->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('product_gallery_index', $id);
    }

    public function gallery_destroy($id, $media_id)
    {
        try {
            DB::transaction(function () use ($media_id) {
                $gallery = $this->productRepository->findGalleryById($media_id);

                if ($gallery->image) {
                    $gallery->image->delete();
                }

                $gallery->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('product_gallery_index', $id);
    }
}
