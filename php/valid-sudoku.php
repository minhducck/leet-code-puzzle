<?php

// https://leetcode.com/problems/valid-sudoku/

class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $checkedRows = [];
        $checkedCols = [];
        $checkedBlocks = [];

        for ($i = 0; $i < 9; $i++) {
            $checkedRows[$i] = [];
            $checkedCols[$i] = [];
            $checkedBlocks[$i] = [];
        }

        for($row = 0; $row < 9; $row++) {
            for ($col = 0; $col < 9; $col++) {
                $blockNum = (int)($row/3) * 3 + (int)($col/3);
                if (
                    $board[$row][$col] != '.'
                    && ($checkedRows[$row][$board[$row][$col]] === 1
                    || $checkedCols[$col][$board[$row][$col]] === 1
                    || $checkedBlocks[$blockNum][$board[$row][$col]] === 1)
                ) {
                    return false;
                }

                if ($board[$row][$col] != '.') {
                    $checkedRows[$row][$board[$row][$col]] = 1;
                    $checkedCols[$col][$board[$row][$col]] = 1;
                    $checkedBlocks[$blockNum][$board[$row][$col]] = 1;
                }
            }
        }
        return true;
    }
}
