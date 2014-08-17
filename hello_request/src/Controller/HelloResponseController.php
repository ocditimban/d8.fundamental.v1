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

  public function renderCacheControl() {
    $response = new Response();
    // The following headers force validation of cache.
    // $response->headers->set('Expires', 'Sat, 16 Aug 2014 10:00:34 GMT');
    // $response->headers->set('Cache-Control', 'must-revalidate, max-age=3600');
    // $response->headers->set('Content-Type', 'application/rss+xml; charset=utf-8');
    // $response->setExpires('60');
    // $response->setPublic();
    // $response->setMaxAge(600);
    // $response->setCache(array('public' => TRUE));
    // $response->setContent(time());

    // $response->setMaxAge(600);
    // $response->headers->set('Expires', 'Sun, 19 Nov 1978 05:00:00 GMT');
    // $response->headers->set('Cache-Control', 'max-age=2592000, public');
    $response->headers->set('Connection', 'keep-alive');
    $response->headers->set('Expires', 'Sat, 16 Aug 2014 20:47:12 GMT');
    // $response->headers->set('Content-Type', 'application/rss+xml; charset=utf-8');
    $response->setPublic();
    $response->setContent(time());
    $response->send();
    // $response->setExpires(time() + 6000);
    // var_dump($response->headers);
    return $response;
  }

}

