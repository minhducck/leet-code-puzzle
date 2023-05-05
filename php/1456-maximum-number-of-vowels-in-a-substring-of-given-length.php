<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function maxVowels($s, $k) {
        // Can I use sliding windows?
        // Count vowel in first $k chars.
        // Move the windows to end of the string, During moving increase/decrease number of vowels in window.
        $vowels = ['i', 'a', 'e', 'u', 'o'];
        $vowelInSlice = count(array_filter(
            str_split(substr($s, 0, $k), 1),
            function($item) use ($vowels) {
                return in_array($item, $vowels);
            }
        ));

        $right = $k;
        $max = $vowelInSlice;
        
        while ($right < strlen($s)) {
            if (in_array($s[$right], $vowels)) {
                $vowelInSlice++;
            }
            
            if (in_array($s[$right-$k], $vowels)) {
                $vowelInSlice--;
            }
            
            if ($vowelInSlice > $max) {
                $max = $vowelInSlice;
            }
            
            $right++;
        }
        
        
        return $max;
    }
}
