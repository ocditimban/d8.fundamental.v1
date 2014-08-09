<?php

/**
 * @file
 * Contains \Drupal\hello_field\Plugin\FieldFormatter\HellofieldFormatter.
 */

namespace Drupal\hello_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'hello_field' formatter.
 *
 * @FieldFormatter(
 *   id = "hello_field",
 *   label = @Translation("Hello Field Format"),
 *   field_types = {
 *     "hello_field"
 *   }
 * )
 */
class HellofieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  // public static function defaultSettings() {
  //   return array(
  //     'title' => 'Hello',
  //   ) + parent::defaultSettings();
  // }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items) {
    var_dump($items->__get('introduction'));
    $element = array();
    // var_dump($items);
    foreach ($items as $delta => $item) {
      $element[$delta] = array('#markup' => $item->introduction . ' ' . $item->first_name . ' ' . $item->last_name);
    }
    return $element;
  }
}
