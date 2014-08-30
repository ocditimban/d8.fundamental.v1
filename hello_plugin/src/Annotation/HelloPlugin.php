<?php

/**
 * @file
 * Contains \Drupal\hello_plugin\Annotation\Message.
 */

namespace Drupal\hello_plugin\Annotation;

use Drupal\Component\Annotation\Plugin;

/*
 * create a file annotation
 * note classname must same plugin
 * Please see @HelloPlugin from hello_plugin\src\Plugin\HelloPlugin\MessagePluginNumber.php
 * and hello_plugin\src\Plugin\HelloPlugin\MessagePluginText.php
 */

/**
 * Defines a hello_plugin item annotation object.
 *
 *
 * @Annotation
 */
class HelloPlugin extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The title of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $title;

}
