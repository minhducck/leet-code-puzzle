<?php

class Solution {

    protected $checkedRows = [];
    protected $checkedCols = [];
    protected $checkedBlocks = [];

    protected $isSolved = false;

    protected function initChecked($board)
    {
        $this->isSolved = false;

        for ($i = 0; $i < 9; $i++) {
            $this->checkedRows[$i] = [];
            $this->checkedCols[$i] = [];
            $this->checkedBlocks[$i] = [];
        }

        for($row = 0; $row < 9; $row++) {
            for ($col = 0; $col < 9; $col++) {
                if ($board[$row][$col] != '.') {
                    $this->checkedRows[$row][$board[$row][$col]] = 1;
                    $this->checkedCols[$col][$board[$row][$col]] = 1;
                    $this->checkedBlocks[(int)($row/3) * 3 + (int)($col/3)][$board[$row][$col]] = 1;
                }
            }
        }
    }

    protected function solve(&$board, $currentRow = 0, $currentCol = 0) {
        if ($this->isSolved) {
            return;
        }

        if ($currentCol >= 9) {
            $currentCol = 0;
            $currentRow += 1;
        }

        if ($currentRow >= 9) {
            $this->isSolved = true;
            return;
        }

        if ($board[$currentRow][$currentCol] == '.') {
            $blockNum = (int)($currentRow / 3) * 3 + (int)($currentCol / 3);
            for ($i = 1; $i <= 9; $i++) {
                if (
                    (!isset($this->checkedRows[$currentRow][$i]) || !$this->checkedRows[$currentRow][$i])
                    && (!isset($this->checkedCols[$currentCol][$i]) || !$this->checkedCols[$currentCol][$i])
                    && (!isset($this->checkedBlocks[$blockNum][$i]) || !$this->checkedBlocks[$blockNum][$i])
                ) {
                    $this->checkedRows[$currentRow][$i] = 1;
                    $this->checkedCols[$currentCol][$i] = 1;
                    $this->checkedBlocks[$blockNum][$i] = 1;

                    $board[$currentRow][$currentCol] = (string)$i;
                    $this->solve($board, $currentRow, $currentCol+1);
                    if ($this->isSolved) {
                        return;
                    }
                    $board[$currentRow][$currentCol] = '.';

                    $this->checkedBlocks[$blockNum][$i] = 0;
                    $this->checkedRows[$currentRow][$i] = 0;
                    $this->checkedCols[$currentCol][$i] = 0;
                }
            }
        } else {
            $this->solve($board, $currentRow, $currentCol+1);
        }
    }

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board) {
        $this->initChecked($board);
        $this->solve($board, 0, 0);
        return $board;
    }
}


$testCases = [
    [["5","3",".",".","7",".",".",".","."],["6",".",".","1","9","5",".",".","."],[".","9","8",".",".",".",".","6","."],["8",".",".",".","6",".",".",".","3"],["4",".",".","8",".","3",".",".","1"],["7",".",".",".","2",".",".",".","6"],[".","6",".",".",".",".","2","8","."],[".",".",".","4","1","9",".",".","5"],[".",".",".",".","8",".",".","7","9"]],
    [[".",".",".",".",".",".",".",".","."],["6",".",".","1","9","5",".",".","."],[".","9","8",".",".",".",".","6","."],["8",".",".",".","6",".",".",".","3"],[".",".",".",".",".",".",".",".","."],[".",".",".",".",".",".",".",".","."],[".",".",".",".",".",".",".",".","."],[".",".",".",".",".",".",".",".","."],[".",".",".",".",".",".",".",".","."]],
    [[".",".","9","7","4","8",".",".","."],["7",".",".",".",".",".",".",".","."],[".","2",".","1",".","9",".",".","."],[".",".","7",".",".",".","2","4","."],[".","6","4",".","1",".","5","9","."],[".","9","8",".",".",".","3",".","."],[".",".",".","8",".","3",".","2","."],[".",".",".",".",".",".",".",".","6"],[".",".",".","2","7","5","9",".","."]]
];

$solution = new Solution();

foreach ($testCases as $testCase) {
    $solution->solveSudoku($testCase);

    for ($i = 0; $i < 9; $i++) {
        for ($j = 0; $j < 9; $j++) {
            echo $testCase[$i][$j] .' ';
        }
        echo "\n";
    }

    echo "====================================================\n";

}
