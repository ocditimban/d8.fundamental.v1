<?php
/**
 * @file
 * Contains \Drupal\hello_config_entity\Form\HelloConfigEntityDeleteForm.
 */
namespace Drupal\hello_config_entity\Form;
use Drupal\Core\Entity\EntityConfirmFormBase;
use Drupal\Core\Url;
use Drupal\Core\Form\FormStateInterface;
/**
 * Builds the form to delete a Example.
 */
class HelloConfigEntityDeleteForm extends EntityConfirmFormBase {
  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete %name?', array('%name' => $this->entity->label()));
  }
  /**
   * {@inheritdoc}
   */
  public function getCancelRoute() {
    return new Url('hello_config_entity.list');
  }
  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }
  /**
   * {@inheritdoc}
   */
  public function submit(array $form, array &$form_state) {
    $this->entity->delete();
    drupal_set_message($this->t('Category %label has been deleted.', array('%label' => $this->entity->label())));
    $form_state['redirect_route'] = $this->getCancelRoute();
  }

}
