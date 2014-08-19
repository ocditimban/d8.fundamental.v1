<?php

namespace Drupal\hello_routing_advance\Routing;
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  public function alterRoutes(RouteCollection $collection) {
    // change path '/user/login' to '/login'
    if ($route = $collection->get('user.login')) {
      $route->setPath('/login');
    }
    // inject container
    // alter to change path and add name argument
    // change path and method
    if ($route = $collection->get('hello_routing_advance.inject_container')) {
      $route->setPath('/hello_routing_advance/inject/{name}');
      $route->setDefault('_content', '\Drupal\hello_routing_advance\Controller\InjectContainerController::renderArg');
    }
  }
}

