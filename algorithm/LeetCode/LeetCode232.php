<?php


namespace algorithm\LeetCode;


use SplStack;

/**
 * 232. 用栈实现队列
 * 解题思路：
 * 栈是先进后出、队列是先进先出
 * 要实现队列的先进先出   就得栈后进的元素排在队首
 * Class LeetCode232
 * @package algorithm
 */
class LeetCode232
{
    private $stack1;
    private $stack2;
    /**
     */
    function __construct() {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        while (!$this->stack1->isEmpty()){
            $this->stack2->push($this->stack1->pop());
        }

        $this->stack1->push($x);

        while (!$this->stack2->isEmpty()){
            $this->stack1->push($this->stack2->pop());
        }

    }

    /**
     * @return Integer
     */
    function pop() {
        return $this->stack1->pop();
    }

    /**
     * @return Integer
     */
    function peek() {
        return $this->stack1->top();
    }

    /**
     * @return Boolean
     */
    function empty() {
        return $this->stack1->isEmpty();
    }

}