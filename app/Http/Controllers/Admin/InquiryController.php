<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Repositories\InquiryRepository;
use Exception;

class InquiryController extends Controller
{
    private $inquiryRepository;

    public function __construct(InquiryRepository $inquiryRepository)
    {
        $this->inquiryRepository = $inquiryRepository;
    }

    public function index()
    {
        $inquiries = $this->inquiryRepository->paginate();
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function single($id)
    {
        $inquiry = $this->inquiryRepository->findById($id);

        try {
            if ($inquiry['type'] == Inquiry::UNREAD) {
                $this->inquiryRepository->updateType($inquiry['id']);
                $inquiry->refresh();
                return view('admin.inquiries.single', compact('inquiry'));
            } else {
                return view('admin.inquiries.single', compact('inquiry'));
            }
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
    }
}
