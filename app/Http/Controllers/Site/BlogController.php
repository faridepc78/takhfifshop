<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $postRepository;
    private $postCategoryRepository;

    public function __construct(PostRepository $postRepository,
                                PostCategoryRepository $postCategoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAllByPaginate();
        return view('site.blog.index', compact('posts'));
    }

    public function post($slug)
    {
        $post_id = extractId($slug);
        $post = $this->postRepository->findById($post_id);
        return view('site.blog.post.index', compact('post'));
    }

    public function category($slug)
    {
        $category_id = extractId($slug);
        $category = $this->postCategoryRepository->findById($category_id);
        $posts = $this->postRepository->findByCategoryId($category_id);
        return view('site.blog.category.index',
            compact('category', 'posts'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $posts = $this->postRepository->search($keyword);
        return view('site.blog.search.index',
            compact('keyword', 'posts'));
    }
}
