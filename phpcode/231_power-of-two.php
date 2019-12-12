<?php
/*
231.[2的幂]
给定一个整数，编写一个函数来判断它是否是 2 的幂次方。

示例 1:
    输入: 1
    输出: true
    解释: 20 = 1
示例 2:
    输入: 16
    输出: true
    解释: 24 = 16
示例 3:
    输入: 218
    输出: false

[思考]
- 如果 n=2^x 而且x为自然数
    - 那么一定有 n & (n-1) == 0
    - n的最高位为1 其余为都是0
    - n-1的二进制最高位为0，其余位置都是 1
- 例如
    - 2^3       =  8 => 1000
    - 2^3 - 1   =  7 => 0111
- 所以
    - n>0
    - n & (n-1) == 0
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/power-of-two
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
     // 执行用时 :4 ms, 在所有 php 提交中击败了97.44%的用户
     // 内存消耗 :15 MB, 在所有 php 提交中击败了15.15%的用户
     // 与运算
    function isPowerOfTwo($n) {
        return $n>0 && ($n & ($n-1)) == 0;
    }

    // 暴力法
    // 执行用时 :4 ms, 在所有 php 提交中击败了97.44%的用户
    // 内存消耗 :14.9 MB, 在所有 php 提交中击败了15.15%的用户
    function isPowerOfTwo2($n) {
        // 2的几次幂 一定是正的
        if($n<0) return false;
        // 2的0次幂
        if($n==1) return true;
        $num = 2;
        while($num <= $n) {
            if($num == $n) {
                return true;
            }else{
                $num*=2;
            }
        }
        return false;
    }
}


$obj  = new Solution();
$n    = 256;
$res  = $obj->isPowerOfTwo2($n);
var_dump($res);
