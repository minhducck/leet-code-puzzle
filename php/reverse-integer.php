<?php
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        if ($x == 0) {
            return 0;
        }
        $posNum = abs($x);
        $signFlag = $x / $posNum;

        $reverseNum = 0;
        while ($posNum > 0) {
            $reverseNum = $reverseNum * 10 + $posNum % 10;
            $posNum = ($posNum - ($posNum % 10)) / 10;
        }
        if ($reverseNum > pow(2, 31) -1) {
            return 0;
        }

        return $reverseNum * $signFlag;
    }
}
