<?php

declare(strict_types=1);

//index of minimum of array between fromIndex and last element
function getIndexOfMin(array $array, int $fromIndex): int
{
    $min = $array[$fromIndex];
    $indexOfMin = $fromIndex;

    while ($fromIndex < count($array)) {
        if ($array[$fromIndex] < $min) {
            $min = $array[$fromIndex];
            $indexOfMin = $fromIndex;
        }
        $fromIndex++;
    }

    return $indexOfMin;
}

//return sorted array in ascending order
function selectSort(array $array): array
{
    $indexOfLastSortedElement = -1;

    while ($indexOfLastSortedElement + 1 < count($array)) {
        $indexOfMin = getIndexOfMin($array, $indexOfLastSortedElement + 1);

        //swap first unsorted element with min of unsorted part of array
        $tmp = $array[$indexOfMin];
        $array[$indexOfMin] = $array[$indexOfLastSortedElement + 1];
        $array[$indexOfLastSortedElement + 1] = $tmp;

        $indexOfLastSortedElement++;
    }

    return $array;
}
