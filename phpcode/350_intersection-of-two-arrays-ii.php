<?php
/*
350.[两个数组的交集II]
给定两个数组，编写一个函数来计算它们的交集。

示例 1:
    输入: nums1 = [1,2,2,1], nums2 = [2,2]
    输出: [2,2]
示例 2:
    输入: nums1 = [4,9,5], nums2 = [9,4,9,8,4]
    输出: [4,9]

[思路]
- 不能去重
- 排序 + 双指针
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/intersection-of-two-arrays-ii
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        // 排序
        sort($nums1);
        sort($nums2);
        // 返回的交集
        $res = [];
        $i = $j = 0;
        // 如果有哪个数组遍历结束，则循环结束
        while($i < count($nums1) && $j < count($nums2)) {
            // 交集放在结果集中
            if($nums1[$i] == $nums2[$j]) {
                $res[] = $nums1[$i];
                ++$i;
                ++$j;
            }elseif($nums1[$i] < $nums2[$j]){
                // 谁小谁移动
                ++$i;
            }else{
                ++$j;
            }
        }
        return $res;
    }
}
$obj   = new Solution();
$nums1 = [1,2,2,1];
$nums2 = [2,2];
$res   = $obj->intersect($nums1,$nums2);
var_dump($res);
