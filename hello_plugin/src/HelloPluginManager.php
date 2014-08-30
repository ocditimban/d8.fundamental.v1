<?php

/**
 * @file
 * Contains \Drupal\hello_plugin\HelloPluginManager.
 */

namespace Drupal\hello_plugin;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Provides a plugin manager for HelloPlugin items.
 *
 */
class HelloPluginManager extends DefaultPluginManager {

  /**
   * Constructs a new HelloPluginManager.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations,
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    // see Drupal\hello_plugin\Annotation\HelloPlugin
    parent::__construct('Plugin/HelloPlugin', $namespaces, $module_handler, 'Drupal\hello_plugin\Annotation\HelloPlugin');
    $this->alterInfo('hello_plugin_message_info');
    $this->setCacheBackend($cache_backend, 'hello_plugins');
  }

}
