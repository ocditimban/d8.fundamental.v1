<?php

namespace Drupal\hello_service;

class SimpleService {
  private $name;

  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  public function render() {
    return 'Hello ' . $this->name;
  }
}
