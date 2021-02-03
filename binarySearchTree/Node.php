<?php

//node of binary tree
class Node
{
    private $value;
    private ?Node $parent;
    private ?Node $left;
    private ?Node $right;

    public function __construct($value, ?Node $parent)
    {
        $this->value = $value;
        $this->parent = $parent;
        $this->left = null;
        $this->right = null;
    }

    public static function insertValue(?Node $node, $value, ?Node $parent)
    {
        //create new node
        if ($node === null)
            return new Node($value, $parent);

        //insert to left subtree
        if ($node->value > $value) {
            $node->left = self::insertValue($node->left, $value, $node);
        }

        //insert to right subtree
        if ($node->value < $value)
            $node->right = self::insertValue($node->right, $value, $node);

        return $node;
    }

    //return true if value is in node (tree)
    public static function find(?Node $node, $value): bool
    {
        if ($node === null)
            return false;

        if ($node->value > $value)
            return self::find($node->left, $value);

        if ($node->value < $value)
            return self::find($node->right, $value);

        return true;
    }

    //delete node, which contains value
    public static function delete(?Node $node, $value)
    {
        if ($node === null)
            return null;

        //node with value, can be only in left subtree
        if ($node->value > $value) {
            $node->left = self::delete($node->left, $value);
            return $node;
        }

        //node with value, can be only in right subtree
        if ($node->value < $value) {
            $node->right = self::delete($node->right, $value);
            return $node;
        }

        //node value === value
        //case 1: node is leaf - has no sons
        if ($node->left === null && $node->right === null)
            return null;
        //case 2: node has only left son
        if ($node->right === null) {
            $node->left->parent = $node->parent;
            return $node->left;
        }
        //case 3: node has only right son
        if ($node->left === null) {
            $node->right->parent = $node->parent;
            return $node->right;
        }
        //case 4: node has both sons - swap it with successor
        $successo = $node->successor();
        $tmp = $node->value;
        $node->value = $successo->value;
        $successo->value = $tmp;
        $node->right = self::delete($node->right, $value);

        return $node;
    }

    public static function printInOrder(?Node $node)
    {
        if ($node === null)
            return;

        self::printInOrder($node->left);
        echo $node->value . " ";
        self::printInOrder($node->right);
    }

    //return node with biggest value, or null
    public static function max(?Node $node): ?Node
    {
        if ($node === null)
            return null;

        if ($node->right !== null)
            return self::max($node->right);

        return $node;
    }

    //return node with smallest value, or null
    public static function min(?Node $node): ?Node
    {
        if ($node === null)
            return null;

        if ($node->left !== null)
            return self::min($node->left);

        return $node;
    }

    //return smallest element, which is bigger than this (or null if does not exist)
    public function successor()
    {
        //if node has right subtree, successor is minimum of right tree
        if ($this->right !== null)
            return self::min($this->right);

        //successor is first parent, which right subtree is not $n
        $p = $this->parent;
        $n = $this;

        while ($p !== null && $p->right === $n) {
            $n = $p;
            $p = $p->parent;
        }

        return $p;
    }

    //return biggest element, which is smaller than this (or null if does not exists)
    public function ancestor()
    {
        //if node has left subtree, ancestor is maximum of left tree
        if ($this->left !== null)
            return self::max($this->left);

        //successor is first parent, which left subtree is not $n
        $p = $this->parent;
        $n = $this;

        while ($p !== null && $p->left === $n) {
            $n = $p;
            $p = $p->parent;
        }

        return $p;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(?Node $parent)
    {
        $this->parent = $parent;
        return $this;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function setLeft(?Node $node)
    {
        $this->left = $node;
        return $this;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function setRight(?Node $node)
    {
        $this->right = $node;
        return $this;
    }
}
