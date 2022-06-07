<?php


namespace dataStructure\Queue;


use Exception;
use SplFixedArray;

class Deque
{
    private $data;

    private $front;

    private $tail;

    private $size;

    public function __construct($capacity=10)
    {
        $this->data = new SplFixedArray($capacity);
        $this->size=0;
        $this->tail=0;
        $this->front=0;
    }

    public function getCapacity():int
    {
        return count($this->data);
    }

    public function isEmpty():bool
    {
        return $this->size==0;
    }

    public function getSize():int
    {
        return $this->size;
    }

    // addLast 的逻辑和我们之前实现的队列中的 enqueue 的逻辑是一样的
    public function addLast($e):void
    {
        if ($this->size == $this->getCapacity()){
            $this->resize($this->getCapacity()*2);
        }
        $this->data[$this->tail]=$e;
        $this->tail = ($this->tail+1) % count($this->data);
        $this->size++;
    }

    public function addFront($e):void
    {
        if ($this->size == $this->getCapacity()){
           $this->resize($this->getCapacity()*2);
        }

        $this->front = $this->front == 0 ? $this->data->count() - 1 : $this->front-1;
        $this->data[$this->front] = $e;
        $this->size++;
    }

    // removeFront 的逻辑和我们之前实现的队列中的 dequeue 的逻辑是一样的
    public function removeFront()
    {
        try{
            if ($this->isEmpty()) {
                throw new Exception("Cannot removeFront from an empty deque");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }

        $ret = $this->data[$this->front];
        $this->data[$this->front] = null;
        $this->front = ($this->front+1) % count($this->data);
        $this->size--;

        if ($this->getSize() == $this->getCapacity()/4 && $this->getCapacity()/2 !=0){
            $this->resize($this->getCapacity()/2);
        }

        return $ret;

    }

    public function removeLast()
    {
        try{
            if ($this->isEmpty()) {
                throw new Exception("Cannot removeLast from an empty deque");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }

        $this->tail =  $this->tail ==0 ? count($this->data) - 1 : $this->tail -1;
        $ret = $this->data[$this->tail];
        $this->data[$this->tail] = null;
        $this->size--;

        if ($this->getSize() == $this->getCapacity()/4 && $this->getCapacity()/2 !=0){
            $this->resize($this->getCapacity()/2);
        }

        return $ret;

    }

    public function getFront()
    {
        try{
            if ($this->isEmpty()) {
                throw new Exception("Deque is empty");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }

        return $this->data[$this->front];
    }

    // 因为是双端队列，我们也有一个 getLast 的方法，来获取队尾元素的值
    public function getLast()
    {
        try{
            if ($this->isEmpty()) {
                throw new Exception("Deque is empty");
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }

        return $this->data[$this->tail];
    }

    public function resize(int $capacity):void
    {
        $new_data = new SplFixedArray($capacity);
        for ($i=0;$i<$this->size;$i++){
            $new_data[$i] = $this->data[($i+$this->front) % count($this->data)];
        }

        $this->data = $new_data;
        $this->front=0;
        $this->tail=$this->size;
    }

    public function toString(): string
    {

        $str = 'Deque: size = ' . $this->size . ',' . 'capacity = ' . $this->getCapacity() . PHP_EOL;

        $str .= "front [";
        for ($i = 0; $i < $this->size; $i++) {

            $str .= $this->data[($i+$this->front)%count($this->data)];

            if ($i!= $this->size-1) {

                $str .= ',';

            }

        }

        $str .= "] tail";
        return $str;

    }


    public function test()
    {
        // 在下面的双端队列的测试中，偶数从队尾加入；奇数从队首加入
        $queue = new Deque();
        for ($i=0;$i<16;$i++){
            if ($i%2==0){
                $queue->addLast($i);
            }else{
                $queue->addFront($i);
            }
            var_dump($queue->toString());
        }
        var_dump('/********************************************************************************/');
        // 之后，我们依次从队首和队尾轮流删除元素
        for ($i=0;!$queue->isEmpty();$i++){
            if ($i%2==0){
                $queue->removeFront($i);
            }else{
                $queue->removeLast($i);
            }
            var_dump($queue->toString());
        }

    }

}