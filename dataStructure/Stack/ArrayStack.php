<?php

namespace dataStructure\Stack;

use dataStructure\arrayStruct;

/**
 * Class arrayStack 动态数组栈
 * @package dataStructure
 */
class ArrayStack implements stack
{
    //动态数组
    private $array;

    /**
     * arrayStack constructor.
     * @param $capacity 用于标记动态数组的容量大小
     */
    public function __construct($capacity=10)
    {
        $this->array = new arrayStruct($capacity);
    }


    public function getSize(): int
    {
        return $this->array->getSize();
    }

    public function isEmpty(): bool
    {
        return $this->array->isEmpty();
    }


    public function push($e): void
    {
        $this->array->addLast($e);
    }

    public function peek()
    {
        return  $this->array->getLast();
    }

    public function pop()
    {
        return  $this->array->removeLast();
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

        $str = 'Stack: size = ' . $this->array->getSize() . ',' . 'capacity = ' . $this->array->getCapacity() . PHP_EOL;

        $str .= "[";
        for ($i = 0; $i < $this->array->getSize(); $i++) {

            $str .= $this->array->get($i);

            if ($i != $this->array->getSize() - 1) {

                $str .= ',';

            }

        }

        $str .= "] top";
        return $str;

    }


}