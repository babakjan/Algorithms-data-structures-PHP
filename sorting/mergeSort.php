<?php

declare(strict_types=1);

//return sorted array in ascending order
function mergeSort(?array $array): ?array
{
    if ($array === null || count($array) <= 1)
        return $array;

    $splittedArray = splitArray($array);

    $leftHalf = mergeSort($splittedArray[0]);
    $rightHalf = mergeSort($splittedArray[1]);

    return merge($leftHalf, $rightHalf);
}

//return array, wchich contains 2 elements - array[0] is left half, array[1] is right half
function splitArray(?array $array): ?array
{
    if ($array === null)
        return [[], []];

    $halfIndex = floor(count($array) / 2);

    //first element of array is left half, second is right half
    $halfs = [[], []];

    for ($i = 0; $i < $halfIndex; $i++)
        $halfs[0][] = $array[$i];

    for ($i = $halfIndex; $i < count($array); $i++)
        $halfs[1][] = $array[$i];

    return $halfs;
}

//merge two sorted array into one sorted array
function merge(?array $array1, ?array $array2): ?array
{
    if ($array1 === null)
        return $array2;

    if ($array2 === null)
        return $array1;

    $ptr1 = 0;
    $ptr2 = 0;
    $resultArray = [];

    while ($ptr1 < count($array1) && $ptr2 < count($array2)) {
        if ($array1[$ptr1] < $array2[$ptr2]) {
            $resultArray[] = $array1[$ptr1];
            $ptr1++;
        } else {
            $resultArray[] = $array2[$ptr2];
            $ptr2++;
        }
    }

    while ($ptr1 < count($array1)) {
        $resultArray[] = $array1[$ptr1];
        $ptr1++;
    }

    while ($ptr2 < count($array2)) {
        $resultArray[] = $array2[$ptr2];
        $ptr2++;
    }

    return $resultArray;
}
