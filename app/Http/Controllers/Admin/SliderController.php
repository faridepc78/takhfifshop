<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\StoreSliderRequest;
use App\Http\Requests\Admin\Slider\UpdateSliderRequest;
use App\Repositories\SliderRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function index()
    {
        $sliders = $this->sliderRepository->paginate();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(StoreSliderRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $slider = $this->sliderRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'sliders', null)->id;
                $this->sliderRepository->addImage($image_id, $slider->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('sliders.create');
    }

    public function edit($id)
    {
        $slider = $this->sliderRepository->findById($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $slider = $this->sliderRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->sliderRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'sliders', null)->id;
                    $this->sliderRepository->addImage($image_id, $slider->id);
                    if ($slider->image) {
                        $slider->image->delete();
                    }
                } else {
                    $this->sliderRepository->update($request, $slider->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('sliders.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $slider = $this->sliderRepository->findById($id);

                if ($slider->image) {
                    $slider->image->delete();
                }

                $slider->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('sliders.index');
    }
}
