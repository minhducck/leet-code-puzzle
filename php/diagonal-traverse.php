<?php

class Solution
{

    /**
     * @param Integer[][] $mat
     * @return Integer[]
     */
    function findDiagonalOrder($mat)
    {
        $newArr = [];
        $nRows = count($mat);
        $nCols = count($mat[0]);
        $isGoingUp = true;
        $counter = 0;
        $row = 0;
        $col = 0;
        $direction = [
            [-1, 1],
            [1, -1],
        ];

        while (true) {
            if ($counter >= $nRows * $nCols) {
                return $newArr;
            }

            if (isset($mat[$row][$col])) {
                $newArr[] = $mat[$row][$col];
                $counter++;
            }

            [$lastRow, $lastCol] = [$row, $col];
            [$row, $col] = [$row + $direction[!$isGoingUp][0], $col + $direction[!$isGoingUp][1]];

            if ($isGoingUp) {
                if ($row < 0 || $col >= $nCols) {
                    $isGoingUp = !$isGoingUp;
                }
                if ($row < 0) {
                    $row = 0;
                }
                if ($col >= $nCols){
                    $col = $nCols-1;
                    $row = $lastRow+1;
                }
            } else {
                if ($col < 0 || $row >= $nRows) {
                    $isGoingUp = !$isGoingUp;
                }
                if ($col < 0) {
                    $col = 0;
                }
                if ($row >= $nRows){
                    $row = $nRows-1;
                    $col = $lastCol+1;
                }
            }
        }
    }
}

$solution = new Solution();

$testCases = [
    ['input' => [[1, 2, 3], [4, 5, 6], [7, 8, 9]], 'output' => [1, 2, 4, 7, 5, 3, 6, 8, 9]],
    ['input' => [[1,2],[3,4]], 'output' => [1,2,3,4]],
    ['input' => [[1,2],[3,4]], 'output' => [1,2,3,4]],
];

foreach ($testCases as $k => $testCase) {
    $result = $solution->findDiagonalOrder($testCase['input']);
    echo "Input: \n";
    foreach ($testCase['input'] as $col) {
        foreach ($col as $elm) {
            echo $elm . ' ';
        }
        echo PHP_EOL;
    }

    echo "Output: \n";
    foreach ($result as $col) {
        echo $col . ' ';
    }
    echo PHP_EOL;

    echo "Expected: \n";
    foreach ($testCase['output'] as $col) {
        echo $col . ' ';
    }
    echo PHP_EOL;

    if ($result == $testCase['output']) {
        echo "Test Case #$k Accepted.\n";
    } else {
        echo "Test Case #$k Wrong Answer.\n";
    }
}
