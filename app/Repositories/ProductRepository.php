<?php

namespace App\Repositories;

use App\Filters\Product\Search;
use App\Filters\Product\Status;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductMedia;
use Illuminate\Pipeline\Pipeline;

class ProductRepository
{
    public function store($values)
    {
        return Product::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'category_id' => $values['category_id'],
                'brand_id' => $values['brand_id'],
                'image_id' => null,
                'pdf_id' => null,
                'price' => $values['price'],
                'discount' => $values['discount'],
                'text' => $values['text'],
                'count' => $values['count'],
                'status' => $values['status']
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Product::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function addPdf($pdf_id, $id)
    {
        return Product::query()
            ->where('id', '=', $id)
            ->update([
                'pdf_id' => $pdf_id
            ]);
    }

    public function paginateByFilters($count = 10)
    {
        return app(Pipeline::class)
            ->send(Product::query())
            ->through([
                Status::class,
                Search::class
            ])
            ->thenReturn()
            ->latest()
            ->paginate($count);
    }

    public function paginateByFiltersByGroupId($count = 10)
    {
        return app(Pipeline::class)
            ->send(Product::query())
            ->through([
                Status::class,
                Search::class
            ])
            ->thenReturn()
            ->latest()
            ->paginate($count);
    }

    public function findById($id)
    {
        return Product::query()
            ->findOrFail($id);
    }

    public function whereInPaginate($ids)
    {
        return Product::query()
            ->where('status', '=', Product::ACTIVE)
            ->whereIn('id', $ids)
            ->paginate(21);
    }

    public function checkByGroupId($group_id)
    {
        return Product::query()
            ->where('group_id', '=', $group_id)
            ->count();
    }

    public function updateOrCreateByCode($code, $group_id, $key, $values)
    {
        $product = Product::query()->where('code', '=', $code)->first();

        if ($product !== null) {
            Product::query()
                ->where('code', '=', $code)
                ->where('group_id', '=', $group_id)
                ->update(
                    [
                        'name' => $values[$key]['name'],
                        'slug' => $values[$key]['slug'],
                        'category_id' => $values[$key]['category_id'],
                        'brand_id' => $values[$key]['brand_id'],
                        'image_id' => $values[$key]['image_id'],
                        'pdf_id' => $values[$key]['pdf_id'],
                        'price' => $values[$key]['price'],
                        'discount' => $values[$key]['discount'],
                        'text' => $values[$key]['text'],
                        'count' => $values[$key]['count'],
                        'status' => $values[$key]['status']
                    ]);
        } else {
            Product::query()
                ->create(
                    [
                        'name' => $values[$key]['name'],
                        'slug' => $values[$key]['slug'],
                        'category_id' => $values[$key]['category_id'],
                        'brand_id' => $values[$key]['brand_id'],
                        'image_id' => $values[$key]['image_id'],
                        'pdf_id' => $values[$key]['pdf_id'],
                        'price' => $values[$key]['price'],
                        'discount' => $values[$key]['discount'],
                        'text' => $values[$key]['text'],
                        'count' => $values[$key]['count'],
                        'status' => $values[$key]['status'],
                        'group_id' => $values[$key]['group_id'],
                        'code' => $values[$key]['code']
                    ]);
        }
    }

    public function update($values, $image_id, $pdf_id, $id)
    {
        return Product::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'category_id' => $values['category_id'],
                'brand_id' => $values['brand_id'],
                'image_id' => $image_id,
                'pdf_id' => $pdf_id,
                'price' => $values['price'],
                'discount' => $values['discount'],
                'text' => $values['text'],
                'count' => $values['count'],
                'status' => $values['status']
            ]);
    }

    public function updateStatus($id, $status)
    {
        return Product::query()
            ->where('id', '=', $id)
            ->update([
                'status' => $status
            ]);
    }

    public function checkImageIdForOthers($image_id)
    {
        return Product::query()
            ->where('image_id', '=', $image_id)
            ->count();
    }

    public function new($count, $paginate = false)
    {
        if ($paginate == true) {
            return Product::query()
                ->where('status', '=', Product::ACTIVE)
                ->latest()
                ->paginate($count);
        } else {
            return Product::query()
                ->where('status', '=', Product::ACTIVE)
                ->latest()
                ->limit($count)
                ->get();
        }
    }

    public function mostSales($paginate = false)
    {
        if ($paginate == true) {
            return Product::query()
                ->where('status', '=', Product::ACTIVE)
                ->orderBy('sale', 'desc')
                ->paginate(21);
        } else {
            return Product::query()
                ->where('status', '=', Product::ACTIVE)
                ->orderBy('sale', 'desc')
                ->limit(14)
                ->get();
        }
    }

    public function byDiscount($paginate = false)
    {
        if ($paginate == true) {
            return Product::query()
                ->where('status', '=', Product::ACTIVE)
                ->whereNotNull('discount')
                ->where('discount', '!=', '')
                ->paginate(21);
        } else {
            return Product::query()
                ->where('status', '=', Product::ACTIVE)
                ->whereNotNull('discount')
                ->where('discount', '!=', '')
                ->limit(14)
                ->get();
        }
    }

    public function related($category_id, $product_id)
    {
        $data =
            [
                ['status', '=', Product::ACTIVE],
                ['category_id', '=', $category_id]
            ];
        return Product::query()
            ->where($data)
            ->whereNotIn('id', [$product_id])
            ->latest()
            ->limit(14)
            ->get();
    }

    public function findByCategoryId($category_id)
    {
        $data =
            [
                ['status', '=', Product::ACTIVE],
                ['category_id', '=', $category_id]
            ];
        return Product::query()
            ->where($data)
            ->latest()
            ->paginate(21);
    }

    public function findByBrandId($brand_id)
    {
        $data =
            [
                ['status', '=', Product::ACTIVE],
                ['brand_id', '=', $brand_id]
            ];
        return Product::query()
            ->where($data)
            ->latest()
            ->paginate(21);
    }

    public function search($keyword)
    {
        return Product::query()
            ->where('name', 'like', '%' . $keyword . '%')
            ->where('status', '=', Product::ACTIVE)
            ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->orWhereHas('brand', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->paginate(21);
    }

    public function checkForTransaction($values)
    {
        foreach ($values as $value) {
            $result = $this->getCounts($value['product_id']);

            if ($result['main_count'] >= $value['count']) {
                $status[] = 'yes';
            } else {
                $status[] = 'no';
            }
        }
        return $status;
    }

    public function getCounts($id)
    {
        return Product::query()
            ->select('count as main_count')
            ->where('id', '=', $id)
            ->firstOrFail();
    }

    public function getSails($id)
    {
        return Product::query()
            ->select('sale as main_sale')
            ->where('id', '=', $id)
            ->firstOrFail();
    }

    public function updateCount($values)
    {
        foreach ($values as $value) {
            $result = $this->getCounts($value['product_id']);
            Product::query()
                ->where('id', '=', $value['product_id'])
                ->update([
                    'count' => $result['main_count'] - $value['count']
                ]);
        }
    }

    public function updateSale($values)
    {
        foreach ($values as $value) {
            $result = $this->getSails($value['product_id']);
            Product::query()
                ->where('id', '=', $value['product_id'])
                ->update([
                    'sale' => $result['main_sale'] + 1
                ]);
        }
    }

    /*START MEDIA*/

    public function findMediaByProductId($product_id)
    {
        return ProductMedia::query()
            ->where('product_id', '=', $product_id)
            ->latest()
            ->paginate(10);
    }

    public function storeMedia($values)
    {
        return ProductMedia::query()
            ->create([
                'product_id' => $values['product_id'],
                'media_id' => null
            ]);
    }

    public function addMedia($media_id, $id)
    {
        return ProductMedia::query()
            ->where('id', '=', $id)
            ->update([
                'media_id' => $media_id
            ]);
    }

    public function findMediaById($id)
    {
        return ProductMedia::query()
            ->findOrFail($id);
    }

    /*END MEDIA*/

    /*START GALLERY*/

    public function findGalleryByProductId($product_id)
    {
        return ProductGallery::query()
            ->where('product_id', '=', $product_id)
            ->latest()
            ->paginate(10);
    }

    public function storeGallery($values)
    {
        return ProductGallery::query()
            ->create([
                'product_id' => $values['product_id'],
                'image_id' => null
            ]);
    }

    public function addImageGallery($image_id, $id)
    {
        return ProductGallery::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function findGalleryById($id)
    {
        return ProductGallery::query()
            ->findOrFail($id);
    }

    /*END GALLERY*/
}
