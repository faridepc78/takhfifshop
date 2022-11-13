<?php


namespace App\Services\BasketBuy;


use Illuminate\Support\Facades\Cookie;


class BasketBuyService implements BasketBuyServiceContract
{
    private static $name = 'cart';
    private static $time = 60 * 60 * 24 * 7;// 1 week

    public static function isExistData()
    {
        return Cookie::has(self::$name) ? true : false;
    }

    public static function addItem($item)
    {
        $isExist = self::isExistData();

        $array_data = [
            'items' => [
                $item
            ]
        ];

        if ($isExist == false) {
            //Unset Cookie Data

            Cookie::queue(self::$name, json_encode($array_data), time() + self::$time);

            return ['message' => 'آیتم افزوده شد', 'status' => 'success'];
        } else {
            //Set Cookie Data

            $data = self::readData();

            if ($data == false) {
                //Null Cookie Data

                Cookie::queue(self::$name, json_encode($array_data), time() + self::$time);

                return ['message' => 'آیتم افزوده شد', 'status' => 'success'];
            } else {
                //Full Cookie Data

                $searchItem = self::searchItem($item['id'], null, $data['items']);

                if ($searchItem == null) {
                    array_push($data['items'], $item);
                    Cookie::queue(self::$name, json_encode($data), time() + self::$time);
                    return ['message' => 'آیتم افزوده شد', 'status' => 'success'];
                } else {
                    //Exist Item In Cookie Data
                    return ['message' => 'این آیتم قبلا افزوده شده است', 'status' => 'duplicate'];
                }
            }
        }
    }

    public static function updateItems($items)
    {
        $isExist = self::isExistData();
        $data = self::readData();

        if ($isExist == true && $data != false) {
            foreach ($items as $item) {
                $searchItem = self::searchItem($item['id'], $item['count'], $data['items']);

                if (!empty($searchItem)) {
                    $new_item = array_replace($searchItem['item'], $item);
                    unset($data['items'][$searchItem['key'] - 1]);
                    array_push($data['items'], $new_item);
                    $last_updateKeys = array_values($data['items']);
                    $array_data = [
                        'items' => $last_updateKeys
                    ];
                    Cookie::queue(self::$name, json_encode($array_data), time() + self::$time);
                } else {
                    //NoExist Item In Cookie Data
                    return ['message' => 'این آیتم وجود ندارد', 'status' => 'fail'];
                }
            }
            return ['message' => 'آیتم بروزرسانی شد', 'status' => 'success'];
        } else {
            //Unset Cookie Data
            return ['message' => 'اطلاعات وجود ندارد', 'status' => 'fail'];
        }
    }

    public static function updateItem($item)
    {
        $isExist = self::isExistData();
        $data = self::readData();

        if ($isExist == true && $data != false) {

            $searchItem = self::searchItem($item['id'], $item['count'], $data['items']);

            if (!empty($searchItem)) {
                if ($searchItem['update_status'] == true) {
                    $new_item = array_replace($searchItem['item'], $item);
                    unset($data['items'][$searchItem['key'] - 1]);
                    array_push($data['items'], $new_item);
                    $last_updateKeys = array_values($data['items']);
                    $array_data = [
                        'items' => $last_updateKeys
                    ];
                    Cookie::queue(self::$name, json_encode($array_data), time() + self::$time);
                    return ['message' => 'آیتم بروزرسانی شد', 'status' => 'success'];
                } else {
                    //It has been updated before
                    return ['message' => 'این آیتم قبلا بروزرسانی شده است', 'status' => 'duplicate'];
                }
            } else {
                //NoExist Item In Cookie Data
                return ['message' => 'این آیتم وجود ندارد', 'status' => 'noSetItem'];
            }
        } else {
            //Unset Cookie Data
            return ['message' => 'اطلاعات وجود ندارد', 'status' => 'fail'];
        }
    }

    public static function deleteItem($item)
    {
        $isExist = self::isExistData();
        $data = self::readData();

        if ($isExist == true && $data != false) {

            $searchItem = self::searchItem($item['id'], null, $data['items']);
            if (!empty($searchItem)) {
                unset($data['items'][$searchItem['key'] - 1]);
                $last_updateKeys = array_values($data['items']);
                $array_data = [
                    'items' => $last_updateKeys
                ];
                Cookie::queue(self::$name, json_encode($array_data), time() + self::$time);
                return ['message' => 'آیتم حذف شد', 'status' => 'success'];
            } else {
                //NoExist Item In Cookie Data
                return ['message' => 'این آیتم وجود ندارد', 'status' => 'fail'];
            }
        } else {
            //Unset Cookie Data
            return ['message' => 'اطلاعات وجود ندارد', 'status' => 'fail'];
        }
    }

    public static function sort_array_of_array(&$array, $subfield)
    {
        $sortarray = [];
        foreach ($array as $key => $row) {
            $sortarray[$key] = $row[$subfield];
        }
        array_multisort($sortarray, SORT_ASC, $array);
    }

    public static function readData()
    {
        $isExist = self::isExistData();
        if ($isExist == true) {
            $data = json_decode(Cookie::get(self::$name), true);
            if ($data != null) {
                self::sort_array_of_array($data['items'], 'time');
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function searchItem($product_id, $count = null, $data)
    {
        foreach ($data as $key => $value) {
            if ($value['id'] == $product_id) {
                if (!empty($count)) {
                    if ($value['count'] == $count) {
                        return [
                            'item' => $value,
                            'key' => $key + 1,
                            'update_status' => false
                        ];
                    } else {
                        return [
                            'item' => $value,
                            'key' => $key + 1,
                            'update_status' => true
                        ];
                    }
                } else {
                    return [
                        'item' => $value,
                        'key' => $key + 1
                    ];
                }
            }
        }
        return null;
    }

    public static function deleteData()
    {
        Cookie::queue(Cookie::forget(self::$name));
        return ['message' => 'اطلاعات با موفقیت حذف شد', 'status' => 'success'];
    }

    public static function countItems()
    {
        $isExist = self::isExistData();
        if ($isExist == true && self::readData() != false) {
            $data = json_decode(Cookie::get(self::$name), true);
            return count($data['items']);
        } else {
            return 0;
        }
    }

    public static function isSetProductIdInData($product_id)
    {
        $isExist = self::isExistData();
        if ($isExist == true && self::readData() != false) {
            $data = json_decode(Cookie::get(self::$name), true);
            return self::searchItem($product_id, null, $data['items']);
        } else {
            return false;
        }
    }
}
