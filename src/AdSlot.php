<?php

/**
 * @file
 * Contains \Drupal\traffective\AdSlot.
 */

namespace Drupal\traffective;

class AdSlot {

  /**
   * The ad slot format.
   *
   * @var string
   */
  private $format;

  /**
   * The numeric offset of the ad slot.
   *
   * @var int
   */
  private $offset;

  /**
   * The actual offset where the ad was placed.
   *
   * @var int|NULL
   */
  private $placed = NULL;

  /**
   * AdSlot constructor.
   *
   * @param $format
   *   The ad slot format.
   *
   * @param $offset
   *   The numeric offset of the ad slot.
   */
  public function __construct(string $format, int $offset) {
    $this->format = $format;
    $this->offset = $offset;
  }

  /**
   * Gets the ad slot offset.
   *
   * @return int
   */
  public function getOffset(): int {
    return $this->offset;
  }

  /**
   * Sets the offset of the ad slot.
   *
   * @param int $offset
   *   The new offset of the ad slot.
   */
  public function setOffset(int $offset): void {
    $this->offset = $offset;
  }


  /**
   * Gets the actual placed offset of the ad slot.
   *
   * @return int|NULL
   */
  public function getPlaced(): ?int {
    return $this->placed;
  }


  /**
   * Sets the actual offset of the ad slot.
   *
   * @param int $value
   *   The actual offset where the ad slot was placed.
   */
  public function setPlaced(int $value): void {
    $this->placed = $value;
  }

  /**
   * Registers a new Twig theme for rendering an ad slot.
   *
   * @return array
   */
  public static function setTheme(): array {
    return [
      'traffective_adslot' => [
        'variables' => [
          'format' => '',
          'render_count' => NULL,
        ],
      ],
    ];
  }

  /**
   * Returns an ad slot render array.
   *
   * @param string $format
   *   The ad slot format to render.
   *
   * @return array
   */
  public static function render(string $format): array {
    return [
      '#theme' => 'traffective_adslot',
      '#format' => $format,
    ];
  }

  /**
   * Increments a global counter for each ad format to unique div IDs.
   *
   * @param array $variables
   *   The ad slot theme variables.
   */
  public static function incrementCounter(array &$variables): void {
    $count = &drupal_static(__FUNCTION__ . '_' . $variables['format'], 1);
    $variables['render_count'] = $count;
    $count++;
  }

}
