<?php

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\nnychyporchuk\Controller\nnychyporchukController as nnychyporchukController;

/**
 * Provides nnychyporchuk admin page.
 */
class CatsAdminForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'nnychyporchuk_cats_admin';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $cats_rows = [];
    $cats = nnychyporchukController::getCats();
    $renderer = \Drupal::service('renderer');
    foreach ($cats as $cat) {
      $image = [
        '#theme' => 'image',
        '#uri' => $cat->picture_src,
        '#alt' => $this->t("A cat."),
        '#height' => 50,
        '#width' => 50,
      ];
      $buttons = [
        '#theme' => 'nnychyporchuk_buttons_cat',
        '#id' => $cat->id,
      ];
      $cats_rows[$cat->id] = [
        $cat->name,
        $cat->email,
        $renderer->render($image),
        $renderer->render($buttons),
      ];
    }
    $form['cats'] = $cats_rows ? [
      '#type' => 'tableselect',
      '#caption' => $this->t('Cats List'),
      '#header' => [
        $this->t('Cat Name'),
        $this->t('Owner email'),
        $this->t('Cat Picture'),
        $this->t('Actions'),
      ],
      '#options' => $cats_rows,
    ] : [
      '#markup' => "<h2>We haven't found any Cats</h2>",
    ];

    $form['actions'] = [
      '#type' => 'actions',
      '#states' => [
        'visible' => [
          'form' => ['filled' => 'true'],
        ],
      ],
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Delete this cats'),
    ];
    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = array_filter($form_state->getValues()['cats']);
    nnychyporchukController::deleteCat(array_keys($values));
    $form_state->setRedirect('nnychyporchuk.cats_list');
  }

}
