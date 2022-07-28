<?php

/** https://leetcode.com/problems/string-to-integer-atoi/ */

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s) {
        $len = strlen($s);
        $sign = 1;
        $total = 0;
        $startConvert = 0;

        for($i = 0; $i < $len; $i++) {
            if ($s[$i] != '+' && $s[$i] != '-' && $s[$i] != ' ' && $s[$i] != '.' && !($s[$i] >= '0' && $s[$i] <= '9')) {
                break;
            }

            if ($s[$i] >= '0' && $s[$i] <= '9') {
                $total = $total * 10 + $s[$i];
                $startConvert = 1;
            } elseif($startConvert) {
                break;
            }

            if ($s[$i] === '.') {
                break;
            }

            if ($s[$i] === '-') {
                $sign = -1;
                $startConvert = 1;
            }

            if ($s[$i] === '+') {
                $sign = 1;
                $startConvert = 1;
            }
        }

        $maxCap = $sign == 1 ? pow(2, 31) - 1 : pow(2, 31);
        if ($total > $maxCap) {
            return $maxCap * $sign;
        }

        return (int)$total * $sign;
    }
}
