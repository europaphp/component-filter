<?php

namespace Europa\Filter;
use Europa\Config;

class MethodNameFilter
{
  private $config = [
    'prefix' => '',
    'suffix' => ''
  ];

  public function __construct($config = [])
  {
    $this->config = new Config\Config($this->config, $config);
  }

  public function __invoke($value)
  {
    $filter = $this->config['prefix'] ? new UpperCamelCaseFilter : new LowerCamelCaseFilter;
    return $this->config['prefix'] . $filter($value) . $this->config['suffix'];
  }
}