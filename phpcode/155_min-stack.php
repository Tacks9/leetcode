<?php

/*
155. [最小栈]
设计一个支持 push，pop，top 操作，并能在常数时间内检索到最小元素的栈。

push(x)  -- 将元素 x 推入栈中。
pop()    -- 删除栈顶的元素。
top()    -- 获取栈顶元素。
getMin() -- 检索栈中的最小元素。

【思路】
- 辅助栈
    - 借助辅助栈，用来存储当前栈的最小值
    - 入辅助栈时机：辅助栈为空，or ,新入栈的元素小于辅助栈顶元素
    - 出辅助栈时机：出栈的元素与辅助栈顶元素值相等
    - 获取栈的最小元素：那么就从辅助栈 弹出栈顶元素就可以了

【函数】
- array_push(&$arr,$value)
    - array_push() 将 array 当成一个栈，并将传入的变量压入 array 的末尾。
    - array 的长度将根据入栈变量的数目增加。
- array_pop(&$arr)
    - array_pop() 弹出并返回 array 数组的最后一个单元，并将数组 array 的长度减一。
- end(&$arr)
    - end() 将 array 的内部指针移动到最后一个单元并返回其值。
    - 返回数组的最后一个元素，也就是栈顶元素。
    
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/min-stack
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class MinStack {
    // 初始化两个空栈
    private $data   = []; // 数据栈
    private $helper = []; // 辅助栈 => 用于存储最小元素
    /**
     * initialize your data structure here.
     */
    function __construct() {

    }

    /**
     * @param Integer $x
     * @return NULL
     */
     // 入栈
    function push($x) {
        array_push($this->data,$x);// 先入数据栈
        // 判断是否进入辅助栈
        if(empty($this->helper)  ||  end($this->helper) >= $x) {
            // 入辅助栈时机  辅助栈为空， 或者 新元素 小于 辅助栈顶元素
            array_push($this->helper,$x);
        }
    }

    /**
     * @return NULL
     */
     // 出栈
    function pop() {
        // 当出栈元素 等于 辅助栈顶元素
        if( array_pop($this->data) == end($this->helper)) {
              array_pop($this->helper);// 辅助栈出
        }
    }

    /**
     * @return Integer
     */
     // 当前栈顶元素
    function top() {
        return end($this->data);
    }

    /**
     * @return Integer
     */
     // 最小元素
    function getMin() {
        // 也就是辅助站的元素
         return end($this->helper);
    }
}


$obj = new MinStack();
$obj->push(0);
$obj->push(1);
$obj->push(0);
echo '[getMin]',$obj->getMin();
echo '[top]',$obj->top();
echo '[getMin]',$obj->getMin();

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */
