<?php

/**
 * @file
 * Contains \Drupal\hello_field\Plugin\Field\FieldType\HellofieldItem
 */

namespace Drupal\hello_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;


/**
 * Plugin implementation of the 'hello_field' field type.
 *
 * @FieldType(
 *   id = "hello_field",
 *   label = @Translation("Hello Field"),
 *   description = @Translation("This field stores a hello field in the database."),
 *   default_widget = "hello_field_default",
 *   default_formatter = "hello_field"
 * )
 */

class HellofieldItem extends FieldItemBase {

  /*
   * create schema with description . first_name . last_name
   * Eg: wellcome oc ditimban
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'introduction' => array(
          'type' => 'varchar',
          'length' => 256,
          'not null' => FALSE,
        ),
        'first_name' => array(
          'type' => 'varchar',
          'length' => 256,
          'not null' => FALSE,
        ),
        'last_name' => array(
          'type' => 'varchar',
          'length' => 256,
          'not null' => FALSE,
        ),
      ),
    );
  }

  /**
   *
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['introduction'] = DataDefinition::create('string')
      ->setLabel(t('Introduction'));
    $properties['first_name'] = DataDefinition::create('string')
      ->setLabel(t('First Name'));
    $properties['last_name'] = DataDefinition::create('string')
      ->setLabel(t('Last Name'));
    return $properties;
  }

  public function isEmpty() {
    $first_name = $this->get('first_name')->getValue();
    $last_name = $this->get('last_name')->getValue();
    return empty($first_name) && empty($last_name);
  }
}
