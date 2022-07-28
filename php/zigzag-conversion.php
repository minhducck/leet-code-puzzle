<?php
/** https://leetcode.com/problems/zigzag-conversion/ */
class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if ($numRows === 1) {
            return $s;
        }

        $array = [];
        $direction = 1;
        $rowI = 0;
        $len = strlen($s);

        for($i = 0; $i < $len; $i++) {
            $array[$rowI] .= $s[$i];

            if (($direction === 1 && $rowI === $numRows-1) || ($direction === -1 && $rowI === 0)) {
                $direction *= -1;
            }

            $rowI += $direction;

        }
        $str = '';
        for($i = 0; $i < $numRows; $i++) {
            $str .= $array[$i];
        }
        return $str;
    }
}
