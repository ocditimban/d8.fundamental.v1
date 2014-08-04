<?php

/**
 * @file
 * Definition of Drupal\help\Tests\HelpTest.
 */

namespace Drupal\hello\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Tests help display and user access for all modules implementing help.
 */
class HelloTest extends WebTestBase {

  /**
   * Modules to enable.
   *
   * @var array.
   */
 public static $modules = array('hello');

  // Tests help implementations of many arbitrary core modules.
  protected $profile = 'standard';

  /**
   * The admin user that will be created.
   */
  protected $adminUser;

  /**
   * The anonymous user that will be created.
   */
  protected $anyUser;

  public static function getInfo() {
    return array(
      'name' => 'Hello functionality',
      'description' => 'Verify help display and user access to help based on permissions.',
      'group' => 'Hello',
    );
  }

  public function setUp() {
    parent::setUp();

//    $this->getModuleList();

    // Create users.
    $this->adminUser = $this->drupalCreateUser(array('access content', 'access administration pages', 'view the administration theme', 'administer permissions'));
    $this->anyUser = $this->drupalCreateUser(array());
  }

  /**
   * Logs in users, creates dblog events, and tests dblog functionality.
   */
  public function testHello() {
    // Login the admin user.
//    $this->drupalLogin($this->adminUser);
//    $this->verifyHelp();
//
//    // Login the regular user.
//    $this->drupalLogin($this->anyUser);
//    $this->verifyHelp(403);

    // Check for css on admin/help.
    $this->drupalLogin($this->adminUser);
    // $this->drupalGet('admin/help');
    // $this->drupalGet('hello/test');
    // $this->drupalGet('hello1');
    // $this->drupalGet('hello3');
    $this->drupalGet('hello');
    $this->drupalGet('hello/phuongbui');
    $this->drupalGet('hello1');
//    $this->assertRaw('help.module.css', 'The help.module.css file is present in the HTML.');
//
//    // Verify that introductory help text exists, goes for 100% module coverage.
//    $this->assertRaw(t('For more information, refer to the subjects listed in the Help Topics section or to the <a href="!docs">online documentation</a> and <a href="!support">support</a> pages at <a href="!drupal">drupal.org</a>.', array('!docs' => 'https://drupal.org/documentation', '!support' => 'https://drupal.org/support', '!drupal' => 'https://drupal.org')), 'Help intro text correctly appears.');
//
//    // Verify that help topics text appears.
//    $this->assertRaw('<h2>' . t('Help topics') . '</h2><p>' . t('Help is available on the following items:') . '</p>', 'Help topics text correctly appears.');
//
//    // Make sure links are properly added for modules implementing hook_help().
//    foreach ($this->getModuleList() as $module => $name) {
//      $this->assertLink($name, 0, format_string('Link properly added to @name (admin/help/@module)', array('@module' => $module, '@name' => $name)));
//    }
  }
}
