<?php

//自动加载
include './Loder.php';
spl_autoload_register('Loader::autoload'); // 注册自动加载
//开启报错
error_reporting(E_ALL|E_STRICT);


use helper\arrayGenerator;
use helper\sortTest;
use algorithm\selectSort;
use dataStructure\arrayStruct;
use dataStructure\Stack\ArrayStack;
use algorithm\leetCodeSolution;
use dataStructure\Queue\ArrayQueue;
use dataStructure\Queue\LoopQueue;


//-----------------------------------------test-----------------------------------------




    /*************************************************************数据结构性能对比***************************************************************/
    //数组栈 和 链表栈 性能对比
//    $test = new \helper\StackTest();
//    echo '<pre>';var_dump($test->compareTest(1000000));exit;

    //测试循环队列与数组队列 性能差距
    //  数组队列 出队 是 O(n)
    //  循环队列 出队 是 O(1)
//    $test = new \helper\QueueTest();
//    echo '<pre>';var_dump($test->compareTest(10000));exit;





//链表队列
//$queue = new \dataStructure\Queue\LinkedListQueue();
//echo '<pre>';var_dump($queue->test());exit;



//    $linkedlist = new \dataStructure\LinkedList\LinkedList();
//    echo '<pre>';var_dump($linkedlist->test());exit;

//$stack = new \dataStructure\Stack\LinkedListStack();
//echo '<pre>';var_dump($stack->test());exit;




//    $leetcode = new leetCodeSolution();
//    $s = "([)]";
//
//    echo '<pre>';var_dump($leetcode->isValid($s));exit;




////双端队列
//$deque = new \dataStructure\Queue\Deque();
//echo '<pre>';var_dump($deque->test());exit;



//动态数组队列
//$queue = new ArrayQueue();
//$queue->test();

//循环队列
//$loopqueue = new LoopQueue();
//$loopqueue->test();




//    动态数组栈
//    $stack = new arrayStack(10);
//    for ($i=0;$i<11;$i++){
//        $stack->push($i*2);
//    }
//    $stack->pop();
////   echo '<pre>';var_dump($stack->pop());exit;
//    var_dump($stack->toString());exit;


////数组类测试
//  $starttime = microtime('get_as_float');
//     $arr = new arrayStruct(100000);
//     for ($i=0;$i<100000;$i++){
//         $arr->add($i,$i);
//     }
//for ($i=0;$i<100000;$i++){
//    $arr->remove(0);
//}
//$endtime = microtime('get_as_float');
//
////    $arr->removeLast();
////    $arr->removeFirst();
////    $arr->removeElement(0);
//     var_dump($arr->toString(),$endtime-$starttime);exit;
//$arr = new arrayStruct();
//$arr = new SplFixedArray(10);
//echo '<pre>';var_dump($arr);exit;
//echo '<pre>';var_dump($arr->test());exit;




//    $arr = arrayGenerator::generateOrderArray(10000,10000);
//    $arr = arrayGenerator::generateRandomArray(10000,10000);
//    $res = sortTest::sortTest('insertSort',$arr);
//    echo '<pre>';var_dump($res);exit;





/*************************************************************leetcode***************************************************************/
//$obj = new \algorithm\LeetCode\LeetCode225();
//$obj->push(1);
//$obj->push(2);
////echo '<pre>';var_dump($obj);exit;
////$ret_2 = $obj->pop();
////echo '<pre>';var_dump($ret_2,$obj);exit;
//$ret_3 = $obj->top();
//echo '<pre>';var_dump($obj,$ret_3);exit;
//$ret_4 = $obj->empty();

//$obj = new \algorithm\LeetCode232();
//$obj->push(1);
//$obj->push(2);
//$obj->push(3);
////echo '<pre>';var_dump($obj);exit;
//$obj->push(4);
////echo '<pre>';var_dump($obj->pop());exit;
//$obj->pop();
////echo '<pre>';var_dump($obj);exit;
//$obj->push(5);
////echo '<pre>';var_dump($obj);exit;
////echo '<pre>';var_dump($obj,$obj->pop());exit;
//
//$obj->pop();
//$obj->pop();
//
//echo '<pre>';var_dump($obj->pop());exit;



    $linkedlist = new \dataStructure\LinkedList\LinkedList();
    $linkedlist->addFirst(3);
    $linkedlist->addFirst(4);
    $linkedlist->addFirst(5);
    $linkedlist->addFirst(2);
    $linkedlist->addFirst(9);
    $linkedlist->addFirst(3);
//echo '<pre>';var_dump((string)$linkedlist);exit;

$test = new \algorithm\LeetCode\LeetCode203();
echo '<pre>';var_dump($test);exit;
//echo '<pre>';var_dump($test->removeElements($linkedlist->getFirst(),3));exit;

?>



