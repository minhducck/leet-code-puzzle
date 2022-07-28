<?php

class Solution {

    protected $board = [];
    protected $perfectBoard = [];

    // Checked.
    protected $cRow = [];
    protected $cCol = [];

    protected $c45 = [];
    private $c135 = [];

    protected $totalQ = 0;

    protected function initBoard($n)
    {
        $this->totalQ = 0;

        for ($i = 0; $i < $n; $i++) {
            $this->board[$i] = '';

            for ($j = 0; $j < $n; $j++) {
                $this->board[$i][$j] = '.';
            }
        }
    }

    protected function checkQ($row, $col)
    {
        if ($this->board[$col][$row] == 'Q') {
            return false;
        }
        // Same Rows
        if ($this->cRow[$row]??false) {
            return false;
        }

        // Same Cols
        if ($this->cCol[$col]??false) {
            return false;
        }

        // Bot Left Top Right   y = -x + constant;
        if ($this->c45[$col-$row]??false) {
            return false;
        }
        if ($this->c135[$col+$row]??false) {
            return false;
        }
        return true;

    }

    protected function solve($n, $startRow = 0, $startCol = 0) {
        if ($this->totalQ == $n) {
            return;
        }

        if ($startRow >= $n) {
            return;
        }

        $nextRow = ($startCol+1 >= $n) ? $startRow+1 : $startRow;
        $nextCol  = ($startCol+1 >= $n) ? 0 : $startCol+1;

        if ($this->checkQ($startRow, $startCol)) {
            // Put Q
            $this->board[$startCol][$startRow] = 'Q';
            $this->cRow[$startRow] = true;
            $this->cCol[$startCol] = true;
            $this->c45[$startCol - $startRow] = true;
            $this->c135[$startCol + $startRow] = true;
            $this->totalQ += 1;

            if ($this->totalQ == $n) {
                $this->perfectBoard[] = $this->board;
            }

            $this->solve($n, $nextRow, $nextCol);

            // Revert State
            $this->board[$startCol][$startRow] = '.';
            $this->cRow[$startRow] = false;
            $this->cCol[$startCol] = false;
            $this->c45[$startCol - $startRow] = false;
            $this->c135[$startCol + $startRow] = false;
            $this->totalQ -= 1;
        }

        $this->solve($n, $nextRow, $nextCol);
    }

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        $this->initBoard($n);
        $this->solve($n);

        return $this->perfectBoard;
    }
}

/** TEST CASE */

$testCases = [
    [
        'in' => 4,
        'out' => [[".Q..","...Q","Q...","..Q."],["..Q.","Q...","...Q",".Q.."]]
    ]
];

$program = new Solution();

foreach($testCases as $nums => $testCase) {
    printf(
        "Test Case %d: %s\n",
        $nums,
        ($program->solveNQueens($testCase['in']) == $testCase['out']) ? "Accepted" : "Wrong!"
    );
}
