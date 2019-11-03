<?php
/*
1013.[将数组分成和相等的三个部分]

题目：
    给定一个整数数组 A，只有我们可以将其划分为三个和相等的非空部分时才返回 true，否则返回 false。
    形式上，如果我们可以找出索引 i+1 < j 且满足 
(A[0] + A[1] + ... + A[i] == A[i+1] + A[i+2] + ... + A[j-1] == A[j] + A[j-1] + ... + A[A.length - 1]) 就可以将数组三等分。

提示：
    3 <= A.length <= 50000
    -10000 <= A[i] <= 10000

示例 1：
    输出：[0,2,1,-6,6,-7,9,1,2,0,1]
    输出：true
    解释：0 + 2 + 1 = -6 + 6 - 7 + 9 + 1 = 2 + 0 + 1
示例 2：
    输入：[0,2,1,-6,6,7,9,-1,2,0,1]
    输出：false
示例 3：
    输入：[3,3,6,5,-2,2,5,1,-9,4]
    输出：true
    解释：3 + 3 = 6 = 5 - 2 + 2 + 5 + 1 - 9 + 4
 
[思路]：
- 遍历法
  - 一个整型的数组，要三等分，那么一定元素之和可以被3整除。
  - 如果可以被3整除
  - 定义一个average 也就是元素之和的三分之一
  - 定义一个count   用来保存当前遍历等于average的部分，初始化为0
  - 遍历整个数组，依次相加各个元素，和为part，如果等于average那么count+1,并且重置part=0
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/partition-array-into-three-parts-with-equal-sum
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/


class Solution {

    /**
     * @param Integer[] $A
     * @return Boolean
     */
    function canThreePartsEqualSum($A) {
        $sum     = 0;// 数组总和
        $average = 0;// 三分之一
        $part    = 0;// 当前份的和
        $count   = 0;// 当前的份数
        $sum     = array_sum($A);// 求数组元素值的总和
        $average = $sum/3;
        if($sum%3 != 0) return false;// 如果不能整除直接返回
        foreach ($A as $value) {
            $part += $value;// 累计每段的和
            if($part == $average) {
                $count++;// 满足平均数的和
                $part = 0;// 重置
            }
        }
        // 如果最后不是三等分，或者还有剩余 返回false
        if($count != 3 || $part !=0 ) return false;
        // 最后成功返回true
        return true;
    }
}

$obj = new Solution();
$A   = [0,2,1,-6,6,7,9,-1,2,0,1];
$A   = [0,2,1,-6,6,-7,9,1,2,0,1];
$re  = $obj->canThreePartsEqualSum($A);
var_dump($re);
