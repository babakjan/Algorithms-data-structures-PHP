<?php

declare(strict_types=1);

function quickSort(array $array): array
{
    if (count($array) <= 1)
        return $array;

    $pivot = choosePivot($array);

    $left = []; //elements smaller than pivot
    $middle = []; //element equal pivot
    $right = []; //elements greater than pivot

    //split array into left, middle and right parts
    foreach ($array as $element) {
        if ($element < $pivot)
            $left[] = $element;
        elseif ($element > $pivot)
            $right[] = $element;
        else
            $middle[] = $pivot;
    }

    //recursively sort left and right parts of array
    $left = quickSort($left);
    $right = quickSort($right);

    //append middle to $left and than append $right
    return array_merge($left, $middle, $right);
}

/**
 * randomly choose pivot - if pivot is almost median return it, otherwise try again
 * expected value of tryes is 2, becase array contains at least 1/2 almost medians
 * almost median is element of value, which is in second or third quarter of sorted array
 */
function choosePivot(array $array): int
{
    //generating random pivot until it is almost median
    while (true) {
        //generate random pivot
        $pivot = $array[rand(0, count($array) - 1)];

        //check if pivot is almost median
        $countOfLower = 0;
        $countOfGreater = 0;
        foreach ($array as $element) {
            if ($element < $pivot)
                $countOfLower++;
            elseif ($array > $element)
                $countOfGreater++;
        }

        //if pivot split array at leats into parts 1/4 and 3/4 return it
        if ($countOfGreater >= $countOfLower) {
            //$countOfLower / $countOfGreater >= 0.25 (comparing doubles)
            if (abs($countOfLower / $countOfGreater - 0.25) >= 0.0001)
                return $pivot;
        } else {
            //$countOfGreater / $countOfLower >= 0.25 (comparing doubles)
            if ($countOfGreater / $countOfLower - 0.25 >= 0.000)
                return $pivot;
        }
    }
}
