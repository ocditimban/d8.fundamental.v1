<?php
/**
 * @file
 * Contains Drupal\hello_service\MyModuleServiceProvider
 */
namespace Drupal\hello_service;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
/**
 * Modifies the language manager service.
 */
class HelloServiceServiceProvider extends ServiceProviderBase {
  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    // Overrides language_manager class to test domain language negotiation.
    // get service is altered
    $definition = $container->getDefinition('hello_service.alter_service');
    // var_dump($definition);
    // change class from Drupal\hello_service\SimpleService to Drupal\hello_service\AlterService
    $definition->setClass('Drupal\hello_service\AlterService');
  }
}
