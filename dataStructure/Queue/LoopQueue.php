<?php


namespace dataStructure\Queue;
use Exception;

/**
 * 循环队列
 * 特点： 出队操作 复杂度O(1) 均摊
 * Class LoopQueue
 * @package dataStructure
 */
class LoopQueue implements Queue
{
    //数组
    private $array=[];

    //队首标识符
    private $front;

    //队尾标识符
    private $tail;

    //数组实际大小
    private $size;

    //数组容量
    private $capacity;

    public function __construct(int $capacity=10)
    {
        $this->capacity = $capacity+1;
        $this->front = 0;
        $this->tail = 0;
        $this->size = 0;
    }

    public function getCapacity():int
    {
        return $this->capacity-1;
    }

    public function isEmpty(): bool
    {
        return $this->front == $this->tail;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    /** 重点步骤 **/
    public function enqueue($e): void
    {

        if ($this->capacity !=0 && (($this->tail+1) % $this->capacity == $this->front)  ){
            $this->resize($this->getCapacity()*2);
        }

        $this->array[$this->tail] = $e;
        $this->tail = ($this->tail + 1) % $this->capacity;
        $this->size ++;

    }

    /** 重点步骤 **/
    private function resize(int $capacity)
    {
        $newArray = [];
        for ($i=0;$i<$this->size;$i++){
            /** 数组赋值到新数组  **/
            $newArray[$i] = $this->array[($i+$this->front) % $this->capacity];
        }
        $this->capacity = $capacity+1;
        $this->array = $newArray;
        $this->front = 0;
        $this->tail = $this->size;


    }

    /** 重点步骤 **/
    public function dequeue()
    {
        try{
            if ($this->isEmpty()) {
                throw new Exception("Cannot dequeue from an empty queue");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }

        $ret = $this->array[$this->front];
        $this->array[$this->front] = null;
        $this->front = ($this->front+1) % $this->capacity;
        $this->size --;
        if ($this->size <= $this->getCapacity()/4 && $this->getCapacity()/2 !=0 ){
            $this->resize( $this->getCapacity()/2);
        }
        return $ret;

    }

    public function getFront()
    {
        try{
            if ($this->isEmpty()) {
                throw new Exception("Queue is empty ");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }

        return $this->array[$this->front];
    }

    /**
     * 将数组转化为字符串
     * @return string
     */
    public function toString(): string
    {

        $str = 'LoopQueue: size = ' . $this->size . ',' . 'capacity = ' . $this->getCapacity() . PHP_EOL;

        $str .= "front [";
        /****************** 重点步骤（可与resize中循环逻辑互换） **********************/
        for ($i = $this->front; $i != $this->tail; $i=($i+1) % $this->capacity) {

            $str .= $this->array[$i];

            if (($i+1)%$this->capacity != $this->tail) {

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
        $queue = new LoopQueue(20);
        for ($i=0;$i<20;$i++){
            $queue->enqueue($i);
            var_dump($queue->toString());
            if ($i % 3 == 2){
                $queue->dequeue();
                var_dump($queue->toString());
            }

        }
    }

}