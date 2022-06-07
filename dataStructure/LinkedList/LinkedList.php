<?php
namespace dataStructure\LinkedList;

use Exception;

/**
 * 链表
 * 动态数据结构
 * 时间复杂度
 * curd 都是O(n)
 * Class LinkedList
 * @package dataStructure\LinkedList
 */
class LinkedList
{
    //虚拟头节点
    private  Node $dummyHead;

    private int $size;

    public function __construct()
    {
        $this->dummyHead = new Node();
        $this->size = 0;
    }

    //获取链表元素的个数
    public function getSize():int
    {
        return $this->size;
    }

    //返回链表是否为空
    public function isEmpty()
    {
        return $this->size == 0;
    }


    //在链表的index(0-based)位置添加新的元素e
    //在链表中不是一个常用的操作，练习用：）
    public function add(int $index,$e):void
    {
        try{
            if ($index<0 || $index>$this->size){
                throw new Exception("add failed,illegal index");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }


            $prev = $this->dummyHead;
            for ($i=0;$i<$index;$i++){
                $prev = $prev->next;
            }

//            $node = new Node($e);
//            $node->next = $prev->next;
//            $prev->next = $node;

            /********上面三句话的简化版********/
            $prev->next = new Node($e,$prev->next);
            $this->size++;


    }

    //在链表头部添加新元素e
    public function addFirst($e):void
    {
//        $node = new Node($e);
//        $node->next= $this->head;
//        $this->head = $node;
        /********上面三句话的简化版********/
//        $this->dummyHead = new Node($e,$this->dummyHead);
//
//        $this->size++;
        $this->add(0,$e);

    }

    //在链表末尾添加新的元素e
    public function addLast($e):void
    {
        $this->add($this->size,$e);
    }

    //删除链表的第index(0-based)位置的元素，返回删除元素
    //在链表中不是一个常用的操作，练习用：）
    public function remove(int $index)
    {
        try{
            if ($index<0 || $index>=$this->size){
                throw new Exception("remove failed,illegal index");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }

        $prev = $this->dummyHead;
        for ($i=0;$i<$index;$i++){
            $prev = $prev->next;
        }
        $retNode = $prev->next;
        $prev->next = $retNode->next;
        $retNode->next = null;
        $this->size--;

        return $retNode->e;

    }

    public function removeFirst()
    {
        return $this->remove(0);
    }

    public function removeLast()
    {
        return $this->remove($this->size-1);
    }


    //获得链表的第index(0-based)位置的元素e
    //在链表中不是一个常用的操作，练习用：）
    public function get(int $index)
    {
        try{
            if ($index<0 || $index>=$this->size){
                throw new Exception("get failed,illegal index");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }


        $cur = $this->dummyHead->next;
        for ($i=0;$i<$index;$i++){
            $cur = $cur->next;
        }

        return $cur->e;

    }

    public function getFirst()
    {
        return $this->get(0);
    }

    public function getLast()
    {
        return $this->get($this->size-1);
    }

    //修改链表的第index(0-based)位置的元素e
    //在链表中不是一个常用的操作，练习用：）
    public function set(int $index,$e)
    {
        try{
            if ($index<0 || $index>=$this->size){
                throw new Exception("set failed,illegal index");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }

        $cur = $this->dummyHead->next;
        for ($i=0;$i<$index;$i++){
            $cur = $cur->next;
        }
        $cur->e = $e;
    }

    //查找链表中是否有元素e
    public function contains($e)
    {
        $cur = $this->dummyHead->next;
        while ($cur != null){
            if ($cur->e == $e){
                return true;
            }
            $cur = $cur->next;
        }
        return false;

    }

    public function __toString():string
    {

        $str = "";
        $cur  = $this->dummyHead->next;
        while($cur != null){
            $str.=$cur."->";
            $cur = $cur->next;
        }

        $str .= "NULL";
        return $str;
    }

    public function test():void
    {
        $linkedlist = new LinkedList();
        for($i=0;$i<5;$i++){
            $linkedlist->addFirst($i);
           var_dump( (string) $linkedlist);
        }
        $linkedlist->add(2,666);
        var_dump( (string) $linkedlist,333);
        $linkedlist->remove(2);
        var_dump( (string) $linkedlist,44);
        $linkedlist->removeFirst();
        var_dump( (string) $linkedlist,55);
        $linkedlist->removeLast();
        var_dump( (string) $linkedlist,66);
    }
}

/**
 * 节点
 * Class Node
 * @package dataStructure\LinkedList
 */
class Node
{
    public $e;

    public $next;

    public function __construct($e=null,Node $next=null)
    {
        $this->e = $e;
        $this->next = $next;
    }

    public function __toString():string
    {
        return  $this->e;
    }


}