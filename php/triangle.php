<?php

// https://leetcode.com/problems/triangle/
class Solution {

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {
        $nRows = count($triangle);
        
        for ($i = 1; $i < $nRows; $i++) {
            for ($j = 0; $j < $i + 1; $j++) {
                $triangle[$i][$j] += min(
                     ($triangle[$i-1][$j] ?? 99999999999),
                     ($triangle[$i-1][$j-1] ?? 99999999999)
                );
            }
        }
        
        return min($triangle[$nRows-1]);
    }
}
