<?php

class Solution
{

    protected $results = [];

    protected function solve($string, $start, $end)
    {
        if ($start >= $end) {
            $this->results[] = $string;
            return;
        }
        if (($string[$start] >= 'A' && $string[$start] <= 'Z') || ($string[$start] >= 'a' && $string[$start] <= 'z')) {
            $string[$start] = strtolower($string[$start]);
            $this->solve($string, $start+1, $end);
            $string[$start] = strtoupper($string[$start]);
            $this->solve($string, $start+1, $end);
        } else {
            $this->solve($string, $start+1, $end);
        }
    }

    /**
     * @param String $s
     * @return String[]
     */
    function letterCasePermutation($s)
    {
        $end = strlen($s);
        $this->solve($s, 0, $end);
        return $this->results;
    }
}

$solution = new Solution();

print_r($solution->letterCasePermutation("a"));
