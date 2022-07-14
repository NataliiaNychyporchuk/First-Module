<?php
/**
 * @return
 * Contains \Drupal\nnychyporchuk\Controller\nnychyporchukController
 */

namespace Drupal\nnychyporchuk\Controller;

/**
 * Provides route responses for the nnychyporchuk module
 */
use Drupal\Core\Controller\ControllerBase;

class nnychyporchukController {
  /**
   * Returns a simple page.
   *
   * @return array
   * A simple renderable array.
   */
  public function build() {
    return array(
      '#markup' => 'Hello! You can add here a photo of your cat.',
    );
  }
}
