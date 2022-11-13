<?php

namespace App\Http\Controllers\Site;

use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    private $productRepository;
    private $brandRepository;
    private $categoryRepository;

    public function __construct(ProductRepository  $productRepository,
                                BrandRepository    $brandRepository,
                                CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function category($slug)
    {
        $category_id = extractId($slug);
        $category = $this->categoryRepository->findById($category_id);
        $category_level = $category['level'];
        $data = $this->categoryRepository->dataByRelations($category_id);

        if ($category_level == 1) {
            if (count($data[0]['products']) >= 1) {
                $p = $data[0]['products'];
            } else {
                $p = [];
            }

            if (count($data[0]['sub']) >= 1) {
                foreach ($data[0]['sub'] as $key => $item) {
                    $products[] = $data[0]['sub'][$key]['products'];
                }

                if (count($data[0]['sub'][0]['children_recursive']) >= 1) {
                    foreach ($data[0]['sub'][0]['children_recursive'] as $key => $item) {
                        $r_products[] = $data[0]['sub'][0]['children_recursive'][$key]['products'];
                    }
                } else {
                    $r_products = [];
                }
            } else {
                $products = [];
                $r_products = [];
            }

            $arraysMerged1 = [];
            $arraysMerged2 = [];

            foreach ($products as $array) {
                $arraysMerged1 = array_merge($arraysMerged1, $array);
            }

            foreach ($r_products as $item) {
                $arraysMerged2 = array_merge($arraysMerged2, $item);
            }

            $my = array_merge($arraysMerged1, $arraysMerged2);

            $array = Arr::collapse([$p, $my]);

            foreach ($array as $value) {
                $ids[] = explode(",", $value['id']);
            }

            if (!isset($ids)) {
                $ids = [];
            }

            $products = $this->productRepository->whereInPaginate($ids);

        } elseif ($category_level == 2) {

            if (count($data[0]['products']) >= 1) {
                $p = $data[0]['products'];
            } else {
                $p = [];
            }

            if (count($data[0]['sub']) >= 1) {
                foreach ($data[0]['sub'] as $key => $item) {
                    $products[] = $data[0]['sub'][$key]['products'];
                }
            } else {
                $products = [];
            }

            $arraysMerged = [];

            foreach ($products as $array) {
                $arraysMerged = array_merge($arraysMerged, $array);
            }

            $array = Arr::collapse([$p, $arraysMerged]);

            foreach ($array as $value) {
                $ids[] = explode(",", $value['id']);
            }

            $products = $this->productRepository->whereInPaginate($ids);

        } elseif ($category_level == 3) {
            $products = $this->productRepository->findByCategoryId($category_id);
        }

        return view('site.products.category.index',
            compact('category', 'products'));
    }

    public function brand($slug)
    {
        $brand_id = extractId($slug);
        $brand = $this->brandRepository->findById($brand_id);
        $products = $this->productRepository->findByBrandId($brand_id);
        return view('site.products.brand.index',
            compact('brand', 'products'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $products = $this->productRepository->search($keyword);
        return view('site.products.search.index',
            compact('keyword', 'products'));
    }

    public function index($slug)
    {
        $product_id = extractId($slug);
        $product = $this->productRepository->findById($product_id);
        $related_products = $this->productRepository->related($product->category->id, $product_id);
        return view('site.products.index', compact('product', 'related_products'));
    }

    public function new()
    {
        $products = $this->productRepository->new(21, true);
        return view('site.products.new.index', compact('products'));
    }

    public function by_discount()
    {
        $products = $this->productRepository->byDiscount(true);
        return view('site.products.by-discount.index', compact('products'));
    }

    public function most_sale()
    {
        $products = $this->productRepository->mostSales(true);
        return view('site.products.most-sale.index', compact('products'));
    }
}
