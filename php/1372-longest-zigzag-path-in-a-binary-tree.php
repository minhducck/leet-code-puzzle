<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {
    protected $maxLength = 0;
    protected function dfs($root)
    {
        if ($root == null) {
            // [ leftFromHere, continueLeft, rightFromHere, continueRight ]
            return [-1, -1];
        }
        
        [$lLeft, $lRight] = $this->dfs($root->left);
        [$rLeft, $rRight] = $this->dfs($root->right);

        $this->maxLength = max($this->maxLength, $lRight + 1, $rLeft + 1);
        
        return [$lRight + 1, $rLeft + 1];
    }
    
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function longestZigZag($root) {
        $this->dfs($root);
        return $this->maxLength;
    }
}
