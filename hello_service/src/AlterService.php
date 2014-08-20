<?php

namespace Drupal\hello_service;

class AlterService {
  private $name;

  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  public function alterRender() {
    return 'Hello Alter Render';
  }
}
