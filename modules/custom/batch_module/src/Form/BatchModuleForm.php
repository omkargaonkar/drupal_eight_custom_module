<?php

namespace Drupal\batch_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form with examples on how to use cache.
 */
class BatchModuleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'batch_module_form';
  }

  /**
   * {@inheritdoc}
   */
   public function buildForm(array $form, FormStateInterface $form_state) {

    $form['description'] = [
      '#type' => 'markup',
      '#markup' => t('This example offers two different batches. The first does 1000 identical operations, each completed in on run; the second does 20 operations, but each takes more than one run to operate if there are more than 5 nodes.'),
    ];

    $options = [
      '2' => '2',
      '4' => '4',
      '6' => '6',
      '8' => '8',
      'other' => 'other',
    ];
    $options_check = [
      NODE_NOT_PUBLISHED => 'Unpublish',
      NODE_PUBLISHED => 'Publish',
    ];

    $form['batch'] = [
      '#type' => 'select',
      '#title' => 'Choose batch',
      '#options' => $options,
    ];
    $form['other'] = [
      '#type' => 'textfield',
      '#title' => t('Enter your batch'),
      '#states' => [
        'visible' => [
          ':input[name="selectbox"]' => ['value' => 'other'],
        ],
      ],
    ];
    $form['selectbox_1'] = [
      '#type' => 'select',
      '#title' => t('Publish or Unpublish'),
      '#options' => $options_check,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => 'Go',
    ];

    return $form;

  }
}
