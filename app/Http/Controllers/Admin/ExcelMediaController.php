<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExcelMedia\StoreExcelMediaRequest;
use App\Http\Requests\Admin\ExcelMedia\UpdateExcelMediaRequest;
use App\Repositories\ExcelMediaRepository;
use App\Repositories\ProductRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class ExcelMediaController extends Controller
{
    private $excelMediaRepository;
    private $productRepository;

    public function __construct(ExcelMediaRepository $excelMediaRepository,
                                ProductRepository    $productRepository)
    {
        $this->excelMediaRepository = $excelMediaRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $excel_media = $this->excelMediaRepository->paginateByFilters();
        return view('admin.excel_media.index', compact('excel_media'));
    }

    public function create()
    {
        return view('admin.excel_media.create');
    }

    public function store(StoreExcelMediaRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $excel_media = $this->excelMediaRepository->store($request);
                $media_id = MediaFileService::publicUpload($request->file('media'),
                    'excel_media', null)->id;
                $this->excelMediaRepository->addMedia($media_id, $excel_media->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('excel_media.create');
    }

    public function edit($id)
    {
        $excel_media = $this->excelMediaRepository->findById($id);
        return view('admin.excel_media.edit', compact('excel_media'));
    }

    public function update(UpdateExcelMediaRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $excel_media = $this->excelMediaRepository->findById($id);

                $checkImageIdForOthers = $this->productRepository->checkImageIdForOthers($excel_media['media_id']);

                if ($request->hasFile('media')) {
                    $this->excelMediaRepository->update($request, null, $id);
                    $media_id = MediaFileService::publicUpload($request->file('media'),
                        'excel_media', null)->id;
                    $this->excelMediaRepository->addMedia($media_id, $excel_media->id);

                    if ($checkImageIdForOthers <= 1) {
                        if ($excel_media->media) {
                            $excel_media->media->delete();
                        }
                    }
                } else {
                    $this->excelMediaRepository->update($request, $excel_media->media_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('excel_media.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $excel_media = $this->excelMediaRepository->findById($id);

                $checkImageIdForOthers = $this->productRepository->checkImageIdForOthers($excel_media['media_id']);

                if ($checkImageIdForOthers <= 1) {
                    if ($excel_media->media) {
                        $excel_media->media->delete();
                    }
                    $excel_media->delete();

                    newFeedback();
                } else {
                    newFeedback('پیام', 'این مدیا در محصولات اکسلی استفاده شده است', 'warning');
                }
            });
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('excel_media.index');
    }
}
