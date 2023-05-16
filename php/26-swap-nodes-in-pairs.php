<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head) {
        $left = null;
        $mid = $head;
        $right = $head->next;

        $newHead = $right??$head;


        while ($mid !== null  && $right !== null) {
            if ($left !== null) $left->next = $right;

            $mid->next = $right->next;
            $right->next = $mid;

            $left = $mid;
            $mid = $mid->next;
            if ($mid === null) break;

            $right = $mid->next;
        }
        return $newHead;

        // Left Mid Right
        //   v   v    v
        //     [ 1   ,2    ] [3,4] [5,6]
        // left->next = right;
        // mid->next = right->next;
        // right->next = mid;

        //            Left Mid Right
        //             v    v    v
        // [ 2        ,1 ] [3,   4] [5,6]
        // $left = $mid;
        // $mid = $mid->next;
        // $right = $mid->next
    }
}
