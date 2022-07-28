/** https://leetcode.com/problems/sort-colors/ **/
void swap(int *xp, int *yp)
{
    int temp = *xp;
    *xp = *yp;
    *yp = temp;
}

void sortColors(int* nums, int numsSize){
    int zeroI = 0, twoI = numsSize - 1, i = 0;
    
    while (i <= twoI) {
        if (nums[i] == 0) {
            swap(&nums[i++], &nums[zeroI++]);
        } else if (nums[i] == 2) {
            swap(&nums[i], &nums[twoI--]);
        } else {
            i++;
        }
    }
}
