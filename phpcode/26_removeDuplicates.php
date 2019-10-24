<?php
/*
题目：[删除排序数组中的重复项]
给定一个排序数组，你需要在原地删除重复出现的元素，使得每个元素只出现一次，返回移除后数组的新长度。
不要使用额外的数组空间，你必须在原地修改输入数组并在使用 O(1) 额外空间的条件下完成。

示例 1:
    给定数组 nums = [1,1,2],
    函数应该返回新的长度 2, 并且原数组 nums 的前两个元素被修改为 1, 2。
    你不需要考虑数组中超出新长度后面的元素。
示例 2:
    给定 nums = [0,0,1,1,1,2,2,3,3,4],
    函数应该返回新的长度 5, 并且原数组 nums 的前五个元素被修改为 0, 1, 2, 3, 4。
    你不需要考虑数组中超出新长度后面的元素。
说明:
    为什么返回数值是整数，但输出的答案是数组呢?
    请注意，输入数组是以“引用”方式传递的，这意味着在函数里修改输入数组对于调用者是可见的。

思路：
    [1] 传入的数组本身有序；
    [2] 引用传值，也就是会直接改变数组的值。原地修改数组；
    [3] 不适用额外的存储空间,额外复杂度为O(1)；
    另外我们知道数组的有序的。也就是我们只需要比较前后两个值就可以然后进行去除一个
    [边界情况]
        如果数组为空，直接返回为空数组，元素个数为0
        如果只有一个值，那么就直接返回就行，元素个数为1 数组也不用改变

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/remove-duplicates-from-sorted-array
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
     //执行用时 :28 ms, 在所有 php 提交中击败了81.97%的用户
     //内存消耗 :16.9 MB, 在所有 php 提交中击败了21.72%的用户
    function removeDuplicates(&$nums) {
         $len = count($nums);//原数组的长度
         if($len<=0) return 0;
         if($len==1) return 1;
         for($i=0; $i<$len-1; $i++) {
             if($nums[$i] == $nums[$i+1]){
                 unset($nums[$i]);//去除重复的值  但是最后的数组索引会乱
             }
         }
         return count($nums);
    }

    //双指针  $i慢指针 $j快指针
    //执行用时 :28 ms, 在所有 php 提交中击败了81.97%的用户
    //内存消耗 :16.7 MB, 在所有 php 提交中击败了64.79%的用户
    function removeDuplicates2(&$nums) {
        $len = count($nums);//原数组的长度
        if($len<=0) return 0;
        if($len==1) return 1;
        $i = 0;//慢指针
        for($j=1; $j<$len; $j++) {
            if($nums[$j] != $nums[$i]) {//遇到相邻两个不相等的时候
                $i++;
                $nums[$i] = $nums[$j];//把后面的值向前移动
            }
        }
        return  $i+1;
    }
}
$obj = new Solution();
$nums= [1,1,1,4,5,5,8,88,99,99];
$size= $obj->removeDuplicates2($nums);
echo $size;
var_dump($nums);
