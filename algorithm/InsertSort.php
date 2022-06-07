<?php


namespace algorithm;


class insertSort
{
    private function __construct()
    {

    }

    /**
     * 插入排序法
     * 排序方式：[0，i）排序  [i,n）未排序
     * 重要特性： 对于有序数组，插入排序的复杂度是 O(n) 的
     * @param $arr
     * @return mixed
     */
    public static function sort($arr)
    {
        for($i=0;$i<count($arr);$i++){
            //将$arr[i]插入到合适的位置
            for($j=$i;$j-1>=0;$j--){
                if($arr[$j]<$arr[$j-1]){
                    swap($arr,$j,$j-1);
                }
            }

        }
        return $arr;
    }


    /**
     * 插入排序法(小优化版):设置临时变量储存$arr[$i] 平移满足条件的数据 循环三次赋值变一次  最后合适的索引位置存放临时变量$temp
     * 重要特性： 对于有序数组，插入排序的复杂度是 O(n) 的
     * 排序方式：[0，i）排序  [i,n）未排序
     * @param $arr
     * @return mixed
     */
    public static function sort2($arr)
    {
        for($i=0;$i<count($arr);$i++){
            //将$arr[i]插入到合适的位置
            $temp=$arr[$i];
            for($j=$i;($j-1>=0)&&($temp<$arr[$j-1]) ;$j--){
                $arr[$j]=$arr[$j-1];
            }
            $arr[$j]=$temp;


        }
        return $arr;
    }

    /**
     * example
     * 插入排序法
     * 排序方式：[0，i）未排序  [i,n）排序
     * @param $arr
     * @return mixed
     */
    public static function sort3($arr)
    {
        $n = count($arr)-1;
        for ($i=$n;$i>=0;$i--){
            $temp = $arr[$i];
            for($j=$i;($j+1<count($arr))&&($temp>$arr[$j+1]);$j++){
                $arr[$j] = $arr[$j+1];
            }
            $arr[$j]=$temp;
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