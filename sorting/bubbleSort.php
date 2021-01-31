<?php

declare(strict_types=1);

//return sorted array in ascending order
function bubbleSort(array $array): array
{
    $changed = False;
    $end = 0;

    do {
        $changed = False;

        for ($i = 0; $i < count($array) - $end - 1; $i++) {
            if ($array[$i] > $array[$i + 1]) {
                $changed = True;
                $tmp = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $tmp;
            }
        }
        $end++;
    } while ($changed);

    return $array;
}
