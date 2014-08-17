<?php

namespace Drupal\hello_request\Controller;
use Symfony\Component\HttpFoundation\Request;

class HelloRequestController {
  public function render() {
    $request = Request::createFromGlobals();
    // or Drupal::request()
    ///////////////////////////////////////////////////////
    //                          GET QUERY                //
    ///////////////////////////////////////////////////////
    // http://d8v1.com/request/client?foo[bar]=bar1123
    // var_dump($request->query->get('foo[bar]', null, true));
    // echo bar1123
    //
    // http://d8v1.com/request/client?foo=bar
    // var_dump($request->query->get('foo'));
    // echo bar
    //
    //////////////////////////////////////////////////////
    //                    PATH INFO                     //
    //////////////////////////////////////////////////////
    // http://d8v1.com/request/client?foo[bar]=bar1123
    // var_dump($request->getPathInfo());
    // echo request/client
    //
    /////////////////////////////////////////////////////
    //          CREATE A REQUEST                       //
    /////////////////////////////////////////////////////
    // $request = Request::create('/hello', 'POST',array('name' => 'Fabien'));
    //
    // var_dump($request->getMethod());
    // echo GET
    //
    // var_dump($request->getPort());
    // echo 80
    //
    // var_dump($request->getQueryString());
    // echo name=Fabien
    //
    // var_dump($request->getPathInfo());
    // echo hello
    //
    // var_dump($request->getRequestFormat());
    // echo html
    //
    // var_dump($request->getRequestUri());
    // echo /hello?name=Fabien
    //
    // var_dump($request->getCharsets());
    // array (size=3)
    // 0 => string 'ISO-8859-1' (length=10)
    // 1 => string 'utf-8' (length=5)
    // 2 => string '*' (length=1)
    //
    // var_dump($request->getLanguages());
    // array (size=2)
    // 0 => string 'en_US' (length=5)
    // 1 => string 'en' (length=2)
    //
    // var_dump($request->getScheme());
    // echo html
    //
    // var_dump($request->getSchemeAndHttpHost());
    // echo http://localhost
    //
    // var_dump($request->getUri());
    // echo http://localhost/hello?name=Fabien
    //
    //////////////////////////////////////////////////////////////////
    //                    GET ALL VARIABLE                          //
    //////////////////////////////////////////////////////////////////
    //
    // $_GET = $this->query->all();
    // $_POST = $this->request->all();
    // $_SERVER = $this->server->all();
    // $_COOKIE = $this->cookies->all();
    //
    // var_dump($request->query->all());
    // 'name' => string 'Fabien' (if you use with method GET) $request = Request::create('/hello', 'GET',array('name' => 'Fabien'));
    // var_dump($request->request->all());
    // 'name' => string 'Fabien' (if you use with method POST) $request = Request::create('/hello', 'POST',array('name' => 'Fabien'));
    return 'hello request';
  }

  public function renderSubRequest() {
    return 'hello sub request';
  }

}

