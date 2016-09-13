<?php

/**
 * @file
 * Contains \Drupal\d8training_form\Form\TutorialTwoForm.
 */

namespace Drupal\d8training_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

class TutorialTwoForm extends FormBase
{
  
  private $tutorialOneForm;

  public function getFormId()
  {
    return 'd8training_forms_tutorialtwo_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $this->tutorialOneForm = \Drupal::formBuilder()->getForm('Drupal\d8training_form\Form\TutorialOneForm');
    $this->tutorialOneForm['#attributes']['class'][0] = 'd8training_forms_tutorialtwo_form';
    $this->extendForm($this->tutorialOneForm);

    return $this->tutorialOneForm;
  }

  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    //if (!UrlHelper::isValid($form_state->getValue('video'), TRUE)) {
      //$form_state->setErrorByName('video', $this->t("The video url '%url' is invalid.", array('%url' => $form_state->getValue('video'))));
    //}
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
  }

  private function extendForm(array &$form)
  {
    $form['tutorial'] = array(
      '#type' => 'textfield',
      '#title' => t('Tutorial2'),
      '#required' => TRUE,
    );
    
  }

}