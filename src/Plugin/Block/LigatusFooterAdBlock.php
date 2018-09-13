<?php

namespace Drupal\traffective\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Ligatus Footer Ads Block.
 *
 * @Block(
 *   id = "traffective_ligatus_footer_ads",
 *   admin_label = @Translation("Ligatus Footer Ads"),
 *   category = @Translation("Ad"),
 * )
 */
class LigatusFooterAdBlock extends BlockBase implements BlockPluginInterface {
  /**
   * {@inheritdoc}
   */
  public function build(): array {
    return [
      'content' => [
        '#type' => 'html_tag',
        '#tag' => 'div',
        '#attributes' => [
          'class' => ['ligatus-container']
        ],
        'content' => [
          '#type' => 'html_tag',
          '#tag' => 'script',
          '#attributes' => [
            'src' => 'https://a.ligatus.com/?ids=104766&t=js',
            'async' => 'async',
          ],
        ],
      ]
    ];
  }

}
