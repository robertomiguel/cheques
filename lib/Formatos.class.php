<?php
class Formatos
{
  static public function dni($dni)
  {
    return number_format($dni,0,',','.');
  }

  static public function moneda($moneda)
  {
    return '$ '.number_format($moneda,2,',','.');
  }

  static public function fecha($fecha)
  {
    if ($fecha==null) {return null;}
    //  2009-02-01 a 01-02-2009
    $dia = substr($fecha,8,2);
    $mes = substr($fecha,5,2);
    $anio = substr($fecha,0,4);
    $fecha = $dia."-".$mes."-".$anio;
    return $fecha;
  }

  static public function periodo($fecha)
  {
    if ($fecha==null) {return null;}
    //  2009-02-01 a 01-02-2009
    $meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
               'Agosto','Setiembre','Octubre','Noviembre','Diciembre');
    $mes = substr($fecha,5,2)*1;
    $anio = substr($fecha,0,4);
    $fecha = $meses[$mes].' '.$anio;
    return $fecha;
  }

  static public function siono($activo)
  {
    if ($activo==1) {return "SI";} else {return "NO";}
  }

  static public function capital($texto)
  {
    return ucwords(strtolower($texto));
  }

  static public function fechapago($fecha)
  {
    $meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
               'Agosto','Setiembre','Octubre','Noviembre','Diciembre');
    $dia = substr($fecha,8,2);
    $mes = substr($fecha,5,2)*1;
    $anio = substr($fecha,0,4);

    return "$dia    $meses[$mes]           $anio";
  }

  static public function fechaemision($fecha)
  {
    $meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
                   'Agosto','Setiembre','Octubre','Noviembre','Diciembre');
    $dia = substr($fecha,8,2);
    $mes = substr($fecha,5,2)*1;
    $anio = substr($fecha,0,4);

    return "$dia    $meses[$mes]           $anio";
  }
}
