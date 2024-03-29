<?php
/*
219.[存在重复元素 II]
给定一个整数数组和一个整数 k，判断数组中是否存在两个不同的索引 i 和 j，
使得 nums [i] = nums [j]，并且 i 和 j 的差的绝对值最大为 k。

示例 1:
    输入: nums = [1,2,3,1], k = 3
    输出: true
示例 2:
    输入: nums = [1,0,1,1], k = 1
    输出: true
示例 3:
    输入: nums = [1,2,3,1,2,3], k = 2
    输出: false


[THINKING]
- 哈希法
    - 维护一个哈希表，里面始终最多包含 k 个元素，当出现重复值时则说明在 k 距离内存在重复元素
    - 每次遍历一个元素则将其加入哈希表中，如果哈希表的大小大于 k，则移除最前面的数字



来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/contains-duplicate-ii
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k) {
         $size = sizeof($nums);
         $hash = [];
        for($i=0; $i<$size; $i++) {
            if(isset($hash[$nums[$i]]) && ($i - $hash[$nums[$i]]) <= $k ) {
                return true;
            }
            $hash[$nums[$i]] = $i;
        }
        return false;
    }
}
$obj    = new Solution();
$nums   = [1,2,3,1];
$k      = 3;
$re     = $obj->containsNearbyDuplicate($nums,$k);
var_dump($re);
