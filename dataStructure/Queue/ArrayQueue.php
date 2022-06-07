<?php

namespace dataStructure\Queue;

use dataStructure\arrayStruct;

/**
 * Class arrayStack 动态数组队列
 * @package dataStructure
 */
class ArrayQueue implements Queue
{
    //动态数组
    private $array;

    /**
     * arrayStack constructor.
     * @param int $capacity 用于标记动态数组的容量大小
     */
    public function __construct($capacity=10)
    {
        $this->array = new \dataStructure\ArrayStruct($capacity);
    }


    public function getSize(): int
    {
        return $this->array->getSize();
    }

    public function isEmpty(): bool
    {
        return $this->array->isEmpty();
    }


    public function enqueue($e): void
    {
        $this->array->addLast($e);
    }

    public function getFront()
    {
        return  $this->array->getFirst();
    }

    public function dequeue()
    {
        return  $this->array->removeFirst();
    }


    public function getCapacity()
    {
        return $this->array->getCapacity();
    }

    /**
     * 将数组转化为字符串
     * @return string
     */
    public function toString(): string
    {

        $str = 'Queue: size = ' . $this->array->getSize() . ',' . 'capacity = ' . $this->array->getCapacity() . PHP_EOL;

        $str .= "front[";
        for ($i = 0; $i < $this->array->getSize(); $i++) {

            $str .= $this->array->get($i);

            if ($i != $this->array->getSize() - 1) {

                $str .= ',';

            }

        }

        $str .= "] tail";
        return $str;

    }


    /**
     * 测试队列
     */
    public function test():void
    {
        $queue = new ArrayQueue();
        for ($i=0;$i<10;$i++){
            $queue->enqueue($i);
            var_dump($queue->toString());
            if ($i % 3 == 2){
                $queue->dequeue();
                var_dump($queue->toString());
            }

        }
    }


}