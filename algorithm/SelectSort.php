<?php
namespace algorithm;

class selectSort
{
    private function __construct()
    {

    }

    /**
     * 选择排序法
     * 排序方式：[0，i）排序  [i,n）未排序
     * @param $arr
     * @return mixed
     */
    public static function sort($arr)
    {
        //$arr[0…i)是有序的,$arr[i…n)是无序的
        for($i=0;$i<count($arr);$i++){

            //选择$arr[i…n)中最小的索引
            $min_index = $i;

            for($j=$i;$j<count($arr);$j++){
                if($arr[$j]<$arr[$min_index]){
                    $min_index = $j;
                }
            }

            if($i!=$min_index){
                self::swap($arr,$i,$min_index);
            }

        }
        return $arr;
    }

    /**
     * 数组索引反转
     * @param array $arr
     * @param $a
     * @param $b
     */
   public static function swap(array &$arr,$a,$b){
        $temp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $temp;
    }


}