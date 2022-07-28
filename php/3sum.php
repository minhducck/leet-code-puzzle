<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        sort($nums);    // nLogn
        $rs = [];
        $len = count($nums);

        for ($i = 0; $i < $len; $i++) {
            if ($i > 0 && $nums[$i - 1] == $nums[$i]) {
                continue;
            }

            $l = $i + 1;
            $r = $len - 1;

            while ($l < $r) {
                $threeSum = $nums[$i] + $nums[$l] + $nums[$r];

                if ($threeSum === 0) {
                    $rs[] = [$nums[$i], $nums[$l], $nums[$r]];
                    $l++;
                    $r--;
                } elseif ($threeSum > 0) {
                    $r--;
                } else {
                    $l++;
                }

                while ($l < $r && $l > $i + 1 && $nums[$l] == $nums[$l - 1]) {
                    $l++;
                }

                while ($l < $r && $r < $len-1 && $nums[$r] == $nums[$r + 1]) {
                    $r--;
                }
            }
        }
        return $rs;
    }
}
