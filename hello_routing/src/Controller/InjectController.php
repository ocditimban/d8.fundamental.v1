<?php

namespace Drupal\hello_routing\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Session\AccountProxy;

// you should read:
// Symfony\Component\DependencyInjection\ContainerInterface
// Drupal\Core\DependencyInjection\ContainerInjectionInterface;
//
class InjectController implements ContainerInjectionInterface {
  private $current_user;

  public function __construct(AccountProxy $account) {
    $this->current_user = $account;
  }

  public static function create(ContainerInterface $container) {
    // get service
    return new static (
      $container->get('current_user')
    );
  }

  public function render() {
    return 'email of the current user ' . $this->current_user->getAccount()->getEmail();
  }
}
