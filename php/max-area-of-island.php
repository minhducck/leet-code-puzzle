<?php

class Solution
{
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland($grid)
    {
        $nRows = count($grid);
        $nCols = count($grid[0]);
        $max = 0;
        $directions = [
            [0, 1],
            [1, 0],
            [0, -1],
            [-1, 0],
        ];

        $checked = [];

        for ($row = 0; $row < $nRows; $row++) {
            for ($col = 0; $col < $nCols; $col++) {
                if ($grid[$row][$col] == 1) {
                    $checked[$row][$col] = 1;
                    $queue = [[$row, $col]];
                    $left = 0;
                    $right = 1;

                    while ($left < $right) {
                        for ($i = 0; $i < 4; $i++) {
                            $nextRow = $queue[$left][0] + $directions[$i][0];
                            $nextCol = $queue[$left][1] + $directions[$i][1];

                            if ($max < $right) {
                                $max = $right;
                            }

                            if (
                                $nextCol >= 0
                                && $nextCol < $nCols
                                && $nextRow >= 0
                                && $nextRow < $nRows
                                && $grid[$nextRow][$nextCol] == 1
                                && !isset($checked[$nextRow][$nextCol])
                            ) {
                                $checked[$nextRow][$nextCol] = 1;
                                $queue[$right] = [$nextRow, $nextCol];
                                $right++;
                            }
                        }
                        $left++;
                    }
                }
            }
        }

        return $max;
    }
}


$testCases = [
    [
        'in' => [
            [1],
        ],
        'out' => 1,
    ],
    [
        'in' => [
            [1, 1, 0, 1],
            [1, 1, 1, 1],
        ],
        'out' => 7,
    ],
    [
        'in' => [
            [0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0],
            [0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 0],
            [0, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0]
        ],
        'out' => 6,
    ],
    [
        'in' => [[0, 0, 0, 0, 0, 0, 0, 0]],
        'out' => 0,
    ],
    [
        'in' => [
            [1, 1, 0, 0, 0],
            [1, 1, 0, 0, 0],
            [0, 0, 0, 1, 1],
            [0, 0, 0, 1, 1]
        ],
        'out' => 4,
    ],
    [
        'in' => [[0, 1, 1], [1, 1, 0]],
        'out' => 4,
    ],
];

$solution = new Solution();
$test = 0;
foreach ($testCases as $testCase) {
    $test++;
    $result = $solution->maxAreaOfIsland($testCase['in']);
    if ($result != $testCase['out']) {
        printf("Test Case %s: Wrong.\n", $test);
        printf("Output: %d\nExpected: %d\n", $result, $testCase['out']);
    }
}
