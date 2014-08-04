<?php

/**
 * @file
 * Contains Drupal\hello\KeyValueStore\KeyValueCustomController.
 */

namespace Drupal\hello\KeyValueStore;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;

/**
 * Provides a base class for key/value storage implementations.
 */
class StorageBaseCustom implements KeyValueStoreInterface {

  /**
   * The name of the collection holding key and value pairs.
   *
   * @var string
   */
  protected $collection;
  protected $data;

  /**
   * Implements Drupal\Core\KeyValueStore\KeyValueStoreInterface::__construct().
   */
  public function __construct($collection) {
    $this->collection = $collection;
  }

  /**
   * Implements Drupal\Core\KeyValueStore\KeyValueStoreInterface::getCollectionName().
   */
  public function getCollectionName() {
    return $this->collection;
  }

  public function has($key) {
    return array_key_exists($key, $this->data);
  }

  /**
   * Implements Drupal\Core\KeyValueStore\KeyValueStoreInterface::get().
   */
  public function get($key, $default = NULL) {
    return array_key_exists($key, $this->data) ? $this->data[$key] : $default;
  }

  public function getMultiple(array $keys) {
    return '1';
  }

  public function getAll() {
    return '1';
  }

  public function set($key, $value) {
    $this->data[$key] = $value;
  }

  public function setIfNotExists($key, $value) {
    return '1';
  }

  /**
   * Implements Drupal\Core\KeyValueStore\KeyValueStoreInterface::setMultiple().
   */
  public function setMultiple(array $data) {
    foreach ($data as $key => $value) {
      $this->set($key, $value);
    }
  }

  public function rename($key, $new_key) {
    return '1';
  }

  /**
   * Implements Drupal\Core\KeyValueStore\KeyValueStoreInterface::delete().
   */
  public function delete($key) {
    $this->deleteMultiple(array($key));
  }

  public function deleteMultiple(array $keys) {
    return '1';
  }

  public function deleteAll() {
    return '1';
  }

  /*
   * do not have in interface
   */
  public function testExeceptionInterface() {
    return '1';
  }

}
