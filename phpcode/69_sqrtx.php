<?php

/*
69.[x 的平方根]
实现 int sqrt(int x) 函数。
计算并返回 x 的平方根，其中 x 是非负整数。
由于返回类型是整数，结果只保留整数的部分，小数部分将被舍去。

示例 1:
    输入: 4
    输出: 2
示例 2:
    输入: 8
    输出: 2
    说明: 8 的平方根是 2.82842...,
    由于返回类型是整数，小数部分将被舍去。

- 二分查找法
    - 搜索平方根的思想很简单，其实就是“猜”，但是是有策略的“猜”。
    - 用“排除法”在有限的区间里，一次排除一半的区间元素，
    - 最后只剩下一个数，这个数就是题目要求的向下取整的平方根整数。
    - 一个数的平方根肯定不会超过它自己，
    - 一个数的平方根最多不会超过它的一半
 

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/sqrtx
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
     // 二分法
    function mySqrt($x) {
         if($x <=0 )  return 0; // 边界判断
         $left = 1;
         $right= ceil($x / 2);
         while($left < $right) {
             // $mid = $left + ($right - $left + 1) / 2
             $mid   = ($left + $right + 1) >> 1;
             $square= $mid * $mid;
             if($square > $x) {
                 $right  = $mid - 1;
             }else{
                 $left   = $mid;
             }
         }
         return $left;
    }
}

$obj = new Solution();
$x   = 9;
echo $obj->mySqrt($x);
