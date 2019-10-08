<?php
/*
[整数反转]
题目：
    给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。

示例 1:
    输入: 123
    输出: 321
示例 2:
   输入: -123
   输出: -321
示例 3:
   输入: 120
   输出: 21
注意:
假设我们的环境只能存储得下 32 位的有符号整数，则其数值范围为 [−2^31,  2^31 − 1]。请根据这个假设，如果反转后整数溢出那么就返回 0。


思路：
    1. 利用取模
   来源：力扣（LeetCode）
   链接：https://leetcode-cn.com/problems/reverse-integer
   著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
     //执行用时 :8 ms, 在所有 PHP 提交中击败了86.81%的用户
     //内存消耗 :14.5 MB, 在所有 PHP 提交中击败了90.98%的用户
    function reverse($x) {
        //判断是否整数
        if(!is_int($x)) return 0;
        $max = pow(2,31) - 1;
        $min = pow(-2,31);
        $res = 0;//倒叙的数字
        while($x>=10 || $x<=-10) {//只要不是个位数，就一直循环
            $mod = $x%10;//余数
            $x   = ($x-$mod)/10;
            $res = $res*10 + $mod;//倒叙的数字
        }
        //防止溢出
        if ($res > $max) return 0;
        if ($res < $min) return 0;
        return $res*10 + $x;
    }

    //执行用时 :16 ms, 在所有 PHP 提交中击败了30.14%的用户
    //内存消耗 :14.5 MB, 在所有 PHP 提交中击败了90.98%的用户
    //利用字符串函數來處理數字還是慢一些
    function reverse2($x) {
        $max = pow(2,31) - 1;
        $min = pow(-2,31);
        if(!is_int($x) || $x == 0 ) {
            return 0;
        }else{
            if($x > 0) {
                $res = (int)(strrev($x));//利用字符串函數
                return $res>$max?0:$res;//防止溢出
            }else {
                $x   = 0-$x;
                $res = -(int)(strrev($x));
                return $res<$min?0:$res;
            }
        }
    }
}

$obj = new Solution();

$x   = 13782201;
$res = $obj->reverse2($x);
var_dump($res);
