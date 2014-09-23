<?php

/**
 * @file
 * Contains Drupal\hello_condition\EventSubscriber\HelloConditionEventSubscriber
 */

namespace Drupal\hello_condition\EventSubscriber;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Executable\ExecutableManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Provides a response event subscriber for path messages.
 */
class HelloConditionEventSubscriber implements EventSubscriberInterface {

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
   * alter request_path condition
   */
  public function setMessage(FilterResponseEvent $event) {
    /* @var \Drupal\system\Plugin\Condition\RequestPath $condition */
    $condition = $this->conditionManager->createInstance('request_path');

    // is hello page then display message
    $condition->setConfiguration(array('pages' => 'hello'));
    if ($condition->evaluate()) {
      drupal_set_message('hello word page');
    }
    else {
      drupal_set_message('not in hello page');
    }
  }
}
