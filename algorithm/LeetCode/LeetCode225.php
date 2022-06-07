<?php
namespace algorithm\LeetCode;

use SplQueue;

/**
 * 225. 用队列实现栈
 * 请你仅使用两个队列实现一个后入先出（LIFO）的栈，并支持普通栈的全部四种操作（push、top、pop 和 empty）。
 * 实现 MyStack 类：
 * void push(int x) 将元素 x 压入栈顶。
 * int pop() 移除并返回栈顶元素。
 * int top() 返回栈顶元素。
 * boolean empty() 如果栈是空的，返回 true ；否则，返回 false 。
 * 解题思路：
 * 栈是先进后出、队列是先进先出
 * 要实现栈的先进后出   就得队列后进的元素排在队首  队列元素位置反转
 * Class LeetCode225
 * @package algorithm\LeetCode
 */
class LeetCode225
{
    private $queue1;
    private $queue2;
    /**
     * Initialize your data structure here.
     */
    public function __construct()
    {
        $this->queue1 = new SplQueue();
        $this->queue2 = new SplQueue();
    }

    /**
     * Push element x onto stack.
     * @param Integer $x
     * @return NULL
     */
    public function push($x)
    {
        $this->queue1->enqueue($x);
    }

    /**
     * Removes the element on top of the stack and returns that element.
     * @return Integer
     */
    public function pop()
    {
        if ($this->empty()) return -1;
        // 来回倒腾一次
        while ($this->queue1->count() > 1) {
            $this->queue2->enqueue($this->queue1->dequeue());
        }

        $return = $this->queue1->dequeue();
        $this->queue1 = $this->queue2;
        $this->queue2 = new SplQueue();
        return $return;
    }

    /**
     * Get the top element.
     * @return Integer
     */
    public function top()
    {
        return $this->queue1->top();
    }

    /**
     * Returns whether the stack is empty.
     * @return Boolean
     */
    public function empty()
    {
        return $this->queue1->isEmpty() && $this->queue2->isEmpty();
    }



}