<?php

namespace Drupal\hello_plugin\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\hello_plugin\HelloBag;

/**
 * Defines the configured hello entity.
 *
 * @ConfigEntityType(
 *   id = "hello_plugin_entity",
 *   label = @Translation("hello plugin"),
 *   controllers = {
*      "view_builder" = "Drupal\hello_plugin\HelloPluginViewBuilder"
 *   },
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   }
 * )
 */
// implements TourInterface
class HelloPluginEntity extends ConfigEntityBase {

  /**
   * The name (plugin ID) of the tour.
   *
   * @var string
   */
  public $id;

  /**
   * The module which this tour is assigned to.
   *
   * @var string
   */
  public $module;

  /**
   * The label of the tour.
   *
   * @var string
   */
  public $label;
  protected $hello;
  protected $helloBag;

  /**
   * Overrides \Drupal\Core\Config\Entity\ConfigEntityBase::__construct();
   */
  public function __construct(array $values, $entity_type) {
    // create entity
    // you cant get every method in entity
    parent::__construct($values, $entity_type);

    // get list plugin hello
    // also each method plugin
    $this->helloBag = new HelloBag(\Drupal::service('plugin.manager.hello_plugin.hello'), $this->hello);
    // dump a method getLabel in plugin
    // var_dump($this->helloBag->get('hello-text-1')->getLabel());
  }

  // get list plugin
  public function getListHello() {
    $results;
    foreach ($this->hello as $id => $value) {
      $results[] = $this->helloBag->get($id);
    }
    return $results;
  }

  // test function in enttiy
  public function renderHelloWord() {
    return 'Hello Word in render';
  }

}

