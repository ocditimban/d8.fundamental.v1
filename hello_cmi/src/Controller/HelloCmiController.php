<?php

/**
 * @file
 * Contains Drupal\hello_cmi\Controller\DefaultController.
*/

namespace Drupal\hello_cmi\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloCmiController extends ControllerBase {

  /**
   * hello
   * @return string
   */
  public function getSimpleConfig()
  {
    $simple_config = \Drupal::config('hello_cmi.simple_cmi');
    var_dump($simple_config->get('bar'));
    // echo string 'default bar' (length=11)
    return "Get Hello";
  }

  public function setSimpleConfig()
  {
    // $simple_config = \Drupal::config('hello_cmi.simple_cmi');
    // // $simple_config->set('bar', 'custom bar');
    // // $simple_config->save();
    // var_dump($simple_config->get('bar'));
    $typed_site_info = \Drupal::service('config.typed')->get('system.site');
    var_dump($typed_site_info);
    return "Hello";
  }
}
