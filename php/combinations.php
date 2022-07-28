<?php

class Solution {

    protected $globalResult = [];
    private $checked = [];
    private $result = [];

    protected function solve($n, $startFrom, $maxDepth)
    {
        if (count($this->result) == $maxDepth) {
            $this->globalResult[] = $this->result;
            return;
        }

        for ($i = $startFrom; $i <= $n; $i++) {
            if (isset($this->checked[$i]) && $this->checked[$i] == 1) {
                continue;
            }

            $this->checked[$i] = 1;
            $this->result[] = $i;
            $this->solve($n, $i+1, $maxDepth);
            array_pop($this->result);
            $this->checked[$i] = 0;
        }
    }

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) {
        $this->solve($n, 1, $k);

        return $this->globalResult;
    }
}


$solution = new Solution();
print_r($solution->combine(4, 2));
