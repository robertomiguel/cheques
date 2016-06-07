<?php

/**
 * cheque filter form base class.
 *
 * @package    cheques
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasechequeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nro_cheque'       => new sfWidgetFormFilterInput(),
      'nro_cuenta'       => new sfWidgetFormFilterInput(),
      'receptor'         => new sfWidgetFormFilterInput(),
      'importe'          => new sfWidgetFormFilterInput(),
      'fecha_pago'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_conciliado' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'estado'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nro_cheque'       => new sfValidatorPass(array('required' => false)),
      'nro_cuenta'       => new sfValidatorPass(array('required' => false)),
      'receptor'         => new sfValidatorPass(array('required' => false)),
      'importe'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fecha_pago'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_conciliado' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'estado'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cheque_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'cheque';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nro_cheque'       => 'Text',
      'nro_cuenta'       => 'Text',
      'receptor'         => 'Text',
      'importe'          => 'Number',
      'fecha_pago'       => 'Date',
      'fecha_conciliado' => 'Date',
      'estado'           => 'Text',
    );
  }
}
