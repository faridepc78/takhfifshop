<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Profile\ProfileRequest;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = Auth::user();
        return view('panel.profile.index', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        try {
            $this->userRepository->update($request, Auth::id());

            if (!empty($request->get('password'))) {
                $this->userRepository->updatePassword($request->get('password'), Auth::id());
            }
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('user.profile');
    }
}
