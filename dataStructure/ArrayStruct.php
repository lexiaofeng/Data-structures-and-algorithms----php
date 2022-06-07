<?php

namespace dataStructure;

use SplFixedArray;

class ArrayStruct
{
    // 数组实际元素
    private $size;

    // 用于存放数据
    private $data;

    // 用于标记数组的容量大小
    private $capacity;

    /**
     * 构造函数 定义数组容量
     * arrayStruct constructor.
     * @param int $capacity
     */

    public function __construct(int $capacity = 10)
    {
        $this->capacity = $capacity;
        $this->data = new SplFixedArray($capacity);
        $this->size =0;
    }

    /**
     * 获取数组元素个数
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;

    }

    /**
     * 获取数组的容量
     * @return int
     */
    public function getCapacity(): int
    {
        return count($this->data);

    }

    /**
     * 判断数组是否为空
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->size == 0;

    }

    /**
     * 向数组指定位置插入元素
     * @param int $index
     * @param $e
     */
    public function add(int $index, $e): void
    {
        if ($this->size == $this->data->count()) {
            $this->resize(2); //扩大到原来的2倍
        }
        if ($index < 0 || $index > $this->size) {
            echo "添加位置超出数组大小";
            exit;
        }

//为了方便理解，[1,2,4,5,6],假设 $index = 3; $e = 100,插入之后[1,2,4,100,5,6]
        for ($i = $this->size-1; $i >= $index; $i--) {
            $this->data[$i+1] = $this->data[$i];
        }
        $this->data[$index] = $e;
        $this->size++;

    }

    /**
     * 向数组末尾添加元素
     * @param $e
     */
    public function addLast($e): void
    {
        $this->add($this->size, $e);

    }

    /**
     * 向数组开头插入元素
     * @param $e
     */
    public function addFirst($e): void
    {
        $this->add(0, $e);

    }

    /**
     * 获取 index 位置数组元素
     * @param int $index
     * @return mixed
     */
    public function get(int $index)
    {
        if ($index < 0 || $index > $this->size) {
            echo "index值超出元素的位置范围，";
            exit;
        }

        return $this->data[$index];

    }

    /**
     * 获取数组最后一个元素
     * @return mixed
     */
    public function getLast()
    {
        return $this->get($this->size-1);
    }

    /**
     * 获取数组第一个元素
     * @return mixed
     */
    public function getFirst()
    {
        return $this->get(0);
    }

    /**
     * 判断数组中是否存在某个元素
     * @param $e
     * @return bool
     */
    public function contains($e): bool
    {
        for ($i = 1; $i < $this->size; $i++) {
            if ($this->data[$i] == $e) {
                return true;
            }
        }
        return false;

    }

    /**
     * 查某个元素在数组的位置索引值，若不存在则返回 -1
     * @param $e
     * @return int
     */
    public function find($e): int
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $e) {
                return $i;
            }
        }
        return -1;

    }


    /**
     * 删除数组指定位置元素，返回删除元素的值
     * @param $index
     * @return mixed
     */
    public function remove($index)
    {
        if ($index < 0 || $index > $this->size) {
            echo "index值超出元素的位置范围，";
            exit;
        }
        $e = $this->data[$index];
        for ($i = $index+1; $i < $this->size; $i++) {
            $this->data[$i-1] = $this->data[$i];
        }
        $this->size--;
        $this->data[$this->size] = null;
        /** 若当前数组大小，小于容量的一半，则重新分配一半的数组空间大小 (lazy加载) **/
        if ($this->size <= $this->capacity / 4 && $this->capacity % 2 == 0 && $this->capacity / 2 != 0) {
            $this->resize(0.5);
        }

        return $e;
    }

    /**
     * 删除数组首个元素，返回删除元素的值
     */
    public function removeFirst()
    {
        return $this->remove(0);

    }

    /**
     * 删除数组首个元素，返回删除元素的值
     */
    public function removeLast()
    {
        return $this->remove($this->size-1);

    }

    /**
     * 删除数组中特定元素
     * @param $e
     */
    public function removeElement(int $e)
    {
        $index = $this->find($e);
        if ($index !=-1){
            $this->remove($index);
        }

    }

    /**
     * 数组扩容，若是其他语言，如JAVA这里需要重新开辟空间
     * @param $factor
     */
    protected function resize($factor)
    {
        $this->capacity = $factor * $this->capacity;
        $new_data = new SplFixedArray($this->capacity);
        for ($i=0;$i<$this->size;$i++){
            $new_data[$i] = $this->data[$i];
        }

        $this->data = $new_data;

    }

    /**
     * 将数组转化为字符串
     * @return string
     */
    public function toString(): string
    {

        $str = 'Array: size = ' . $this->size . ',' . 'capacity = ' . $this->capacity . PHP_EOL;

        $str .= "[";
        for ($i = 0; $i < $this->size; $i++) {

            $str .= $this->data[$i];

            if ($i != $this->size - 1) {

                $str .= ',';

            }

        }

        $str .= "]";
        return $str;

    }

    public function test()
    {
        $count = 10000;
        $starttime = microtime('get_as_float');
        $arr = new arrayStruct($count);
        for ($i=0;$i<$count;$i++){
            $arr->add($i,$i);
        }
        for ($i=0;$i<$count;$i++){
            $arr->remove(0);
        }
        $endtime = microtime('get_as_float');

        return $endtime-$starttime;
    }

}