<?php


namespace App\Services\BasketBuy;


interface BasketBuyServiceContract
{
    public static function isExistData();

    public static function addItem(array $item);

    public static function updateItem(array $item);

    public static function updateItems(array $items);

    public static function deleteItem(array $item);

    public static function readData();

    public static function searchItem(int $product_id, int $count = null, array $data);

    public static function deleteData();

    public static function countItems();

    public static function isSetProductIdInData(int $product_id);
}
