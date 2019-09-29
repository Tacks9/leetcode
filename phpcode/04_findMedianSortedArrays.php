<?php
/*
【寻找两个有序数组的中位数】
题目：
    给定两个大小为 m 和 n 的有序数组 nums1 和 nums2。
    请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。

    你可以假设 nums1 和 nums2 不会同时为空。
示例：
    nums1 = [1, 2]
    nums2 = [3, 4]
    两个合并在一起也就是 1，2，3，4
    则中位数是 (2 + 3)/2 = 2.5

难度：
    在复杂度要求上可以进行二分实现

思考：
    中位数的定义：将一个集合划分为两个长度相等的子集，其中一个子集中的元素总是大于另一个子集中的元素。

    实际上 是将两个有序序列合并在一起，然后求其中位数（奇数： 中间，偶数: (中间+下一个数)/2 ）


但是我用的是暴力的方法

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/median-of-two-sorted-arrays
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

/*
[1] array_merge() https://www.php.net/array_merge   合并两个数组
    array_merge ( array $array1 [, array $... ] ) : array
    将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组。

    如果数组字符串键名冲突：则该键名后面的值将覆盖前一个值
    如果数组是数字键名：   后面的值将不会覆盖原来的值，而是附加到后面。

[2] sort() https://www.php.net/manual/zh/function.sort.php — 对数组排序
    sort ( array &$array [, int $sort_flags = SORT_REGULAR ] ) : bool

    本函数对数组进行排序。当本函数结束时数组单元将被从最低到最高重新安排。

*/
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
     //执行用时 :44 ms, 在所有 PHP 提交中击败了72.41%的用户
     //内存消耗 :15.2 MB, 在所有 PHP 提交中击败了5.12%的用户
     function findMedianSortedArrays($nums1, $nums2) {
          $arr = array_merge($nums1, $nums2);
          sort($arr);//排序后
          $size= count($arr);//数组长度

          if($size%2 == 1) {
              /*
                例如 arr = [1,2,3] 她的中位数实际上是 2 也就是arr[1]
                那么    size = 3 => size/2 = 1.5  中位数 1.5-1 => 0.5 => 0
                应该这样 size = 3 =>(size+1)/2 = 2 => 中位数 2-1 => 1
              */
              $median =  $arr[($size+1)/2-1];//下标从0开始
          }else {
              $median = ($arr[$size/2-1] + $arr[$size/2]) /2;
          }
          $median = sprintf("%.1f",$median);//保留一位小数
          return $median;
     }


}

$obj = new Solution();

$nums1 = [2,5];

$nums2 = [2,2];
$res   = $obj->findMedianSortedArrays($nums1,$nums2);
var_dump($res);
