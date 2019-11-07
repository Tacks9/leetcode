<?php
/*
167.[两数之和 II - 输入有序数组]
给定一个已按照升序排列 的有序数组，找到两个数使得它们相加之和等于目标数。
函数应该返回这两个下标值 index1 和 index2，其中 index1 必须小于 index2。

说明:
    返回的下标值（index1 和 index2）不是从零开始的。
    你可以假设每个输入只对应唯一的答案，而且你不可以重复使用相同的元素。
示例:
    输入: numbers = [2, 7, 11, 15], target = 9
    输出: [1,2]
    解释: 2 与 7 之和等于目标数 9 。因此 index1 = 1, index2 = 2 。

【思路】
- 哈希法
    - 声明一个$map 哈希数组
    - 遍历整个数组，然后利用目标值，减轻当前元素，得到另一个值$re
    - 如果$re存在哈希数组中，就返回对应当前位置，和哈希数组中的位置
    - 如果不存在，那么将$re加入哈希数组中，$map[值]=下标
    - 但是转念一想，貌似这个并没有用到有序数组。！！！
    - 时间复杂度O(1)
    - 空间复杂度O(2)
- 双指针
    - 这个方法真的绝！！！
    - 由于数组是有序的，从小到大！！！
    - 初始化：一个指向第一个元素，一个指向最后一个元素
    - 然后求两个指针指向的和，与目标值比较
    - 如果和大于目标值，那么较大的指针向左移动，--
    - 如果和小于目标值，那么教小的指针向右移动，++
    - 时间复杂度：O(n)。每个元素最多被访问一次，共有 n 个元素。
    - 空间复杂度：O(1)。
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/two-sum-ii-input-array-is-sorted
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/


class Solution {

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
     // HashMap哈希数组实现
     // 执行用时 :32 ms, 在所有 php 提交中击败了22.78%的用户
     // 内存消耗 :16.4 MB, 在所有 php 提交中击败了93.33%的用户
    function twoSum($numbers, $target) {
        $map = [];
        foreach ($numbers as $k => $v) {
            $re = $target - $v;// 获得另一个差值
            if(isset($map[$re])) {
                return [$map[$re]+1, $k+1];// 返回两个位置，不是下标
            }
            $map[$v] = $k;// 构建 以值对应键的 哈希
        }
    }

    // 双指针
    // 执行用时 :20 ms, 在所有 php 提交中击败了79.75%的用户
    // 内存消耗 :
    function twoSum2($numbers, $target) {
        $size = sizeof($numbers);
        if($size < 2) return [0,0]; // 如果数组中没有两个以上的数字，直接返回
        $left = 0;
        $right= $size-1;
        while($left < $right) {
            $sum = $numbers[$left] + $numbers[$right];
            if($sum == $target) {
                return [++$left,++$right]; // 返回位置
            }elseif($sum > $target) { // 和大
                --$right;
            }else{ // 和小
                ++$left;
            }
        }
        return [0,0];
    }
}

$numbers  = [2, 7, 11, 15];
$target   = 9;
$obj      = new Solution();
$res      = $obj->twoSum2($numbers,$target);
var_dump($res);
