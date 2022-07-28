<?php
class Solution {

    /**
     * @param Integer[][] $image
     * @param Integer $sr
     * @param Integer $sc
     * @param Integer $color
     * @return Integer[][]
     */
    function floodFill($image, $sr, $sc, $color) {
        if ($image[$sr][$sc] == $color) {
            return $image;
        }

        $m = count($image);
        $n = count($image[0]);

        $checked = [];  // Space O(m*n)
        $queue = [[$sr, $sc]];    // Space O(m*n)

        $left = 0;
        $right = 1;

        $directions = [
            [-1, 0],
            [0, -1],
            [1, 0],
            [0, 1]
        ];

        while ($left < $right) {
            $cRow = $queue[$left][0];
            $cCol = $queue[$left][1];
            $checked[$cRow][$cCol] = 1;

            // Add adjacent block with same color
            for ($i = 0; $i < 4; $i++) {
                $nRow = $cRow + $directions[$i][0];
                $nCol = $cCol + $directions[$i][1];

                if ($image[$nRow][$nCol] == $image[$cRow][$cCol] && $nRow >= 0 && $nRow < $m && $nCol >= 0 && $nCol < $n && !isset($checked[$nRow][$nCol])) {
                    $queue[$right++] = [$nRow, $nCol];
                }
            }

            // Fill current block with color.
            $image[$cRow][$cCol] = $color;
            $left++;
        }

        return $image;
    }
}
