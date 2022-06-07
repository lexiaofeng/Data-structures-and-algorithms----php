<?php


namespace algorithm\LeetCode;

use dataStructure\LinkedList\Node;

/**
 * 203. 移除链表元素
 * 给你一个链表的头节点 head 和一个整数 val ，请你删除链表中所有满足 Node.val == val 的节点，并返回 新的头节点
 * Class LeetCode203
 * @package algorithm\LeetCode
 */
class LeetCode203
{

    function removeElements(Node $head, $val) {
        while ($head !=null && $head->e == $val){
            $head = $head->next;
        }

        if ($head == null){
            return null;
        }
        $prev = $head;
        while ($prev->next != null){
            if ($prev->next->e == $val){
                $prev->next = $prev->next->next;
            }else{
                $prev = $prev->next;
            }
        }

        return $head;
    }
}

