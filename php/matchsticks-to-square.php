<?php
class Solution {

    protected $isSolved = false;
    protected $totalCountStick = 0;
    protected $stickCount = [];

    protected function solve($expected, $remaining, $times, $startPos = 0) {
        if ($times === 0 && $remaining === 0) {
            $this->isSolved = true;
            return true;
        }

        if ($this->totalCountStick <= 0) {
            return false;
        }
        $this->totalCountStick -= 1;
        $pos = -1;
        foreach ($this->stickCount as $stickLength => &$remainingStickWithLen) {
            $pos++;
            if ($pos < $startPos) {
                continue;
            }

            if ($remainingStickWithLen > 0 && $stickLength <= $remaining) {
                $remainingStickWithLen -= 1;
                $nextRemaining = $remaining - $stickLength;

                if ($nextRemaining == 0 && $times == 1) {
                    $this->isSolved = true;
                    return true;
                }

                $this->solve(
                    $expected,
                    $nextRemaining == 0 ? $expected : $nextRemaining,
                    $nextRemaining == 0 ? $times - 1 : $times,
                    $nextRemaining == 0 ? 0 : $pos
                );

                if ($this->isSolved == true) {
                    return true;
                }

                $remainingStickWithLen += 1;
            }
        }
        $this->totalCountStick += 1;

        return false;
    }

    /**
     * @param Integer[] $matchsticks
     * @return Boolean
     */
    function makesquare($matchsticks) {
        $this->isSolved = false;
        $total = array_sum($matchsticks);
        $this->totalCountStick = count($matchsticks);
        $expected = $total / 4;
        if ($total % 4 != 0) {
            return false;
        }

        for ($i = 0; $i < $this->totalCountStick; $i++) {
            $this->stickCount[$matchsticks[$i]] = isset($this->stickCount[$matchsticks[$i]]) ? $this->stickCount[$matchsticks[$i]] + 1 : 1;
        }

        // 4 times expected in Array.
        return $this->solve($expected, $expected, 3);
    }
}

$testCases = [
    [4,1,3,2,3,2,3,2],
    [1,1,1,1],
    [1,1,2,2,2],
    [3,3,3,3,4],
    [4 ,5 ,6 ,7 ,8 ,9 ,10 ,11 ,12 ,13 ,14 ,15 ,16 ,17 ,18],
    [4 ,16 ,64 ,256 ,1024 ,4096 ,16384 ,65536 ,262144 ,1048576 ,4194304 ,16777216 ,67108864 ,268435456 ,1073741824],
    [4 ,16 ,64 ,256 ,1024 ,4096 ,16384 ,65536 ,262144 ,1048576 ,4194304 ,16777216 ,67108864 ,100000000 ,100000000]
];

$solution = new Solution();

foreach ($testCases as $testCase) {
    var_dump($solution->makesquare($testCase));
}

