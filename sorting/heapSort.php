<?php

declare(strict_types=1);

class MaxHeap
{
    public array $data;
    private int $size;

    //create heap from array, empty heap from []
    function __construct(array $array)
    {
        $this->data = $array;
        $this->size = count($this->data);

        for ($i = (int)floor($this->size / 2); $i >= 0; $i--)
            $this->bubbleDown($i);
    }

    //bubble down element of heap, to observe heap rule
    private function bubbleDown(int $parent)
    {
        if ($parent >= $this->size)
            return;

        $biggest = $parent;
        $leftNode = 2 * $parent + 1;
        $rightNode = 2 * $parent + 2;
        // echo "parent: " . $parent . ", size: " . $this->size . ", left: " . $leftNode . ", right: " . $rightNode . PHP_EOL;

        if ($leftNode < $this->size && $this->data[$leftNode] > $this->data[$biggest])
            $biggest = $leftNode;

        if ($rightNode < $this->size && $this->data[$rightNode] > $this->data[$biggest])
            $biggest = $rightNode;

        //if parent is not biggest - swap $data[parent] and $data[biggest]
        if ($parent !== $biggest) {
            $tmp = $this->data[$parent];
            $this->data[$parent] = $this->data[$biggest];
            $this->data[$biggest] = $tmp;

            //recursively bubble down in affected subtree
            $this->bubbleDown($biggest);
        }
    }

    //sort array - brake heap rule!
    function heapSort(): array
    {
        while ($this->size > 0) {
            //swap root (max) and last element
            $max = $this->data[0];
            $this->data[0] = $this->data[$this->size - 1];
            $this->data[$this->size - 1] = $max;

            $this->size--;

            $this->bubbleDown(0);
        }

        return $this->data;
    }
}

//return sorted array in ascending order
function heapSort(array $array): array
{
    $heap = new MaxHeap($array);
    return $heap->heapSort();
}
