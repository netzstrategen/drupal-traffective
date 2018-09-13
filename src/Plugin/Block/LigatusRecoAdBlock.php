<?php

namespace Drupal\traffective\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Ligatus Reco Ads Block.
 *
 * @Block(
 *   id = "traffective_ligatus_reco_ads",
 *   admin_label = @Translation("Ligatus Reco Ads"),
 *   category = @Translation("Ad"),
 * )
 */
class LigatusRecoAdBlock extends BlockBase implements BlockPluginInterface {
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
            'src' => 'https://a.ligatus.com/?ids=104548&t=js',
            'async' => 'async',
          ],
        ],
      ]
    ];
  }

}
