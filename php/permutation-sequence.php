<?php

class Solution
{
    static $factorial = [
        0 => 1,
        1 => 1,
        2 => 2,
        3 => 6,
        4 => 24,
        5 => 120,
        6 => 720,
        7 => 5040,
        8 => 40320,
        9 => 362880
    ];

    /**
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    function getPermutation($n, $k)
    {
        $s = '';
        $rs = '';

        for ($i = 1; $i <= $n; $i++) {
            $s .= $i;
        }

        for($i = $n; $i > 0; $i--) {
            $period = (int)(($k-1)/self::$factorial[$i-1]) % strlen($s);
            $rs .= $s[$period];
            $s = str_replace($s[$period], '', $s);
        }

        return $rs;
    }
}

$test = new Solution();
echo $test->getPermutation(4,9);
