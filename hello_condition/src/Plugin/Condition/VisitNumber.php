<?php

/**
 * @file
 * Contains \Drupal\hello_condition\Plugin\Condition\VisitNumber.
 */

namespace Drupal\hello_condition\Plugin\Condition;

use Drupal\Core\Condition\ConditionPluginBase;
use Drupal\Core\Plugin\Context\ContextDefinition;
use Drupal\Component\Serialization\PhpSerialize;
use Drupal\Core\KeyValueStore\DatabaseStorage;
use Drupal\Core\Database\Database;

/**
 * Provides a 'VisitNumber' condition.
 *
 * @Condition(
 *   id = "visit_number",
 *   label = @Translation("Visit Number"),
 *   context = {
 *     "user" = @ContextDefinition("entity:user", label = @Translation("User"))
 *   }
 * )
 *
 */
class VisitNumber extends ConditionPluginBase {

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, array &$form_state) {
    $form['number'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Display Limit Number'),
      '#default_value' => isset($this->configuration['number']) ? $this->configuration['number'] : 0,
      '#description' => $this->t('Display Number By User'),
    );


    $form['enable'] = array(
      '#type' => 'checkboxes',
      '#title' => $this->t('Enable Search'),
      '#default_value' => $this->configuration['enable'],
      '#options' => array('true' => 'UnEnable'),
      '#description' => $this->t('Create checkbox enable search block.'),
    );

    $form['bid'] = array(
      '#type' => 'hidden',
      '#value' => $form_state['controller']->getEntity()->id,
    );

    // false is do not display
    // var_dump($this->getCurrentUserVisitNumber());
    return parent::buildConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return array(
      'enable' => array(),
    ) + parent::defaultConfiguration();
  }

  public function getCurrentUserVisitNumber($bid) {
    $account = \Drupal::currentUser();
    $storage = new DatabaseStorage('kv', new PhpSerialize(), Database::getConnection());
    return $storage->get($bid . ':' . $account->id());
  }

  public function setCurrentUserVisitNumber($bid, $number = 0, $reset = false) {
    // if reset
    if ($reset) {
      $number = 0;
    }

    $number++;
    $account = \Drupal::currentUser();
    $storage = new DatabaseStorage('kv', new PhpSerialize(), Database::getConnection());
    return $storage->set($bid . ':' . $account->id(), $number);
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, array &$form_state) {
    // var_dump('abc');
    $this->configuration['enable'] = array_filter($form_state['values']['enable']);
    $this->configuration['number'] = $form_state['values']['number'];
    $this->configuration['bid'] = $form_state['values']['bid'];

    $this->setCurrentUserVisitNumber($form_state['values']['bid'], '', TRUE);

    // get user info
    parent::submitConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function summary() {
    return 'summary';
  }

  /**
   * {@inheritdoc}
   */
  public function evaluate() {
    // uncheck checkbox
    if ($this->configuration['enable'] == FALSE) {
      if (!empty($this->configuration['bid']) && $bid = $this->configuration['bid']) {
        $number = $this->getCurrentUserVisitNumber($bid);

        $this->setCurrentUserVisitNumber($bid, $number);
        if ($number > $this->configuration['number']) {
          return FALSE;
        }
      }
      return TRUE;
    }

    if (empty($this->configuration['enable']) && !$this->isNegated()) {
      return TRUE;
    }

    return (bool) $this->configuration['enable'];
  }

}
