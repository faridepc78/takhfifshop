<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\StoreBannerRequest;
use App\Http\Requests\Admin\Banner\UpdateBannerRequest;
use App\Repositories\BannerRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    private $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function index()
    {
        $banners = $this->bannerRepository->paginate();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(StoreBannerRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $banner = $this->bannerRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'banners', null)->id;
                $this->bannerRepository->addImage($image_id, $banner->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('banners.create');
    }

    public function edit($id)
    {
        $banner = $this->bannerRepository->findById($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(UpdateBannerRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $banner = $this->bannerRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->bannerRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'banners', null)->id;
                    $this->bannerRepository->addImage($image_id, $banner->id);
                    if ($banner->image) {
                        $banner->image->delete();
                    }
                } else {
                    $this->bannerRepository->update($request, $banner->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('banners.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $banner = $this->bannerRepository->findById($id);

                if ($banner->image) {
                    $banner->image->delete();
                }

                $banner->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('banners.index');
    }
}
