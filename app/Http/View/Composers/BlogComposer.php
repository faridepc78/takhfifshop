<?php


namespace App\Http\View\Composers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\View\View;

class BlogComposer
{
    private $postCategoryRepository;
    private $postRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository,
                                PostRepository $postRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
        $this->postRepository = $postRepository;
    }

    public function compose(View $view)
    {
        $view->with([
            'categories' => $this->postCategoryRepository->getAll(),
            'random_posts'=>$this->postRepository->random()
        ]);
    }
}
