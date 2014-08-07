<?php

/**
 * @file
 * Contains Drupal\hello\EventSubscriber\HelloMessageEventSubscriber
 */

namespace Drupal\hello\EventSubscriber;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Executable\ExecutableManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Provides a response event subscriber for path messages.
 */
class HelloMessageEventSubscriber implements EventSubscriberInterface {

  /**
   * The path message config.
   *
   * @var \Drupal\Core\Config\Config
   */
  protected $config;

  /**
   * The condition manager.
   *
   * @var \Drupal\Core\Executable\ExecutableManagerInterface
   */
  protected $conditionManager;

  /**
   * Creates a new PathMessageEventSubscriber.
   */
  public function __construct(ConfigFactoryInterface $config_factory, ExecutableManagerInterface $condition_manager) {
    // $this->config = $config_factory->get('path_message.settings');
    $this->config ='<front>';
    $this->conditionManager = $condition_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::RESPONSE][] = array('setMessage', 1000);
    return $events;
  }

  /**
   * Sets a message for a matching path.
   */
  public function setMessage(FilterResponseEvent $event) {
    /* @var \Drupal\system\Plugin\Condition\RequestPath $condition */
    $condition = $this->conditionManager->createInstance('request_path');
    // $condition->setConfiguration($this->config->get('request_path'));
     $condition->setConfiguration(array('pages' => '<front>'));
//     var_dump($condition);
//    $condition->configuration['pages'] = '<front>';

    if ($condition->evaluate()) {
      // drupal_set_message($this->config->get('message'));
       drupal_set_message('Hello World');
    }
  }
}
