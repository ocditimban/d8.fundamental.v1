<?php

/**
 * @file
 * Contains \Drupal\hello\Controller\HelloController.
 */

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

use Drupal\hello\KeyValueStore\StorageBaseCustom;

/**
 * Controller routines for help routes.
 */
class KeyValueCustomController extends ControllerBase {

  /**
   * Prints a page listing general help for a module.
   *
   * @param string $name
   *   A module name to display a help page for.
   *
   * @return array
   *   A render array as expected by drupal_render().
   *
   * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
   */
  public function helloSetKeyValueCustom() {
    // test memoryStorage
    $store = new StorageBaseCustom('key_test');
    $store->set('bathuongcon', 'thicongiongme');
    
    return $store->get('bathuongcon');
  }
  
  public function helloGetKeyValueCustom() {
    // test memoryStorage
    $store = new StorageBaseCustom('key_test');
    $store->set('bathuongcon', 'thicongiongme');
    
    return $store->get('bathuongcon');
  }

}
