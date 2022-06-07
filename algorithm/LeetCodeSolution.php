<?php


namespace algorithm;
use dataStructure\arrayStack;


class leetCodeSolution
{
    /**
     * 20. 有效的括号
     * 给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串 s ，判断字符串是否有效。
     * 有效字符串需满足：
     * (1):左括号必须用相同类型的右括号闭合。
     * (2):左括号必须以正确的顺序闭合。
     * 示例：
     * 输入：s = "{[]}"
     * 输出：true
     * 解题思路： 栈的应用
     * @param String $string
     * @return Boolean
     */
   public function isValid($string):bool {
        $stack = new arrayStack();
        $count = strlen($string);
        for ($i=0;$i<$count;$i++){
            $c = $string[$i];
            if ($c == '(' || $c == '{' || $c == '['){
                $stack->push($string[$i]);
            }else{
                if ($stack->isEmpty()){
                    return false;
                }

                $top_char = $stack->pop();
                if ($c ==')' && $top_char != '('){
                    return false;
                }
                if ($c =='}' && $top_char != '{'){
                    return false;
                }
                if ($c ==']' && $top_char != '['){
                    return false;
                }

            }
        }
        return $stack->isEmpty();


    }

}