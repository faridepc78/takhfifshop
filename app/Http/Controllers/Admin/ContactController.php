<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Repositories\ContactUsRepository;
use Exception;

class ContactController extends Controller
{
    private $contactUsRepository;

    public function __construct(ContactUsRepository $contactUsRepository)
    {
        $this->contactUsRepository = $contactUsRepository;
    }

    public function index()
    {
        $contacts = $this->contactUsRepository->paginate();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function single($id)
    {
        $contact = $this->contactUsRepository->findById($id);

        try {
            if ($contact['type'] == ContactUs::UNREAD) {
                $this->contactUsRepository->updateType($contact['id']);
                $contact->refresh();
                return view('admin.contacts.single', compact('contact'));
            } else {
                return view('admin.contacts.single', compact('contact'));
            }
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
    }
}
