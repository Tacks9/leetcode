<?php
/*
题目136：[只出现一次的数字]
给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。

说明：
    你的算法应该具有线性时间复杂度。 你可以不使用额外空间来实现吗？

示例 1:
    输入: [2,2,1]
    输出: 1
示例 2:
    输入: [4,1,2,1,2]
    输出: 4

思路：
- [1]哈希计数法：循环计数
    - 用一个数组$arr来保存每个数的出现个数  键（每个数） => 值(出现次数)
    - 然后循环找出来次数为1的 键
    - 然后返回键，就是只出现一次的数；
- [2]数组去重法
    - 额外数组$arr来保存
    - 遍历当前数组中每一个元素；
    - 如果某个元素是新出现的加入到$arr中；
    - 如果某个元素已经在$arr，那么就删除；
    - 最后留在$arr数组中的值就是只有一个的。
 - [3]异或法
    - 看啦官网题解
    - 如果我们对 0 和二进制位做 XOR 运算，得到的仍然是这个二进制位；
        `a XOR 0 = a`
    - 如果我们对相同的二进制位做 XOR 运算，返回的结果是 0；
        `a XOR a = 0`
    - XOR 满足交换律和结合律;
    - 所以我们只需要将所有的数进行 XOR 操作，得到那个唯一的数字。

  - [4]内置函数
    - array_count_values() 返回一个数组： 数组的键是 array (数组的值必须是字符或者数字 )里单元的值； 数组的值是 array 单元的值出现的次数
    - array_flip() 对数组进行键值互换
    - 因为只有一个数字是出现一次的，所以那么最后也就是数组的第2个单元 也就是数组下标为1的值；
    - array_search — 在数组中搜索给定的值，如果成功则返回首个相应的键名
    - array_keys — 返回数组中部分的或所有的键名

【关于执行的时间，或者内存消耗】
       - 只能看个大概，还是时间复杂度，有时候可能同样代码执行的时间也差很多
       - 我估摸是数据量以及等原因吧。
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/single-number
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
     //执行用时 :24 ms, 在所有 php 提交中击败了97.55%的用户
     //内存消耗 :17.3 MB, 在所有 php 提交中击败了66.24%的用户
     //哈希法  对每个元素进行计数
    function singleNumber($nums) {
        $arr = [];
        foreach ($nums as $value) {
            if(!isset($arr[$value])) {//防止Notice 数组键名未定义
                $arr[$value] = 1;//第一次出现
            }else{
                $arr[$value]++;//后续再次出现
            }
        }
        foreach ($arr as $key => $value) {
            if($value === 1) {//找到只出现一次的值
                return $key;
            }
        }
        return 0;
    }

    //执行用时 :24 ms, 在所有 php 提交中击败了97.55%的用户
    //内存消耗 :17.4 MB, 在所有 php 提交中击败了26.75%的用户
    //数组去重法：和第一种其实差别不是特别大，只不过这最后数组就只剩一个值。
    function singleNumber2($nums) {
        $arr = [];
        foreach ($nums as $value) {
            if(!isset($arr[$value])) {
                $arr[$value] = 1;//第一次出现就1
            }else{
                unset($arr[$value]);//第二次出现就删除
            }
        }
        //下面这个循环为了取出来 数组中最后的一个元素，感觉怪异
        foreach ($arr as $key => $value) {
            return $key;
        }
    }

    //异或法
    //执行用时 :32 ms, 在所有 php 提交中击败了70.95%的用户
    // 内存消耗 :17.5 MB, 在所有 php 提交中击败了8.92%的用户
    function singleNumber3($nums) {
        $re = 0;
        foreach ($nums as $value) {
            $re ^= $value;//进行异或运算
        }
        return $re;
    }

//////////////////////////////////【函数法】//////////////////////////////////////////
    //函数法
    //执行用时 :32 ms, 在所有 php 提交中击败了70.95%的用户
    //内存消耗 :17.5 MB, 在所有 php 提交中击败了18.79%的用户
    function singleNumber4($nums) {
        $nums = array_count_values($nums);//统计 各个单元出现的次数 返回的数组是 键=>出现的次数
        $nums = array_flip($nums);//互换键值
        return $nums[1];//由于出现的只有一次
    }

    //函数法
    //执行用时 :28 ms, 在所有 php 提交中击败了88.07%的用户
    //内存消耗 :17.1 MB, 在所有 php 提交中击败了93.95%的用户
    function singleNumber5($nums) {
       //计算数组元素出现个数
       $nums = array_count_values($nums);
       // php数组根据值为1的 获取键名
       $nums = array_keys($nums,1);
       return $nums[0];
    }

    //函数法
    function singleNumber6($nums) {
        //计算数组元素出现个数
        $nums = array_count_values($nums);
        // 在数组$nums中搜索给定的值1，如果成功则返回首个相应的键名
        return array_search(1,$nums);
    }
}

$obj  = new Solution();
$nums = [4,1,2,1,2];
$re   = $obj->singleNumber1($nums);
var_dump($re);
