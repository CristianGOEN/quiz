<?php

declare(strict_types=1);

namespace App\Shared\Domain;

use ArrayIterator;
use Countable;
use IteratorAggregate;

abstract class Collection implements Countable, IteratorAggregate
{
    abstract protected function type(): string;

    public function __construct(private array $elements = [])
    {
    }

    public function elements(): array
    {
        return $this->elements;
    }

    public function count(): int
    {
        return count($this->elements());
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->elements());
    }

}