<?php
/*

罗马数字包含以下七种字符： I， V， X， L，C，D 和 M。

字符          数值
I             1
V             5
X             10
L             50
C             100
D             500
M             1000
例如，
罗马数字 2 写做 II ，即为两个并列的 1。
12 写做 XII ，即为 X + II 。
27 写做  XXVII, 即为 XX + V + II 。

通常情况下，罗马数字中小的数字在大的数字的右边。但也存在特例，
例如 4 不写做 IIII，而是 IV。数字 1 在数字 5 的左边，所表示的数等于大数 5 减小数 1 得到的数值 4 。
同样地，数字 9 表示为 IX。这个特殊的规则只适用于以下六种情况：

I 可以放在 V (5) 和 X (10) 的左边，来表示 4 和 9。
X 可以放在 L (50) 和 C (100) 的左边，来表示 40 和 90。 
C 可以放在 D (500) 和 M (1000) 的左边，来表示 400 和 900。
给定一个整数，将其转为罗马数字。输入确保在 1 到 3999 的范围内。


示例 1:
    输入: 3
    输出: "III"
示例 2:
    输入: 4
    输出: "IV"
示例 3:
    输入: 9
    输出: "IX"
示例 4:
    输入: 58
    输出: "LVIII"
    解释: L = 50, V = 5, III = 3.
示例 5:
    输入: 1994
    输出: "MCMXCIV"
    解释: M = 1000, CM = 900, XC = 90, IV = 4.


【思考】
[特殊]
4   IV
9   IX
40  XL
90  XC
400 CD
900 CM
[常规]
1   I
5   V
10  X
50  L
100 C
500 D
10000 M


来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/integer-to-roman
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {
        $map = [
          1000 => 'M', 500 => 'D', 100 => 'C', 50 => 'L' , 10=>'X', 5=>'V',1=>'I',
          4=>'IV', 9=>'IX',40=>'XL' ,90 => 'XC', 400 => 'CD',900 => 'CM'
        ];
        // krsort — 对数组按照键名逆向排序
        krsort($map); // 键名从大到小
        $res = '';
        foreach ($map as $key => $value) {
            while($num >= $key) {
                // 依次比较 然后找到合适的
                $num -= $key;
                $res .= $value;
            }
        }
        return $res;
    }
}


$obj = new Solution();
$num = '521';
$res = $obj->intToRoman($num);
var_dump($res);
