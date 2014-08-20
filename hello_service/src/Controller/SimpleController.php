<?php
namespace Drupal\hello_service\Controller;

class SimpleController {
  public function render() {
    $service = \Drupal::service('hello_service.simple');
    return 'hello simple controller ' . $service->setName('phuongbui')->render();
  }

  // call parent service
  // get render method of the child service
  // they run contruct in child service after they go to parent service
  public function argumentServiceRender() {
    $parent_service = \Drupal::service('hello_service.argument_service');
    return 'hello simple controller ' . $parent_service->renderSimpleService();
  }
}
