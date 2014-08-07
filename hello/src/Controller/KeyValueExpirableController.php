<?php

/**
 * @file
 * Contains \Drupal\hello\Controller\HelloController.
 */

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\KeyValueStore\MemoryStorage;
use Drupal\Core\KeyValueStore\DatabaseStorage;
use Drupal\Core\KeyValueStore\DatabaseStorageExpirable;
use Drupal\Component\Serialization\PhpSerialize;
use Drupal\Core\Database\Database;

/**
 * Controller routines for help routes.
 */
class KeyValueExpirableController extends ControllerBase {

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
  public function helloSetKeyValueStorageExpirable() {
    // test DatabaseStorageExpirable
    $storage = new DatabaseStorageExpirable('kve', new PhpSerialize(), Database::getConnection());
    // display in 10 second
    $storage->setWithExpire('k1e','v1e', 10);
  }
  
  public function helloGetKeyValueStorageExpirable() {
    $storage = new DatabaseStorageExpirable('kve', new PhpSerialize(), Database::getConnection());
    return reset($storage->getMultiple(array('k1e')));
  }

}
