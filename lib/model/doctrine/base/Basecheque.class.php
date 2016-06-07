<?php

/**
 * Basecheque
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nro_cheque
 * @property string $nro_cuenta
 * @property string $receptor
 * @property decimal $importe
 * @property date $fecha_pago
 * @property date $fecha_conciliado
 * @property string $estado
 * 
 * @method string  getNroCheque()        Returns the current record's "nro_cheque" value
 * @method string  getNroCuenta()        Returns the current record's "nro_cuenta" value
 * @method string  getReceptor()         Returns the current record's "receptor" value
 * @method decimal getImporte()          Returns the current record's "importe" value
 * @method date    getFechaPago()        Returns the current record's "fecha_pago" value
 * @method date    getFechaConciliado()  Returns the current record's "fecha_conciliado" value
 * @method string  getEstado()           Returns the current record's "estado" value
 * @method cheque  setNroCheque()        Sets the current record's "nro_cheque" value
 * @method cheque  setNroCuenta()        Sets the current record's "nro_cuenta" value
 * @method cheque  setReceptor()         Sets the current record's "receptor" value
 * @method cheque  setImporte()          Sets the current record's "importe" value
 * @method cheque  setFechaPago()        Sets the current record's "fecha_pago" value
 * @method cheque  setFechaConciliado()  Sets the current record's "fecha_conciliado" value
 * @method cheque  setEstado()           Sets the current record's "estado" value
 * 
 * @package    cheques
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basecheque extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cheque');
        $this->hasColumn('nro_cheque', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('nro_cuenta', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('receptor', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('importe', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'length' => 10,
             ));
        $this->hasColumn('fecha_pago', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('fecha_conciliado', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('estado', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}