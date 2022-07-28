<?php
class Solution {

    protected function sortAndGet($nums1, $nums2)
    {
        // Beats 99% of PHP
        $mergedArray = array_merge($nums1, $nums2);
        sort($mergedArray);

        $lenNum = count($mergedArray);
        $middle = $lenNum / 2;

        if (is_float($middle)) {
            return $mergedArray[(int)$middle];
        }

        return ($mergedArray[$middle-1] + $mergedArray[$middle]) / 2;
    }

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        return $this->sortAndGet($nums1, $nums2);

        // Easy Way. Merge and Get.
        $l1 = count($nums1);
        $l2 = count($nums2);

        $i1 = 0;
        $i2 = 0;

        $newNums = [];

        while($i1 < $l1 || $i2 < $l2) {
            if (!isset($nums1[$i1])) {
                $newNums[] = $nums2[$i2++];
                continue;
            }

            if (!isset($nums2[$i2])) {
                $newNums[] = $nums1[$i1++];
                continue;
            }

            if ($nums1[$i1] > $nums2[$i2]) {
                $newNums[] = $nums2[$i2++];
            } else {
                $newNums[] = $nums1[$i1++];
            }
        }

        $mid = (int)(($l1+$l2)/2);
        if (($l1+$l2) %2) {
            return ($newNums[$mid]);
        } else {
            return ($newNums[$mid] + $newNums[$mid-1])/2;
        }
    }
}
