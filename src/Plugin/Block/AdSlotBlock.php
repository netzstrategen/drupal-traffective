<?php

namespace Drupal\traffective\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\traffective\AdSlot;

/**
 * Provides a Traffective AdSlot Block.
 *
 * @Block(
 *   id = "traffective_adslot",
 *   admin_label = @Translation("Traffective AdSlot"),
 *   category = @Translation("Ad"),
 * )
 */
class AdSlotBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $config = $this->getConfiguration();
    if (!$format = ($config['traffective_adslot'] ?? '')) {
      return [];
    }
    return AdSlot::render($format);
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state): array {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['traffective_adslot'] = [
      '#type' => 'select',
      '#title' => $this->t('Format'),
      // @todo Register missing options.
      '#options' => [
        'billboard' => $this->t('Billboard'),
        'button' => $this->t('Button'),
        'contentbanner' => $this->t('Contentbanner'),
        'halfpage' => $this->t('Halfpage'),
        'rectangle' => $this->t('Rectangle'),
        'skyscraper' => $this->t('Skyscraper'),
        'superbanner' => $this->t('Superbanner'),
      ],
      '#default_value' => $config['traffective_adslot'] ?? '',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state): void {
    parent::blockSubmit($form, $form_state);
    $this->configuration['traffective_adslot'] = $form_state->getValue('traffective_adslot');
  }

}
