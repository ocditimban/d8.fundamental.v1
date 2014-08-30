<?php

/**
 * @file
 * Contains \Drupal\hello_plugin\HelloPluginViewBuilder.
 */

namespace Drupal\hello_plugin;

use Drupal\Core\Entity\EntityViewBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a Hello Plugin view builder.
 */
class HelloPluginViewBuilder extends EntityViewBuilder {

  /**
   * {@inheritdoc}
   * callback from entity_view_multiple($hello_plugins, 'full');
   * hello_plugin/src/Controller/Simple.php
   */
  public function viewMultiple(array $entities = array(), $view_mode = 'full', $langcode = NULL) {
    $build = array();
    $count = 0;
    foreach ($entities as $entity_id => $entity) {
      // get list plugin
      $list_hello = $entity->getListHello();
      foreach ($list_hello as $key => $hello_plugin) {
        // get method in plugin
        var_dump($hello_plugin->getPluginInfo());
        // echo plugin text
        // echo plugin number
      }
    }

    return  'count plugin' . $count;
  }

}
