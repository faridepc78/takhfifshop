<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\GroupRequest;
use App\Repositories\GroupRepository;
use App\Repositories\ProductRepository;
use Exception;

class GroupController extends Controller
{
    private $groupRepository;
    private $productRepository;

    public function __construct(GroupRepository   $groupRepository,
                                ProductRepository $productRepository)
    {
        $this->groupRepository = $groupRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $groups = $this->groupRepository->paginate();
        return view('admin.products.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('admin.products.groups.create');
    }

    public function store(GroupRequest $request)
    {
        try {
            $this->groupRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('groups.create');
    }

    public function destroy($id)
    {
        try {
            $group = $this->groupRepository->findById($id);
            $result = $this->productRepository->checkByGroupId($id);
            if ($result == 0) {
                $group->delete();
                newFeedback();
            } else {
                newFeedback('پیام', 'حذف امکان پذیر نیست این گروه دارای محصولات است', 'error');
            }
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('groups.index');
    }

    public function products($id)
    {
        $group = $this->groupRepository->findById($id);
        $products = $this->productRepository->paginateByFilters();
        return view('admin.products.groups.products', compact('group', 'products'));
    }
}
