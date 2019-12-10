<?php
/*
13.[罗马数字转整数]
给定一个罗马数字，将其转换成整数。输入确保在 1 到 3999 的范围内。

罗马数字包含以下七种字符: I， V， X， L，C，D 和 M。

    字符          数值
    I             1
    V             5
    X             10
    L             50
    C             100
    D             500
    M             1000
例如， 罗马数字 2 写做 II ，即为两个并列的 1。12 写做 XII ，即为 X + II 。 27 写做  XXVII, 即为 XX + V + II 。

通常情况下，罗马数字中小的数字在大的数字的右边。但也存在特例，
例如 4 不写做 IIII，而是 IV。
数字 1 在数字 5 的左边，所表示的数等于大数 5 减小数 1 得到的数值 4 。

同样地，数字 9 表示为 IX。这个特殊的规则只适用于以下六种情况：
    I 可以放在 V (5) 和 X (10) 的左边，    来表示  IV 4 和 IX 9。
    X 可以放在 L (50) 和 C (100) 的左边，  来表示  XL 40和 X  C 90。 
    C 可以放在 D (500) 和 M (1000) 的左边，来表示  CD 400和CM 900。

示例 1:
    输入: "III"
    输出: 3
示例 2:
    输入: "IV"
    输出: 4
示例 3:
    输入: "IX"
    输出: 9
示例 4:
    输入: "LVIII"
    输出: 58
    解释: L = 50, V= 5, III = 3.
示例 5:
    输入: "MCMXCIV"
    输出: 1994
    解释: M = 1000, CM = 900, XC = 90, IV = 4.

【思路】
- 正常解法
    - 利用哈希表存储罗马数字对应的整数
    - 遍历字符串
        - 情况1
            - 如果左边大于右边 （大多数是这样的情况）
            - 那么直接利用哈希表中存储的对应关系，转化为整数，然后累加
        - 情况2
            - 如果左边小于右边 （少数这样情况，题意已经说明了）
            - 那么就用后一位减去前一位
            - 同时遍历的要跳过下一位，直接到下下位置

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/roman-to-integer
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
     // 执行用时 :20 ms, 在所有 php 提交中击败了71.88%的用户
     //内存消耗 : 14.6 MB, 在所有 php 提交中击败了79.45%的用户
    function romanToInt($s) {
        // 哈希映射表
        $map =  [
          'I' => 1,
          'V' => 5,
          'X' => 10,
          'L' => 50,
          'C' => 100,
          'D' => 500,
          'M' => 1000
        ];
        $len = strlen($s);
        $res = 0; // 最终答案
        for($i=0; $i<$len; $i++) {
            // 通常都是  左边大于右边
            if(!isset($s[$i+1]) || $map[$s[$i]] >= $map[$s[$i+1]]){
                $res += $map[$s[$i]];
            }else{
            // 如果左边小于右边，那么就用右边减去左边
                $res += $map[$s[$i+1]] - $map[$s[$i]];
                ++$i;// 然后跳到下下个
            }
        }
        return $res;
    }
}


$obj = new Solution();
$s   = 'MCMXCIV';
$res = $obj->romanToInt($s);
var_dump($res);