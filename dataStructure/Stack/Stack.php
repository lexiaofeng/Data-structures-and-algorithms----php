<?php

namespace dataStructure\Stack;

interface Stack
{
    public function getSize(): int;

    public function isEmpty(): bool;

    public function push($e): void;

    public function pop();

    public function peek();
}