<?php


namespace algorithm;


class MergeSort
{
    public function __construct()
    {
    }

    //归并算法总函数
  public function MergeSort(&$arr){
        $start = 0;
        $end = count($arr) - 1;
        $this->sort($arr,$start,$end);
    }

    public function sort(&$arr,$l,$r,$depthstring=0)
    {
        //单点调试
//        $depthstring = 0;
//        var_dump('recursion:',$arr,$depthstring);

        if ($l>=$r) return;

        $mid = floor(($l+$r)/2);
        $this->sort($arr,$l,$mid,$depthstring+1);
        $this->sort($arr,$mid+1,$r,$depthstring+1);
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
               $arr[$k] = $temp[$j-$l];
               $j++;
            }elseif ($j>$r){
                $arr[$k] = $temp[$i-$l];
                $i++;
            }elseif ($temp[$i-$l]<=$temp[$j-$l]){
                $arr[$k] = $temp[$i-$l];
                $i++;
            }else{
                $arr[$k] = $temp[$j-$l];
                $j++;
            }
        }

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