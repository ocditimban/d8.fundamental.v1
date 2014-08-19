<?php
/**
 * @file
 * Contains \Drupal\example\Controller\ExamleController.
 */
namespace Drupal\hello_routing_advance\Controller;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Access\AccessInterface;
/**
 * Builds an example page.
 */
class CustomAccessController {
  /**
   * A user account to check access for.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $account;
  /**
   * Constructs a CustomAccessCheck object.
   *
   * @param \Drupal\Core\Session\AccountInterface
   *   The user account to check access for.
   */
  // public function __construct(AccountInterface $account) {
  public function __construct() {
    // $this->account = $account;
  }

  public function content() {
    return 'this is my content';
  }

  /**
   * Checks access for a specific request.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request to check access for.
   */
  public function checkAccess(Request $request) {
    return AccessInterface::ALLOW;
    // return AccessInterface::DENY;
  }
}
