<?php

spl_autoload_register(function ($class) {
    $path = join('/', explode('\\', $class));
    require_once(__DIR__ . "/{$path}.php");
});

//create tree
$bst = new BinarySearchTree();

//empty test
if (!$bst->empty())
    echo "fail - is empty" . PHP_EOL;

//insert
$bst->insertValue(40);
$bst->insertValue(30);
$bst->insertValue(60);
$bst->insertValue(10);
$bst->insertValue(15);
$bst->insertValue(35);
$bst->insertValue(44);
$bst->insertValue(1000);
$bst->insertValue(43);
$bst->insertValue(16);

//find
if (!$bst->find(15))
    echo "failed find 15" . PHP_EOL;
if (!$bst->find(44))
    echo "failed find 44" . PHP_EOL;
if ($bst->find(155))
    echo "fail - found 155" . PHP_EOL;

//not empty test
if ($bst->empty())
    echo "fail - is not empty" . PHP_EOL;

//max test
if ($bst->max()->getValue() !== 1000)
    echo "wrong max" . PHP_EOL;

//min test
if ($bst->min()->getValue() !== 10)
    echo "wrong min: " .  PHP_EOL;

//successor test
if (
    30 !== $bst->getRoot()
    ->getLeft()->getLeft()->getRight()->getRight()
    ->successor()->getValue()
)
    echo "successor fail" . PHP_EOL;

//ancestor test
if (
    40 !== $bst->getRoot()
    ->getRight()->getLeft()->getLeft()->ancestor()->getValue()
)
    echo "ancestor fail" . PHP_EOL;

//delete tests
$bst->delete(40);
$bst->delete(16);
$bst->delete(1000);
$bst->delete(60);

//in order print
$bst->printInOrder();
