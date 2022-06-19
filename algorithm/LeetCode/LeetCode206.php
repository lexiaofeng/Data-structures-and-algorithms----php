<?php


namespace algorithm\LeetCode;
use dataStructure\LinkedList\Node;

/**
 * 翻转链表
 * Class LeetCode206
 * @package algorithm\LeetCode
 */
class LeetCode206
{
    /**
     * 非递归
     * @param Node $head
     * @return Node|null
     */
    public function reverseList(Node $head)
    {
        $pre = null;
        $cur = $head;
        while ($cur != null){
            $next = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;

        }

        return $pre;
    }


    /**
     * 递归
     * @param Node $head
     * @return Node
     */
    public function reverseListRecursion(Node $head)
    {
        if ($head == null || $head->next == null){
            return $head;
        }

        $rev = $this->reverseListRecursion($head->next);
        $head->next->next = $head;
        $head->next = null;
        return $rev;

    }


}