<?php

/**
 * @file
 * Contains \Drupal\hello_field\Plugin\Field\FieldWidget\HellofieldDefaultWidget.
 */

namespace Drupal\hello_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;

/**
 * Plugin implementation of the 'hello_field_default' widget.
 *
 * @FieldWidget(
 *   id = "hello_field_default",
 *   label = @Translation("Hello Field Default"),
 *   field_types = {
 *     "hello_field"
 *   }
 * )
 */
class HellofieldDefaultWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, array &$form_state) {
    $element['introduction'] = $element +array(
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->introduction) ? $items[$delta]->introduction : NULL,
      '#placeholder' => 'Introduction',
    );
    $element['first_name'] = array(
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->first_name) ? $items[$delta]->first_name : NULL,
      '#placeholder' => 'First Name',
    );
    $element['last_name'] = array(
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->last_name) ? $items[$delta]->last_name : NULL,
      '#placeholder' => 'Last Name',
    );
    return $element;
  }

}
