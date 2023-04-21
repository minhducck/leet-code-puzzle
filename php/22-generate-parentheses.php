<?php

namespace GenerateParentheses;

class Solution {
    function generate($open = 0, $close = 0, $s = '') {
        if ($open == 0 && $close == 0) {
            return [$s];
        }

        $rs = [];
        if ($open) {
            $rs = array_merge($rs, $this->generate($open-1, $close+1, $s . '('));
        }

        if ($close) {
            $rs = array_merge($rs, $this->generate($open, $close-1, $s . ')'));
        }
        return $rs;
    }

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        return $this->generate($n, 0);
    }
}
