<?php

/**
 * @file
 * Contains \Drupal\hello_plugin\Plugin\HelloPlugin\HelloPluginText.
 */

namespace Drupal\hello_plugin\Plugin\HelloPlugin;

use Drupal\Component\Utility\String;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Utility\Token;
use Drupal\hello_plugin\HelloPluginBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Displays some text as a tip.
 *
 * @HelloPlugin(
 *   id = "text",
 *   title = @Translation("Text")
 * )
 */
class HelloPluginText extends HelloPluginBase implements ContainerFactoryPluginInterface {

  /**
   * Token service.
   *
   * @var \Drupal\Core\Utility\Token
   */
  protected $token;

  /**
   * Constructs a \Drupal\tour\Plugin\tour\tip\TipPluginText object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Utility\Token $token
   *   The token service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, Token $token) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->token = $token;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static($configuration, $plugin_id, $plugin_definition, $container->get('token'));
  }


  public function getPluginInfo() {
    return 'Plugin Text';
  }
}
