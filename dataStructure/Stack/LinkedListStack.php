<?php


namespace dataStructure\Stack;


use dataStructure\LinkedList\LinkedList;

class LinkedListStack implements Stack
{
    private  $linkedlist;

    public function __construct()
    {
        $this->linkedlist = new LinkedList();
    }

    public function peek()
    {
        return $this->linkedlist->getFirst();
    }

    public function isEmpty(): bool
    {
        return $this->linkedlist->isEmpty();
    }

    public function push($e): void
    {
        $this->linkedlist->addFirst($e);
    }

    public function pop()
    {
        return $this->linkedlist->removeFirst();
    }

    public function getSize(): int
    {
        return $this->linkedlist->getSize();
    }

    public function __toString():string
    {
        $str = "LinkedListStack:top ";
        $str.= $this->linkedlist;
        return $str;
    }

    public function test()
    {
        $stack = new LinkedListStack();
        for ($i=0;$i<5;$i++){
            $stack->push($i);
        }
        $stack->pop();
        var_dump((string) $stack);exit;
    }


}