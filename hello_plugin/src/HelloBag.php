<?php

/**
 * @file
 * Contains \Drupal\hello_plugin\HelloBag.
 */
namespace Drupal\hello_plugin;

use Drupal\Core\Plugin\DefaultPluginBag;

/**
 * A collection of hello.
 * Get all methods in plugin
 * It is default class
 */
class HelloBag extends DefaultPluginBag {

  /**
   * {@inheritdoc}
   */
  protected $pluginKey = 'plugin';

  /**
   * {@inheritdoc}
   *
   * @return \Drupal\tour\TipPluginInterface
   */
  public function &get($instance_id) {
    return parent::get($instance_id);
  }

}
