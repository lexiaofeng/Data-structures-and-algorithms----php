<?php


namespace helper;


use dataStructure\Queue\ArrayQueue;
use dataStructure\Queue\LinkedListQueue;
use dataStructure\Queue\LoopQueue;
use dataStructure\Queue\Queue;

class QueueTest
{
    public function __construct()
    {
    }

    public static function queueTest(Queue $queue, int $count)
    {
        $starttime = microtime('get_as_float');

        for ($i=0;$i<$count;$i++){
            $queue->enqueue(rand(0,$count));
        }

        for ($i=0;$i<$count;$i++){
            $queue->dequeue();
        }


        $endtime = microtime('get_as_float');

        return $endtime - $starttime;
    }

    public function compareTest($count=10000)
    {
        $arrayqueue = new ArrayQueue();
        $time1 = $this->queueTest($arrayqueue,$count);
        var_dump("ArrayQueue:".$time1);

        $loopqueue = new LoopQueue();
        $time2 = $this->queueTest($loopqueue,$count);
        var_dump("LoopQueue:".$time2);

        $linkedlistqueue = new LinkedListQueue();
        $time3 = $this->queueTest($linkedlistqueue,$count);
        var_dump("LinkedListQueue:".$time3);

    }


}