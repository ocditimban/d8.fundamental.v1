<?php

namespace Drupal\hello_routing_advance\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;

// you should read:
// Symfony\Component\DependencyInjection\ContainerInterface
// Drupal\Core\DependencyInjection\ContainerInjectionInterface;
//
class InjectContainerController implements ContainerInjectionInterface {
  private $hello;
  private $word;

  public function __construct(Hello $hello, Word $word) {
    $this->hello = $hello;
    $this->word = $word;
  }

  public static function create(ContainerInterface $container) {
    // get service
    return new static (
      $container->get('hello_routing_advance.hello'),
      $container->get('hello_routing_advance.word')
    );
  }

  public function render() {
    return 'Hi phuong ' . $this->hello->render() . ' ' . $this->word->render();
  }

  public function renderArg($name) {
    return 'Hi ' . $name . ' ' . $this->hello->render() . ' ' . $this->word->render();
  }
}
