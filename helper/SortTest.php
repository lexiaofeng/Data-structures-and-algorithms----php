<?php


namespace helper;

use algorithm\MergeSort;
use Exception;
use algorithm\selectSort;
use algorithm\insertSort;

/**
 * 排序测试类
 * Class sortTest
 * @package algorithm
 */
class sortTest
{

    private function __construct()
    {

    }

    /**
     * 测试排序数组
     * @param $sortname
     * @param $array
     * @return float|string
     * @throws \Exception
     */
    public static function sortTest($sortname, $array)
    {
        $starttime = microtime('get_as_float');
        if ($sortname == 'selectSort'){
            $arr = selectSort::sort($array);
        }elseif ($sortname == 'insertSort'){
//            //基础版
//            $arr = insertSort::sort($array);
            //小优化版
            $arr = insertSort::sort2($array);
        }elseif ($sortname == 'mergeSort'){
            $len =  count($array);
            $sort = new MergeSort();
            $sort->MergeSort($array);
            $arr = $array;
        }


        $endtime = microtime('get_as_float');

        try {
            self::verifySortArray($arr);
        }//捕获异常
        catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }

        return $endtime - $starttime;
    }

    /**
     * 验证排序数组
     * @param $array
     * @throws Exception
     */
    public static function verifySortArray($array)
    {
        $len = count($array);
        for ($i = 1; $i < $len - 1; $i++) {
            if ($array[$i] < $array[$i - 1]) {
                throw new Exception("incorrect sort array");
            }
        }
        return;
    }
}