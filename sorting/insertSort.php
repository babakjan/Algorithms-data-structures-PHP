<?php

declare(strict_types=1);

//return sorted array in ascending order
function insertSort(array $array): array
{
    for ($i = 0; $i < count($array); $i++) {
        $j = $i;
        while ($j > 0 && $array[$j - 1] > $array[$j]) {
            $tmp = $array[$j];
            $array[$j] = $array[$j - 1];
            $array[$j - 1] = $tmp;
            $j--;
        }
    }
    return $array;
}
