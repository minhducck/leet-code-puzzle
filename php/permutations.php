<?php

class Solution
{

    protected $checked = [];
    protected $results = [];

    protected function solve($nums, $result = [])
    {
        if (count($nums) == count($result)) {
            $this->results[] = $result;
            return;
        }

        foreach ($nums as $num) {
            if (isset($this->checked[$num]) && $this->checked[$num] == 1) {
                continue;
            }
            $this->checked[$num] = 1;
            $this->solve($nums, array_merge($result, [$num]));
            $this->checked[$num] = 0;
        }
    }

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums)
    {
        $this->solve($nums, []);
        return $this->results;
    }
}
