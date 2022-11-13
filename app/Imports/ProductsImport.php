<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'slug' => str_slug_persian($row[1]),
            'category_id' => $row[2],
            'brand_id' => $row[3],
            'image_id' => $row[4],
            'pdf_id' => $row[5],
            'price' => $row[6],
            'discount' => $row[7],
            'text' => $row[8],
            'count' => $row[9],
            'status' => $row[10],
            'group_id' => $row[11],
            'code' => $row[12]
        ]);
    }
}
