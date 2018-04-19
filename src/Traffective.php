<?php

/**
 * @file
 * Contains \Drupal\traffective\Traffective.
 */

namespace Drupal\traffective;

use Twig_Extension;
use Twig_SimpleFunction;

/**
 * Registers a new `traffective_adslot` function to render ad slots from Twig templates.
 *
 * @see \Drupal\traffective\AdSlot
 *
 * @implements Twig_ExtensionInterface
 */
class Traffective extends Twig_Extension {

  /**
   * {@inheritdoc}
   */
  public function getFunctions() {
    return [
      new Twig_SimpleFunction('traffective_adslot', __NAMESPACE__ . '\AdSlot::render'),
    ];
  }

}
