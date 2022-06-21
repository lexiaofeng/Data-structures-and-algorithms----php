<?php


namespace algorithm;

/**
 * 自底向上的归并排序
 * Class MergeSortBU
 * @package algorithm
 */
class MergeSortBU
{
    public function __construct()
    {
    }

    //归并算法总函数
    public function MergeSort(&$arr){
        $start = 0;
        $end = count($arr) - 1;
        $this->sortBU($arr);
    }

    /**
     * 自底向上的归并排序
     * @param $arr
     */
    public function sortBU(&$arr)
    {
        $len = count($arr);

        // 遍历合并的区间长度
        for ($size=1;$size<$len;$size+=$size){
            // 遍历合并的两个区间的起始位置 i
            // 合并[$i,$i+$size-1] [$i+$size,$i+$size+$size-1]
            for ($i=0;$i+$size<$len;$i+=$size+$size){
                $this->merge($arr,$i,$i+$size-1,min($i+$size+$size-1,$len-1));
            }

        }
    }

    /**
     * 方法1
     * @param $arr
     * @param $l
     * @param $mid
     * @param $r
     */
    public function merge(&$arr,$l,$mid,$r):void
    {
        $i = $l;        //第一个区间头
        $j = $mid+1;    //第二个区间头

        $temp = $arr;
        //每轮循环$arr[$k]的值
        for ($k=$l;$k<=$r;$k++){
            //先判断$i,$j防止越界 在判断$arr[$i] 和 $arr[$j]的大小 因为是 l 和 r 有$l的数组偏移量
            if ($i>$mid){
                $arr[$k] = $temp[$j];
                $j++;
            }elseif ($j>$r){
                $arr[$k] = $temp[$i];
                $i++;
            }elseif ($temp[$i]<=$temp[$j]){
                $arr[$k] = $temp[$i];
                $i++;
            }else{
                $arr[$k] = $temp[$j];
                $j++;
            }
        }
//        var_dump('merge:',$arr);

    }

    /**
     * 方法2
     * @param $arr
     * @param $l
     * @param $mid
     * @param $r
     */
    public function merge2(&$arr,$l,$mid,$r):void
    {
        $i = $l;
        $j=$mid + 1;
        $k = $l;
        $temparr = array();

        while($i!=$mid+1 && $j!=$r+1)
        {
            if($arr[$i] >= $arr[$j]){
                $temparr[$k++] = $arr[$j++];
            }
            else{
                $temparr[$k++] = $arr[$i++];
            }
        }

        //将第一个子序列的剩余部分添加到已经排好序的 $temparr 数组中
        while($i != $mid+1){
            $temparr[$k++] = $arr[$i++];
        }
        //将第二个子序列的剩余部分添加到已经排好序的 $temparr 数组中
        while($j != $r+1){
            $temparr[$k++] = $arr[$j++];
        }
        for($i=$l; $i<=$r; $i++){
            $arr[$i] = $temparr[$i];
        }
    }



}