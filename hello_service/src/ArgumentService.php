<?php

namespace Drupal\hello_service;

class ArgumentService {
  private $simpleService;

  public function __construct($simpleService) {
    $this->simpleService = $simpleService;
  }

  public function renderSimpleService() {
    return $this->simpleService->setName('ocditimban')->render();
  }
}
