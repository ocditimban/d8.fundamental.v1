<?php
namespace Drupal\hello_routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class HelloRoutingController {
  public function renderContent() {
    return '<div class="html">routing content</div>';
  }

  public function renderArgumentContent($name, $namedefault) {
    return "Hello {$name} {$namedefault}";
  }


  public function renderNoResponse() {
    return '<div class="html">routing content</div>';
  }

  public function renderController() {
    $response = new Response(
      '<h1 class="html">Content From Response</h1>',
      Response::HTTP_OK,
      array('content-type' => 'text/html')
    );
    return $response;
  }

  public function attachForm() {
    $form = \Drupal::formBuilder()->getForm('Drupal\hello_routing\Form\ExampleForm');
    return '<div>attach form</div>' . render($form);
  }

  public function renderOptionsContent() {
    return 'add access options';
  }
}
