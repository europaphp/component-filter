<?php

namespace Europa\Filter;
use Europa\Iterator;
use Traversable;

class ClassResolutionFilter
{
  private $filters;

  public function __construct(Traversable $filters)
  {
    $this->filters = new Iterator\CallableIterator($filters);
  }

  public function __invoke($value)
  {
    foreach ($this->filters as $filter) {
      if (class_exists($class = $filter($value), true)) {
        return $class;
      }
    }
  }
}