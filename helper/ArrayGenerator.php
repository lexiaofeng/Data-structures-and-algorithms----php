<?php
namespace helper;

/**
 * 生成数组类
 * Class arrayGenerator
 * @package algorithm
 */
class arrayGenerator
{

    private function __construct()
    {

    }

    /**
     * 生成随机数组
     * @param $len
     * @param $range
     * @return array
     */
    public static function generateRandomArray($len,$range){
        $arr = [];
        for($i=0;$i<$len;$i++){
            $arr[$i]=rand(0,$range);
        }

        return $arr;
    }

    public static function generateOrderArray($len){
        $arr = [];
        for($i=0;$i<$len;$i++){
            $arr[$i]=$i;
        }

        return $arr;
    }

}