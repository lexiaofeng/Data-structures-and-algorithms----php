<?php


namespace dataStructure\Queue;

use Exception;

/**
 * head端删除元素 队首
 * tail端添加元素 队尾
 * Class LinkedListQueue
 * @package dataStructure\Queue
 */
class LinkedListQueue
{
    //头尾节点
    private $head,$tail;

    private int $size;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }

    public function getSize():int
    {
        return $this->size;
    }

    public function isEmpty():bool
    {
        return $this->size == 0;
    }

    //队尾入队
    public function enqueue($e):void
    {
        if ($this->tail == null){
            $this->tail = new Node($e);
            $this->head = $this->tail;
        }else{
            $this->tail->next = new Node($e);
            $this->tail = $this->tail->next;
        }
        $this->size++;
    }

    //队首出队
    public function dequeue()
    {
        try{
            if ($this->isEmpty()){
                throw new Exception("Cannot dequeue from an empty queue");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }

        $retnode = $this->head;
        $this->head = $this->head->next;
        $retnode->next = null;
        if ($this->head == null ){
            $this->tail = null;
        }
        $this->size--;
        return $retnode->e;
    }

    public function getFront()
    {
        try{
            if ($this->isEmpty()){
                throw new Exception("queue is empty");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }
        return $this->head->e;
    }

    public function __toString():string
    {

        $str = "Queue: front ";
        $cur  = $this->head;
        while($cur != null){
            $str.=$cur."->";
            $cur = $cur->next;
        }

        $str .= "NULL tail";
        return $str;
    }

    public function test():void
    {
        $linkedlistqueue = new LinkedListQueue();
        for($i=0;$i<10;$i++){
            $linkedlistqueue->enqueue($i);
            var_dump( (string) $linkedlistqueue);
            if ($i % 3 == 2){
                $linkedlistqueue->dequeue($i);
                var_dump( (string) $linkedlistqueue);
            }
        }

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

    public function __construct($e=null, Node $next=null)
    {
        $this->e = $e;
        $this->next = $next;
    }

    public function __toString():string
    {
        return  $this->e;
    }


}