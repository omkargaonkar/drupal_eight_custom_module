<?php

namespace Drupal\article_mail\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
/**
 * Class ArticleMailForm.
 *
 * @package Drupal\article_mail\Form
 */
class ArticleMailForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'article_mail.settings',
    ];
  }
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'article_mail_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('article_mail.settings');
    $form['subject'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Subject'),
      '#default_value' => $config->get('Subject'),
    );
    $form['body'] = array(
      '#type' => 'text_format',
      '#title' => $this->t('Body'),
      '#default_value' => $config->get('Body'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $this->config('article_mail.settings')
      ->set('subject', $form_state->getValue('subject'))
      ->set('body', $form_state->getValue('body'))
      ->save();

  }
}
