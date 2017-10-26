<?php
/**
* Implements hook_entity_insert().
*/
namespace Drupal\article_mail\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Mail\MailManagerInterface;

class ArticleMailForm extends ConfigFormBase {


  public function getFormId() {
    return 'ArticleMailForm';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['intro'] = [
      '#markup' => t('This form is used to send a message to site e-mail when new article is created'),
    ];
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => t('Message'),
      '#required' => TRUE,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Submit'),
    ];
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message(t('Your E-mail template is submitted'));
}


}
