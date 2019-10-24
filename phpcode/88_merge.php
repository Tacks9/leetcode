<?php
/*
[合并两个有序数组]
给定两个有序整数数组 nums1 和 nums2，将 nums2 合并到 nums1 中，使得 num1 成为一个有序数组。

说明:
    初始化 nums1 和 nums2 的元素数量分别为 m 和 n。
    你可以假设 nums1 有足够的空间（空间大小大于或等于 m + n）来保存 nums2 中的元素。

示例:
输入:
    nums1 = [1,2,3,0,0,0], m = 3
    nums2 = [2,5,6],       n = 3

输出: [1,2,2,3,5,6]


思路：
    nums1 有足够的空间（空间大小大于或等于 m + n） 意思是将最后合并的数列都放在nums1
    由于数组有序的。
    这个题一看到就知道也是用双指针,方向却也有不同;

     [1]两个个指针从前向后：
        O(n+m)的时间复杂度。O(m) 的空间复杂度。
        两个都指针分别指向每个数组的开头：
        但是需要额外的空间复杂度来存储 合并后的数组；
        最终的输出数组在nums1中
     [2]两个指针从后向前：
        两个指针分别指向每个数组的尾部：
        这样不用额外的空间。
     [3]两个有序整数数组 
        两个近似有序，我们可以想到插入排序
        直接先，将两个数组进行合并到一起，然后使用插入排序。
     [4]使用PHP内置函数

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/merge-sorted-array
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m  元素个数
     * @param Integer[] $nums2
     * @param Integer $n 元素个数
     * @return NULL
     */
     // 执行用时 :4 ms, 在所有 php 提交中击败了99.34%的用户
     // 内存消耗 :15 MB, 在所有 php 提交中击败了5.56%的用户
     // 思路一 ：两个指针都从前到后，需要额外的数组
    function merge(&$nums1, $m, $nums2, $n) {
           $copy = $nums1; //拷贝一份
           $p1   = $p2 = 0;//两个指针
           $p    = 0;
           //两个 有序整数数组 可能有一方先循环结束
           while (($p1 < $m) && ($p2 < $n)) {
               $nums1[$p++] =  ($copy[$p1] < $nums2[$p2]) ? $copy[$p1++] : $nums2[$p2++];
           }
           //如果 $nums1 先循环结束
           if($p1 >= $m) {
               while ($p2 < $n){
                   $nums1[$p++] = $nums2[$p2++];
               }
           }
            //如果 $nums2 先循环结束
           if($p2 >= $n) {
               while ($p1 < $m){
                   $nums1[$p++] = $copy[$p1++];
               }
           }
           $nums1 = array_splice($nums1, 0, $m+$n);
    }


    //执行用时 8 ms, 在所有 php 提交中击败了85.53%的用户
    //内存消耗 14.9 MB, 在所有 php 提交中击败了20.00%的用户
    // 思路二：双指针 从后往前开始。不需要额外的空间
     function merge2(&$nums1, $m, $nums2, $n) {
           //两个指针的下标
           $p1 = $m - 1;
           $p2 = $n - 1;
           $p  = $m + $n - 1;//指向 nums1合并后末尾的位置
           while(($p1 >=0) && ($p2 >=0)) {
               $nums1[$p--] = ($nums1[$p1] < $nums2[$p2]) ? $nums2[$p2--] : $nums1[$p1--];//谁大，把谁放在末尾
           }
            //当然也有可能nums1都很大，已经循环结束，但是nums2还没合并过去
            while ($p1 < 0 && $p2 >= 0) {
                $nums1[$p--] = $nums2[$p2 --];
            }
            $nums1 = array_splice($nums1, 0, $m+$n);
     }

     //执行用时  12 ms, 在所有 php 提交中击败了58.55%的用户
     //内存消耗  12 ms, 在所有 php 提交中击败了58.55%的用户
     //思路三： 采用插入排序（特点 针对近乎有序的数组比较快）
     function merge3(&$nums1, $m, $nums2, $n) {
         $i = $j = 0;
         $size = sizeof($nums1);// 实际上两个数组合并后  有效元素是 $m+$n个
         for($i=$m,$j=0; $i<$size,$i<$m+$n; $i++,$j++) {
             $nums1[$i] = $nums2[$j];
         }
         //进行插入排序
         $i = $j = 0;
         for($i=1; $i<$m+$n; $i++) {
             $temp = $nums1[$i];
             for($j=$i; $j>0 && $temp<$nums1[$j-1]; $j--) {//循环和前面的值进行 比较
                 $nums1[$j] = $nums1[$j-1];//小于就往前赋值
             }
             $nums1[$j] = $temp;//j就是我们要插入的位置
         }

         $nums1 = array_splice($nums1, 0, $m+$n);
     }

     //执行用时 :8 ms, 在所有 php 提交中击败了85.53%的用户
     //内存消耗 :15.1 MB, 在所有 php 提交中击败了5.56%的用户
     //思路四： 使用PHP内置函数
     function merge4(&$nums1, $m, $nums2, $n) {
         array_splice($nums1, $m);//删除后面的空位置
         $nums1 = array_merge($nums1, $nums2);//直接合并两个数组
         sort($nums1);//然后进行排序
     }



}

$obj = new Solution();
$nums1 = [8,10,15,0,0,0,0];
$nums2 = [2,5,6];
$m = 3;
$n = 3;

$obj->merge2($nums1,$m,$nums2,$n);
var_dump($nums1);
