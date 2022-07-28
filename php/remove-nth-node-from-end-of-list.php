<?php

# https://leetcode.com/problems/remove-nth-node-from-end-of-list/

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
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        $i = 1;
        $hashTable = [];

        while(true) {
            $hashTable[$i++] = $head;

            if ($head === null) {
                break;
            }

            $head = $head->next;
        }

        if ($i - $n - 2 < 1) {
            return $hashTable[2];
        }

        // Relink list.
        $hashTable[$i-$n-2]->next = $hashTable[$i - $n];

        return $hashTable[1];
    }
}
