<?php
class Solution {

    function search($numbers, $target, $l) {
        $h = count($numbers) - 1;

        while ($l <= $h) {
            $mid = (int)(($l+$h)/2);
            if ($numbers[$mid] == $target) {
                return $mid;
            } elseif($numbers[$mid] > $target) {
                $h = $mid-1;
            } else {
                $l = $mid+1;
            }
        }
        return false;
    }

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        $numSize = count($numbers);

        for ($i = 0; $i < $numSize; $i++) {
            $boundary = $target - $numbers[$i];
            $found = $this->search($numbers, $boundary, $i+1);
            if ($found !== false) {
                return [$i+1, $found+1];
            }
        }

        return [];
    }
}
