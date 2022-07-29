<?php

namespace Drupal\nnychyporchuk\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Url;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\file\Entity\File;
use Drupal\nnychyporchuk\Controller\nnychyporchukController as nnychyporchukController;


/**
 * Class DeleteForm
 */
class DeleteForm extends ConfirmFormBase {

  /**
   * ID of the item to delete.
   *
   */
  protected $id;

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, string $id = NULL) {
    $this->id = $id;
    $form['actions']['submit']['#ajax'] = [
      'callback' => '::ajaxFunc',
      'progress' => [
        'type' => 'throbber',
        'message' => NULL,
      ],
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    nnychyporchukController::deleteCat([$this->id]);
    $form_state->setRedirectUrl(Url::fromRoute('nnychyporchuk.cats'));
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() : string {
    return "confirm_delete_form";
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('nnychyporchuk.cats');
  }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    // TODO: Implement getQuestion() method.
    return $this->t('Do you want to delete id%id cat?', ['%id' => $this->id]);
  }

  /**
   * {@inheritdoc}
   */
  public function ajaxFunc(array $form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (!$form_state->hasAnyErrors()) {
      $response->addCommand(
        new HtmlCommand(
          '.confirm-delete-form',
          $this->t("Cat has been deleted!"),
        ),
      );
    }
    return $response;
  }

}
