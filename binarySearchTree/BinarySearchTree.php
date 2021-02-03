<?php

class BinarySearchTree
{
    private ?Node $root;

    //create empty tree
    public function __construct()
    {
        $this->root = null;
    }

    //insert value into bst
    public function insertValue($value)
    {
        $this->root = Node::insertValue($this->root, $value, null);
    }

    //return true, if bst contains value, otherwise false
    public function find($value): bool
    {
        return Node::find($this->root, $value);
    }

    public function delete($value)
    {
        Node::delete($this->root, $value);
    }

    //return true if bst is empty, otherwise return false
    public function empty(): bool
    {
        return $this->root === null;
    }

    //print sorted values
    public function printInOrder()
    {
        Node::printInOrder($this->root);
        echo PHP_EOL;
    }

    //return max value of tree
    public function max()
    {
        return Node::max($this->root);
    }

    //return min value of tree
    public function min()
    {
        return Node::min($this->root);
    }

    public function getRoot()
    {
        return $this->root;
    }
};
