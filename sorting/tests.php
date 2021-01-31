<?php

declare(strict_types=1);

include 'selectSort.php';
include 'insertSort.php';
include 'mergeSort.php';
include 'heapSort.php';
include 'quickSort.php';
include 'bubbleSort.php';

/**
 * @throws Exception if array is not sorted in ascending order
 */
function testAscSorting(array $array)
{
    for ($i = 0; $i < count($array) - 1; $i++)
        if ($array[$i] > $array[$i + 1])
            throw new Exception("succesor of element on index $i is smaller");
}

$a1 = [2, 4, 6, 99, 99, 100, 2];
$a2 = [44, 3, 5, 67, 7, 33, 3, 66, 7, 8, 9, -43, 0, 0];
$a3 = [10000];
$a4 = [];
$a5 = [1, 5, 67, 8];
$a6 = [1, 5, 4444, -3, 67, 8];

//select sort tests
testAscSorting(selectSort($a1));
testAscSorting(selectSort($a2));
testAscSorting(selectSort($a3));
testAscSorting(selectSort($a4));
testAscSorting(selectSort($a5));
testAscSorting(selectSort($a6));

//insert sort tests
testAscSorting(insertSort($a1));
testAscSorting(insertSort($a2));
testAscSorting(insertSort($a3));
testAscSorting(insertSort($a4));
testAscSorting(insertSort($a5));
testAscSorting(insertSort($a6));

//merge sort tests
testAscSorting(mergeSort($a1));
testAscSorting(mergeSort($a2));
testAscSorting(mergeSort($a3));
testAscSorting(mergeSort($a4));
testAscSorting(mergeSort($a5));
testAscSorting(mergeSort($a6));

//heap sort tests
testAscSorting(heapSort($a1));
testAscSorting(heapSort($a2));
testAscSorting(heapSort($a3));
testAscSorting(heapSort($a4));
testAscSorting(heapSort($a5));
testAscSorting(heapSort($a6));

//quick sort tests
testAscSorting(quickSort($a1));
testAscSorting(quickSort($a2));
testAscSorting(quickSort($a3));
testAscSorting(quickSort($a4));
testAscSorting(quickSort($a5));
testAscSorting(quickSort($a6));

//bubble sort tests
testAscSorting(bubbleSort($a1));
testAscSorting(bubbleSort($a2));
testAscSorting(bubbleSort($a3));
testAscSorting(bubbleSort($a5));
testAscSorting(bubbleSort($a5));
testAscSorting(bubbleSort($a6));

echo "end of testing" . PHP_EOL;
