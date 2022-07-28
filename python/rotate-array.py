class Solution:
    def rotate(self, nums: List[int], k: int) -> None:
        """
        Do not return anything, modify nums in-place instead.
        """
        lenNums = len(nums) - (k % (len(nums)))
        nums[:] = nums[lenNums:] + nums[0:lenNums]
