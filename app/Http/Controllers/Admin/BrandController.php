<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreBrandRequest;
use App\Http\Requests\Admin\Brand\UpdateBrandRequest;
use App\Repositories\BrandRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    private $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $brands = $this->brandRepository->paginate();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $brand = $this->brandRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'brands', null)->id;
                $this->brandRepository->addImage($image_id, $brand->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('brands.create');
    }

    public function edit($id)
    {
        $brand = $this->brandRepository->findById($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $brand = $this->brandRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->brandRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'brands', null)->id;
                    $this->brandRepository->addImage($image_id, $brand->id);
                    if ($brand->image) {
                        $brand->image->delete();
                    }
                } else {
                    $this->brandRepository->update($request, $brand->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('brands.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $brand = $this->brandRepository->findById($id);

                if ($brand->image) {
                    $brand->image->delete();
                }

                $brand->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('brands.index');
    }
}
