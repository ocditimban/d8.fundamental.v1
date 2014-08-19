<?php

namespace Drupal\hello_routing_advance\Routing;
use Symfony\Component\Routing\Route;

class HelloRoutingAdvance {
  public function routes() {
    $routes = array();
    $routes['hello_routing_advance.content'] = new Route(
      '/hello_routing_advance/dynamic_route',
      array(
        '_content' => '\Drupal\hello_routing_advance\Controller\HelloRoutingAdvanceController::content',
        '_title' => 'HelloRoutingAdvance Content',
      ),
      array(
        '_permission' => 'access content',
      )
    );
    return $routes;
  }
}
