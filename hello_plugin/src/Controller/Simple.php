<?php

namespace Drupal\hello_plugin\Controller;

class Simple {
  public function renderPlugin() {
    // 1: use enttiy create
    // 2: or use hello_plugin/config/install/hello_plugin.hello_plugin_entity.hello_plugin2.yml
    // create data from schema at hello_plugin\config\schema\hello_plugin.schema.yml
    // it use to test
    //
    // $test_entity = entity_create('hello_plugin_entity', array(
    //   'id' => 'hello_plugin1',
    //   'label' => 'Tour test english',
    //   'langcode' => 'en',
    //   'module' => 'system',
    //   'hello' => array(
    //     'hello-text-1' => array(
    //       'id' => 'hello-text-1',
    //       'plugin' => 'text',
    //       'label' => 'The rain in spain (text plugin)',
    //     ),
    //     'hello-text-2' => array(
    //       'id' => 'hello-text-2',
    //       'plugin' => 'number',
    //       'label' => 'The rain in spain (number plugin)',
    //     ),
    //   )
    // ));
    // $test_entity->save();

    // get hello_plugin1 from above entity
    $results = \Drupal::entityQuery('hello_plugin_entity')
      ->execute();
    var_dump($results);
    // load entity above
    if (!empty($results) && $entity_items = entity_load_multiple('hello_plugin_entity', array_keys($results))) {
      foreach ($entity_items as $id => $entity_item) {
        // render method in entity
        // var_dump($entity_item->renderHelloWord());
      }
    }

    if (!empty($entity_items)) {
      // callback view builder (entity_items)
      // hello_plugin/src/HelloPluginViewBuilder.php
      // function viewMultiple
      entity_view_multiple($entity_items, 'full');
    }
    return 'test plugin';
  }
}
