<?php
/*
66.[加一]
给定一个由整数组成的非空数组所表示的非负整数，在该数的基础上加一。
最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。
你可以假设除了整数 0 之外，这个整数不会以零开头。

示例 1:
    输入: [1,2,3]
    输出: [1,2,4]
    解释: 输入数组表示数字 123。
示例 2:
    输入: [4,3,2,1]
    输出: [4,3,2,2]
    解释: 输入数组表示数字 4321。

【思路】
- 遍历法
    - 非负整数数组=>每个元素只能是 0 1 2 3 4 5 6 7 8 9
    - 然后数组末尾的元素+1 要考虑到进位的问题；
    - 末尾无进位：直接末尾元素加1
    - 末尾有进位，中间位置停止进位，没有移除数组：需要判断进位的标志，然后当前位为 0，则前一位加 1
    - 末位有进位，并且一直进位到最前方导致结果多出一位，进行单独处理，比如 999 => 1000
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/plus-one
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/


class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
      // 遍历取余法
     // 执行用时 :8 ms, 在所有 php 提交中击败了73.83%的用户
     // 内存消耗 :14.8 MB, 在所有 php 提交中击败了23.46%的用户
    function plusOne($digits) {
        $size = sizeof($digits);
        for($i=$size-1; $i>=0; $i--) {
            $digits[$i]++;
            $digits[$i] %= 10;// 如果是10那么取余就是0
            if($digits[$i] != 0) {// 如果不是等于0 那么就表示，不需要进位
                return $digits;
            }
            // 如果等于0 表明接下来要开始 循环+1进位了  $digits[$i]++;
        }
        // 如果最后 遍历到数组第一位，取余后还不是等于0，那么就特殊处理
        // 开头是1 后面都是0
        $digits[$size] = 0;// 末尾添加0单元
        $digits[0]     = 1;// 首位变1
        return $digits;
    }
}

$obj    = new Solution();
$digits = [9,9,9,9];
$re     = $obj->plusOne($digits);
var_dump($re);
