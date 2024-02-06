function combinationSum3(k: number, n: number): number[][] {
  const rs: number[][] = [];
  const sum = (a: number[]) => a.reduce((prev, c) => prev + c, 0);

  const backtracking = (
    stack: number[] = [],
    startNumber = 1,
    depthLevel = 0,
  ) => {
    if (depthLevel === k && sum(stack) === n) {
      rs.push(stack);
      return;
    }

    if (depthLevel > k) {
      return;
    }

    const currentSum = sum(stack);
    for (let i = startNumber; i <= 9; i++) {
      if (currentSum + i <= n) {
        backtracking(stack.concat(i), i + 1, depthLevel + 1);
      }
    }
  };
  backtracking();

  return rs;
}
