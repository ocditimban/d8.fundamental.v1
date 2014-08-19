<?php

/**
 * @file
 * Contains Drupal\hello_routing_advance\Controller\DefaultController.
*/

namespace Drupal\hello_routing_advance\Controller;

use Drupal\Core\Controller\ControllerBase;

class DefaultController extends ControllerBase {

  /**
   * hello
   * @return string
   */
  public function hello($name)
  {
    return "Hello ".$name." !";
  }
}
