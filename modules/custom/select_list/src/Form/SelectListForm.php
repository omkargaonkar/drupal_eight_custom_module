<?php
/**
 * @file
 * Contains \Drupal\select_list\Form\select_list_form.
 */
namespace Drupal\select_list\Form;;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SelectListForm extends FormBase {
    /**
     * {@inheritdoc}
     */
    public function getFormId() {
      return 'select_list_form';
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
      $country = array(
    'none' => t('-- None --'),
    'india' => t('India'),
    'bangladesh' => t('Bangladesh'),
    'srilanka' => t('SriLanka'),
    'pakistan' => t('Pakistan'),
  );
    $form['select_list1'] = array(
     '#prefix' => '<div id="select_list1">',
     '#title' => t('Select Country'),
     '#type' => 'select',
     '#description' => 'Select Country.',
     '#options' => $country,
     '#ajax' => array(
       'callback' => 'ajax_callback',
       'wrapper' => 'select_list2-wrapper',
       'event' => 'change',
  ),
     '#suffix' => '</div>'
  );
    $form['select_list2'] = array(
    '#prefix' => '<div id="select_list2-wrapper">',
    '#title' => t('Select State'),
    '#type' => 'select',
    '#description' => t('Select the state.'),
    '#options' => $states,
    '#suffix' => '</div>',
    '#states' => array(
      'disabled' => array(
      ':input[name="select_list1"]' => array('value' => 'none'),
      ),
    ),
  );
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
     }
}
