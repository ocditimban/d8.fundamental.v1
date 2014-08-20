<?php

namespace Drupal\hello_routing_advance\Routing;

use Symfony\Cmf\Component\Routing\Enhancer\RouteEnhancerInterface;
use Symfony\Component\HttpFoundation\Request;

class DemoRouteEnhancer implements RouteEnhancerInterface
{

    public function enhance(array $defaults = [], Request $request)
    {
        if (isset($defaults['country'])) {
          $defaults['country'] = 'Việt Nam';
        }
        // echo '<pre>'; print_r($defaults); echo '</pre>';
        return $defaults;
    }

}
