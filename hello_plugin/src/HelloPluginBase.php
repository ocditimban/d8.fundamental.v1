<?php

/**
 * @file
 * Contains \Drupal\hello_plugin\HelloPluginBase.
 */

namespace Drupal\hello_plugin;

use Drupal\Core\Plugin\PluginBase;
use Drupal\hello_plugin\MessagePluginInterface;

/**
 * Defines a base hello_plugin item implementation.
 *
 */
abstract class HelloPluginBase extends PluginBase implements HelloPluginInterface {

  /**
   * The label which is used for render of this tip.
   *
   * @var string
   */
  protected $label;


  /**
   * Implements \Drupal\tour\MessagePluginInterface::getLabel().
   */
  public function getLabel() {
    return $this->get('label');
  }


  /**
   * Implements \Drupal\tour\MessagePluginInterface::get().
   */
  public function get($key) {
    if (!empty($this->configuration[$key])) {
      return $this->configuration[$key];
    }
  }

  /**
   * Implements \Drupal\tour\MessagePluginInterface::set().
   */
  public function set($key, $value) {
    $this->configuration[$key] = $value;
  }
}
