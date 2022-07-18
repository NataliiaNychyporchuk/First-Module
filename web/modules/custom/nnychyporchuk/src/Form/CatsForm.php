<?php

namespace Drupal\nnychyporchuk\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Configure example settings for this site.
 */
class CatsForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'nnychyporchuk_cats';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['catName'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your cat’s name:'),
      '#required' => TRUE,
      '#description' => $this->t('Min length of the name - 2 symbols, max - 32'),
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add cat'),
      '#ajax' => [
        'callback' => '::AjaxFunc',
        'progress' => array(
          'type' => 'throbber',
          'message' => NULL,
        ),
      ]
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */

  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('catName')) < 2 || strlen($form_state->getValue('catName')) > 32) {
      $form_state->setErrorByName('catName', $this->t('This name is not valid.'));
    }
  }

  /**
   * {@inheritdoc}
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus($this->t('This message has been sent'));
  }

  public function AjaxFunc(array $form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $response -> addCommand (
      new HtmlCommand(
        '.nnychyporchuk-cats',
      $this->t('Thank you for your submission')),
    );
    return $response;
  }
}
