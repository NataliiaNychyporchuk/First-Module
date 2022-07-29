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
use Drupal\file\Entity\File as File;
use Drupal\Core\Url as Url;

class nnychyporchukController extends ControllerBase {

  public function build() {
    $cats = $this->getCats();
    $build = [
      'content' => [
        '#type' => 'item',
        '#markup' => $this->t('Hello! You can add here a photo of your cat.'),
      ],
      'form' => \Drupal::formBuilder()->getForm('\Drupal\nnychyporchuk\Form\CatsForm'),
      'cats' => [
        '#theme' => 'nnychyporchuk_theme_hook',
        '#cats' => $cats,
      ],
    ];
    $renderer = \Drupal::service('renderer');
    foreach ($cats as &$cat) {
      $buttons = [
        '#theme' => 'nnychyporchuk_buttons_cat',
        '#id' => $cat->id,
      ];
      $cat->cats_button = $renderer->render($buttons);
    }
    return $build;
  }

  public static function getRouteName(): string {
    return 'nnychyporchuk.cats';
  }

  public static function getCats() {
    $database = \Drupal::database();
    $result = $database->select('nnychyporchuk', 'n')
      ->fields('n', ['name', 'datetime', 'email', 'image'])
      ->orderBy('id', 'DESC')
      ->execute()->fetchAll();

    foreach ($result as $item) {
      $fid = $item->image? $item->image : 0;

    }
    return $result;

  }

  /**
   * Save cat to db.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public static function saveCat(\stdClass $new_cat) {
    $connection = \Drupal::service('database');
    $file_id = $new_cat->image;
    if ($file_id) {
      (new nnychyporchukController)->fileSavePermanent($file_id);
    }
    $connection->insert('nnychyporchuk')
      ->fields(['name', 'datetime', 'email', 'image'])
      ->values([
        'name' => $new_cat->name,
        'datetime' => \Drupal::time()->getCurrentTime(),
        'email' => $new_cat->email,
        'image' => $file_id[0],
      ])
      ->execute();
  }

  /**
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public static function editCat(\stdClass $new_cat) {
    $connection = \Drupal::service('database');
    $file_id = $new_cat->image;
    if ($file_id) {
      (new nnychyporchukController)->fileSavePermanent($file_id);
    }
    $connection->update('nnychyporchuk')
      ->condition('id', $new_cat->id)
      ->fields([
        'name' => $new_cat->name,
        'email' => $new_cat->email,
        'image' => $file_id[0],
      ])
      ->execute();
  }

  public static function deleteCat(array $id = []) {
    if (empty($id)) {
      return;
    }
    $connection = \Drupal::service('database');
    $query = $connection->select('nnychyporchuk', 'n');
    $query->condition('id', $id);
    $query->fields('n', ['image']);
    $result = $query->execute()->fetchAll();
    foreach ($result as $item) {
      $fid = $item->image;
      if ($fid != "0") {
        $file = File::load($fid);
        $file->delete();
      }
    }
    $cat_deleted = $connection->delete('nnychyporchuk')
      ->condition('id', $id)
      ->execute();
  }

  /**
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  private function fileSavePermanent(int $fid) {
    $file = File::load($fid);
    $file->setPermanent();
    $file->save();
  }

}
