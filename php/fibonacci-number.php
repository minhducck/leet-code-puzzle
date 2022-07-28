<?php
class Solution {
    protected $cached = [
        0 => 0,
        1 => 1,
    ];

    /**
     * @param Integer $n
     * @return Integer
     */
    function fib($n) {
        if (array_key_exists($n, $this->cached)) {
            return $this->cached[$n];
        }
        $this->cached[$n] = $this->fib($n-1) + $this->fib($n-2);
        return $this->cached[$n];
    }
}

$test = new Solution();

for ($i = 0; $i <= 30; $i++) {
    printf("case %d: return %d;\n", $i, $test->fib($i));
}
