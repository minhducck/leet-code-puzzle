function groupAnagrams(strs: string[]): string[][] {
  const hashmap = new Map<string, string[]>();

  strs.forEach((str) => {
    const hashKey = str.split('').sort().join('');
    !hashmap.has(hashKey) && hashmap.set(hashKey, []);
    hashmap.set(hashKey, hashmap.get(hashKey).concat(str));
  });

  return [...hashmap.values()];
}
