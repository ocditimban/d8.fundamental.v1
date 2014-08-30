<?php

/**
 * @file
 * Contains \Drupal\hello_plugin\HelloPluginInterface.
 */

namespace Drupal\hello_plugin;

/**
 * Defines an interface for hello_plugin items.
 */
interface HelloPluginInterface {

  /**
   * Returns label of the tip.
   *
   * @return string
   *   The label of the tip.
   */
  public function getLabel();

  /**
   * Used for returning values by key.
   *
   * @var string
   *   Key of the value.
   *
   * @return string
   *   Value of the key.
   */
  public function get($key);

  /**
   * Used for returning values by key.
   *
   * @var string
   *   Key of the value.
   *
   * @var string
   *   Value of the key.
   */
  public function set($key, $value);


}
