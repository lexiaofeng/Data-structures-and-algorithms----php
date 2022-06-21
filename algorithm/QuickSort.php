<?php


namespace algorithm;


class QuickSort
{
    public function __construct()
    {
    }

    public function quickSort($arr)
    {
        $start = 0;
        $end = count($arr)-1;
        $temp_arr = &$arr;
        $this->sort($temp_arr,$start,$end);
        return $temp_arr;
    }

    private function sort(&$arr,$l,$r)
    {
        if ($l>=$r) return;
       $p =  $this->partition($arr,$l,$r);
       $this->sort($arr,$l,$p-1);
       $this->sort($arr,$p+1,$r);
    }

    private function partition(&$arr,$l,$r)
    {
        //$l = $v, [$l+1,$j]<$v, [$j+1,$r]>=$v
        $j = $l;
        for ($i=$l+1;$i<=$r;$i++){
            if ($arr[$i]<$arr[$l]){
                $j++;
               $this->swap($arr,$i,$j);
            }
        }
        $this->swap($arr,$j,$l);
        return $j;
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