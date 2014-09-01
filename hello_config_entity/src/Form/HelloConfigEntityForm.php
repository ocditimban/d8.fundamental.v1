<?php
/**
 * @file
 * Contains \Drupal\hello_config_entity\Form\HelloConfigEntityForm.
 */
namespace Drupal\hello_config_entity\Form;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityForm;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\Query\QueryFactory;
use Drupal\Core\Form\FormStateInterface;
class HelloConfigEntityForm extends EntityForm {
  /**
   * @param \Drupal\Core\Entity\Query\QueryFactory $entity_query
   *   The entity query.
   */
  public function __construct(QueryFactory $entity_query) {
    $this->entityQuery = $entity_query;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity.query')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'hello_config_entity';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    // $form = parent::form($form, $form_state);
    $example = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $example->label(),
      '#description' => $this->t("Label for the Example."),
      '#required' => TRUE,
    );
    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $example->id(),
      '#machine_name' => array(
        'exists' => array($this, 'exist'),
      ),
      '#disabled' => !$example->isNew(), //
    );
    // You will need additional form elements for your custom properties.
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, array &$form_state) {
    $example = $this->entity;
    $status = $example->save();
    if ($status) {
      drupal_set_message($this->t('Saved the %label Example.', array(
        '%label' => $example->label(),
      )));
    }
    else {
      drupal_set_message($this->t('The %label Example was not saved.', array(
        '%label' => $example->label(),
      )));
    }
    $form_state['redirect_route']['route_name'] = 'hello_config_entity.list';
  }
  public function exist($id) {
    $entity = $this->entityQuery->get('hello_config_entity')
      ->condition('id', $id)
      ->execute();
    return (bool) $entity;
  }
}
