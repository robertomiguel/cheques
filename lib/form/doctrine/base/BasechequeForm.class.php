<?php

/**
 * cheque form base class.
 *
 * @method cheque getObject() Returns the current form's model object
 *
 * @package    cheques
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasechequeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nro_cheque'       => new sfWidgetFormInputText(),
      'nro_cuenta'       => new sfWidgetFormInputText(),
      'receptor'         => new sfWidgetFormInputText(),
      'importe'          => new sfWidgetFormInputText(),
      'fecha_pago'       => new sfWidgetFormDate(),
      'fecha_conciliado' => new sfWidgetFormDate(),
      'estado'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nro_cheque'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'nro_cuenta'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'receptor'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'importe'          => new sfValidatorNumber(array('required' => false)),
      'fecha_pago'       => new sfValidatorDate(array('required' => false)),
      'fecha_conciliado' => new sfValidatorDate(array('required' => false)),
      'estado'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cheque[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'cheque';
  }

}