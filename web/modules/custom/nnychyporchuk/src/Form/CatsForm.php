<?php

namespace Drupal\nnychyporchuk\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Url;
use Drupal\nnychyporchuk\Controller\nnychyporchukController as nnychyporchukController;

/**
 * Configure example settings for this site.
 */
class CatsForm extends FormBase {

  protected $id;

  protected $cat;
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'nnychyporchuk_cats';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, string $id = NULL) {
    $this->id = $id;
    if (!is_null($id)) {
      $this->cat = nnychyporchukController::getCats($this->id)[0];
    }
    $form['catName'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your cat’s name:'),
      '#required' => TRUE,
      '#description' => $this->t('Min length of the name - 2 symbols, max - 32'),
      '#default_value' => $this->cat ? $this->cat->name : "",
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Your email:'),
      '#description' => $this->t('Only latin characters, underscore or hyphen may be used'),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::validateEmailAjax',
        'event' => 'change',
        'progress' => [
          'type' => 'throbber',
          'message' => NULL,
        ],
      ],
      '#default_value' => $this->cat ? $this->cat->email : "",
      '#suffix' => '<span class="email-validation-message"></span>'
    ];
    $form['imgCat'] = [
      '#type' => 'managed_file',
      '#title' => t('Upload your cat’s picture:'),
      '#upload_validators' => [
        'file_validate_extensions' => ['jpeg jpg png'],
        'file_validate_size' => ['2097152'],
      ],
      '#required' => TRUE,
      //'#upload_location' => 'public://',
      '#default_value' => $this->cat ? [$this->cat->picture_id] : "",
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add cat'),
      '#ajax' => [
        'callback' => '::AjaxFunc',
        'progress' => [
          'type' => 'throbber',
          'message' => NULL,
        ],
      ]
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */

  public function validateForm(array &$form, FormStateInterface $form_state) {
    $form_state -> clearErrors();
    if (mb_strlen($form_state->getValue('catName')) < 2 || mb_strlen($form_state->getValue('catName')) > 32) {
      $form_state->setErrorByName('catName', $this->t('This name is not valid.'));
    }
    // Validate email.
    if (strpbrk($form_state->getValue('email'), '1234567890!#$%^&*()+=`~?/<>\'±§[]{}|"')) {
      $form_state->setErrorByName('email', $this->t('This email is not valid.'));
    }
  }

  /**
   * {@inheritdoc}
   * @throws \Exception
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $new_cat = new \stdClass();
    $new_cat->name = $form_state->getValue('catName');
    $new_cat->email = $form_state->getValue('email');
    $new_cat->image = $form_state->getValue('imgCat')[0];
    if (!is_null($this->id)) {
      $new_cat->id = $this->id;
      nnychyporchukController::editCat($new_cat);
    }
    else {
      nnychyporchukController::saveCat($new_cat);
    }
    $form_state->setRedirectUrl(Url::fromRoute('nnychyporchuk.cats'));
  }

  public function validateEmailAjax(array $form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (strpbrk($form_state->getValue('email'), '1234567890!#$%^&*()+=`~?/<>\'±§[]{}|"')) {
      $response->addCommand(
        new HtmlCommand(
          '.email-validation-message', 'This email is not valid.'));
    }
    else {
      $response->addCommand(
        new HtmlCommand(
          '.email-validation-message', ''));
    }
    return $response;
  }

  public function AjaxFunc(array $form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if ($form_state->hasAnyErrors()) {
      foreach ($form_state->getErrors() as $errors_array) {
        $response->addCommand(
          new MessageCommand(
            $errors_array, NULL, ['type'=>'error']));
      }
    }
    else {
      $response->addCommand(
        new HtmlCommand(
          '.nnychyporchuk-cats',
          $this->t('Thank you for submission!')));
    }
    \Drupal::messenger()->deleteAll();
    return $response;
  }

}
