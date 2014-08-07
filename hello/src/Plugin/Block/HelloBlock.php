<?php
  namespace Drupal\hello\Plugin\Block;
  use Drupal\block\BlockBase;
  /**
   * Provides a 'Fax' block.
   *
   * @Block(
   *   id = "hello_block",
   *   admin_label = @Translation("Hello block"),
   * )
   */
  class HelloBlock extends BlockBase {
    // Override BlockPluginInterface methods here.
   /**
    * Implements \Drupal\block\BlockBase::blockBuild().
   */
    public function build() {
      return array(
        '#children' => 'This is a block!',
      );
    }
  }
