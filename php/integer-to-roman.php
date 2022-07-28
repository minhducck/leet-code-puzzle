<?php

// https://leetcode.com/problems/integer-to-roman/
class Solution {
    const ROMAN_DIC = [
            "M" => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        ];
    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {
        $rs = "";
        
        foreach(self::ROMAN_DIC as $text => $v) {
            for($i = (int) ($num / $v); $i > 0; $i--) {
                $rs .= $text;
            }
            $num %= $v;
        }
        
        return $rs;
    }
}
