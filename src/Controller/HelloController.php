<?php

/**
 * @file
 * Contains \Drupal\hello\Controller\HelloController.
 */

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\KeyValueStore\MemoryStorage;
use Drupal\Core\KeyValueStore\DatabaseStorage;
use Drupal\Component\Serialization\PhpSerialize;
use Drupal\Core\Database\Database;

/**
 * Controller routines for help routes.
 */
class HelloController extends ControllerBase {

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
  public function helloPage($name) {
    return "Hello {$name}";
  }

  public function helloPageService() {
    $hellomessage = \Drupal::service('hello.hellomessage');
    return $hellomessage->sayHello();
  }

  public function helloSimplePage() {
    $hellomessage = \Drupal::service('hello.hellomessage');
    return $hellomessage->sayHello();
  }
  
  public function helloSetKeyValue() {
    // test memoryStorage
    // $store = new MemoryStorage();
    // $store->set('mem_key', 'mem_value');
    // return $store->get('mem_key', 'default_value');
    // test databaseStorage
    $storage = new DatabaseStorage('kv', new PhpSerialize(), Database::getConnection());
    $storage->set('k1','v1');
  }
  
  public function helloGetKeyValue() {
    $storage = new DatabaseStorage('kv', new PhpSerialize(), Database::getConnection());
    return $storage->get('k1');
  }

}
