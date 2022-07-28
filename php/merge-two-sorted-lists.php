<?php

include './linkedListGenerator.php';

class Solution {

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        $head = new ListNode(PHP_INT_MIN);
        $cur = $head;

        while ($list1 != null || $list2 != null) {
            if ($list1 == null || ($list2 !== null && $list1->val > $list2->val)) {
                $cur->next = new ListNode($list2->val);
                $cur = $cur->next;
                $list2 = $list2->next;
                continue;
            }

            if ($list2 == null || ($list1 !== null && $list1->val <= $list2->val)) {
                $cur->next = new ListNode($list1->val);
                $cur = $cur->next;
                $list1 = $list1->next;
                continue;
            }
        }

        return $head->next;
    }
}

/** TEST CASE */

$testCases = [
    [
        'in' => [ListNode::buildLinkedList([]), ListNode::buildLinkedList([])],
        'out' => ListNode::buildLinkedList([])
    ],
    [
        'in' => [ListNode::buildLinkedList([1,2,4]), ListNode::buildLinkedList([1,3,4])],
        'out' => ListNode::buildLinkedList([1,1,2,3,4,4])
    ],
    [
        'in' => [ListNode::buildLinkedList([2,4,6,8,10]), ListNode::buildLinkedList([1,3,5,7,9])],
        'out' => ListNode::buildLinkedList([1,2,3,4,5,6,7,8,9,10])
    ],
    [
        'in' => [ListNode::buildLinkedList([2,4,6,8,10,11]), ListNode::buildLinkedList([1,3,5,7,9])],
        'out' => ListNode::buildLinkedList([1,2,3,4,5,6,7,8,9,10])
    ],
];

$program = new Solution();

foreach($testCases as $nums => $testCase) {
    printf(
        "Test Case %d: %s\n",
        $nums,
        (ListNode::compare($program->mergeTwoLists(...$testCase['in']), $testCase['out']) ? "Accepted" : "Wrong!")
    );
}
