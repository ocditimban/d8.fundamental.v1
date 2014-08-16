<?php

namespace Drupal\hello_request\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

class HelloResponseController {
  public function renderhtml() {
    $response = new Response(
      'Content',
      Response::HTTP_OK,
      array('content-type' => 'text/html')
    );
    return $response;
  }

  /*
   * send method use to
   * attach helloword into my test string
   */
  public function sendHtml() {
    $response = new Response(
      'Content',
      Response::HTTP_OK,
      array('content-type' => 'text/html')
    );

    $response->setContent('Hello World');

    $response->headers->set('Content-Type', 'text/plain');
    $response->setStatusCode(Response::HTTP_NOT_FOUND);
    $response->headers->setCookie(new Cookie('foo', 'bar'));
    $response->send();
    return 'my test';
  }

  public function renderjson() {
    $response = new Response();
    $response->setContent(json_encode(array(
        'data' => 123,
    )));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
  }

}

