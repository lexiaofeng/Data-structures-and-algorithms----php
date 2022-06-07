<?php


namespace helper;


use dataStructure\Stack\ArrayStack;
use dataStructure\Stack\LinkedListStack;
use dataStructure\Stack\Stack;

class StackTest
{
    public function __construct()
    {
    }

    public function stackTest(Stack $stack,int $count)
    {
        $starttime = microtime('get_as_float');

        for ($i=0;$i<$count;$i++){
            $stack->push($i);
        }

        for ($i=0;$i<$count;$i++){
            $stack->pop();
        }


        $endtime = microtime('get_as_float');

        return $endtime - $starttime;
    }

    public function compareTest($count = 10000)
    {
        $stack1 = new ArrayStack();
        $time1 = $this->stackTest($stack1,$count);

        var_dump("ArrayStack:".$time1);

        $stack2 = new LinkedListStack();
        $time2 = $this->stackTest($stack2,$count);

        var_dump("LinkedListStack:".$time2);
    }

}