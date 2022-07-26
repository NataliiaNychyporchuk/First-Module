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

class nnychyporchukController extends ControllerBase {

  public function build() {
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('Hello! You can add here a photo of your cat.'),
    ];
    $build['form'] = \Drupal::formBuilder()->getForm(
      '\Drupal\nnychyporchuk\Form\CatsForm'
    );

    return $build;
  }
}
