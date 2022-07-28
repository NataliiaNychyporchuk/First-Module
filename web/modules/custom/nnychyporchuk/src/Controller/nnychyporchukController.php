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
use Drupal\file\Entity\File;

class nnychyporchukController extends ControllerBase {

  public function build() {
    $cats = $this->getCats();
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('Hello! You can add here a photo of your cat.'),
    ];
    $build['form'] = \Drupal::formBuilder()->getForm(
      '\Drupal\nnychyporchuk\Form\CatsForm'
    );
    $build['cats'] = [
      '#theme' => 'nnychyporchuk_theme_hook',
      '#cats' => '$cats',
      ];
    return $build;
  }

  public static function getCats() {
    $database = \Drupal::database();
    $result = $database->select('nnychyporchuk', 'n')
    ->fields('n', ['name', 'datetime', 'email', 'image'])
    ->orderBy('id', 'DESC')
    ->execute()->fetchAll();

    $data = [];

    foreach ($result as $row) {
      $file = File::load($row->image);
      $uri = $file->getFileUri();
      $imgCat = [
        '#theme' => 'image',
        '#uri' => $uri,
        '#alt' => 'Cat',
        '#width' => 125,
      ];
      $data[] = [
        'name' => $row->name,
        'email' => $row->email,
        'image' => [
          'data' => $imgCat,
        ],
        'datetime' => $row->datetime,
      ];
    }
    $build['table'] = [
      '#type' => 'table',
      '#rows' => $data,
    ];
    return $build;
  }

}
