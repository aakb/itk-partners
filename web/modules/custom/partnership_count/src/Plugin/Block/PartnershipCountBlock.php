<?php
/**
 * @file
 * Contains \Drupal\partnership_count\Plugin\Block\PartnershipCountBlock.
 */

namespace Drupal\partnership_count\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'partnership count' block.
 *
 * @Block(
 *   id = "partnership_count_block",
 *   admin_label = @Translation("Partnership count block"),
 *   category = @Translation("ITK")
 * )
 */
class PartnershipCountBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {

    $query = \Drupal::database()->select('node_field_data', 'n');
    $query->condition('n.type', 'partner');
    $query->condition('n.status', '1');
    $count = $query->countQuery()->execute()->fetchField();

    return array(
      '#type' => 'markup',
      '#markup' => $count,
      '#cache' => [
        'disabled' => TRUE,
      ],
    );
  }
}