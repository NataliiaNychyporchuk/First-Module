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
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('Hello! You can add here a photo of your cat.'),
    ];
    $build['form'] = \Drupal::formBuilder()->getForm(
      '\Drupal\nnychyporchuk\Form\CatsForm'
    );
    $build['cats'] = [
      '#theme' => 'nnychyporchuk_theme_hook',
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
