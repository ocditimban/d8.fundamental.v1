<?php
/**
 * @file
 * Contains \Drupal\hello_config_entity\Entity\HelloConfigEntity.
 */
namespace Drupal\hello_config_entity\Entity;
use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\hello_config_entity\HelloConfigEntityInterface;
/**
 * Defines the Example entity.
 *
 * @ConfigEntityType(
 *   id = "hello_config_entity",
 *   label = @Translation("hello_config_entity"),
 *   controllers = {
 *     "list_builder" = "Drupal\hello_config_entity\Controller\HelloConfigEntityBuilder",
 *     "form" = {
 *       "add" = "Drupal\hello_config_entity\Form\HelloConfigEntityForm",
 *       "edit" = "Drupal\hello_config_entity\Form\HelloConfigEntityForm",
 *       "delete" = "Drupal\hello_config_entity\Form\HelloConfigEntityDeleteForm"
 *     }
 *   },
 *   config_prefix = "hello_config_entity",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *   },
 *   links = {
 *     "delete-form" = "hello_config_entity.delete_config",
 *     "edit-form" = "hello_config_entity.edit_config",
 *   }
 * )
 */
class HelloConfigEntity extends ConfigEntityBase implements HelloConfigEntityInterface {
  /**
   * The Example ID.
   *
   * @var string
   */
  public $id;
  /**
   * The Example label.
   *
   * @var string
   */
  public $label;
  // Your specific configuration property get/set methods go here,
  // implementing the interface.
}
