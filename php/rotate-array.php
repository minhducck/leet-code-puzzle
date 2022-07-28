<?php

// https://leetcode.com/problems/rotate-array/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        $indicator = 0;
        $numsSize = count($nums);
        $newK = $k % $numsSize;

        for ($i = $numsSize - $newK; $i < $numsSize; $i++) {
            $newArr[] = $nums[$i];
        }
        
        for ($i = 0; $i < $numsSize - $newK; $i++) {
            $newArr[] = $nums[$i];
        }
        
        $nums = $newArr;
    }
}
