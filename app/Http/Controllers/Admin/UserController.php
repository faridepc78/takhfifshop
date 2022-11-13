<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Repositories\UserRepository;
use Exception;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->paginate();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $this->userRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('users.create');
    }

    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $this->userRepository->update($request, $id);

            if (!empty($request->get('password'))) {
                $this->userRepository->updatePassword($request->get('password'), $id);
            }
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('users.edit', $id);
    }

    public function destroy($id)
    {
        try {
            $user = $this->userRepository->findById($id);
            $user->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('users.index');
    }
}
