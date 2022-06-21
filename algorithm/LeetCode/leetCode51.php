<?php


namespace algorithm\LeetCode;

/**
 * 剑指 Offer 51. 数组中的逆序对
 * 在数组中的两个数字，如果前面一个数字大于后面的数字，则这两个数字组成一个逆序对。输入一个数组，求出这个数组中的逆序对的总数。
 * Class leetCode51
 * @package algorithm\LeetCode
 */
class leetCode51 {

    public  $res=0;
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function reversePairs($nums) {
        $start = 0;
        $end = count($nums) - 1;
        $temp_arr = &$nums;
        $this->sort($temp_arr,$start,$end);
        return $this->res;
    }
    /**
     * 自顶向下的归并排序
     * @param $arr
     * @param $l
     * @param $r
     */
    public function sort(&$arr,$l,$r)
    {
        //单点调试
//        var_dump('recursion:',$arr,$depthstring);

        if ($l>=$r) return;

        $mid = floor(($l+$r)/2);
        $this->sort($arr,$l,$mid);
        $this->sort($arr,$mid+1,$r);
        $this->merge($arr,$l,$mid,$r);

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
                $this->res += $mid-$i+1;
                $arr[$k] = $temp[$j];
                $j++;
            }
        }


    }
}