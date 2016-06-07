<?php

/**
 * cheque actions.
 *
 * @package    cheques
 * @subpackage cheque
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class chequeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->cheques = Doctrine_Core::getTable('cheque')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->cheque = Doctrine_Core::getTable('cheque')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->cheque);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new chequeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new chequeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cheque = Doctrine_Core::getTable('cheque')->find(array($request->getParameter('id'))), sprintf('Object cheque does not exist (%s).', $request->getParameter('id')));
    $this->form = new chequeForm($cheque);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($cheque = Doctrine_Core::getTable('cheque')->find(array($request->getParameter('id'))), sprintf('Object cheque does not exist (%s).', $request->getParameter('id')));
    $this->form = new chequeForm($cheque);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cheque = Doctrine_Core::getTable('cheque')->find(array($request->getParameter('id'))), sprintf('Object cheque does not exist (%s).', $request->getParameter('id')));
    $cheque->delete();

    $this->redirect('cheque/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cheque = $form->save();

      $this->redirect('cheque/edit?id='.$cheque->getId());
    }
  }

  public function executeImprimir(sfWebRequest $request)
  {
     $id = $request->getParameter('id');

     $pdf = new TCPDF();
     $pdf->setPrintHeader(false);
     $pdf->setPrintFooter(false);
     $pdf->SetFont('times','',10);
     $pdf->SetMargins(0, 0, 0);
    //include('../config/pdfcerti.config.php');

    $cheque = Doctrine_Core::getTable('cheque')->find(array($id));

    $nro_cheque       = $cheque->getNroCheque();
    $nro_cuenta       = $cheque->getNroCuenta();
    $receptor         = $cheque->getReceptor();
    $importe          = $cheque->getImporte();
    $fecha_pago       = $cheque->getFechaPago();
    $fecha_conciliado = $cheque->getFechaConciliado();
    $estado           = $cheque->getEstado();

    $pdf->AddPage("P","A4",true,false);
    $pdf->SetXY(50, 25);  $pdf->Cell(0,0, "Nro Cheque: $nro_cheque", '', 0, '', false);
    $pdf->SetXY(50, 35);  $pdf->Cell(0,0, "Nro Cuenta: $nro_cuenta", '', 0, '', false);
    $pdf->SetXY(50, 45);  $pdf->Cell(0,0, "Receptor: $receptor", '', 0, '', false);
    $pdf->SetXY(50, 55);  $pdf->Cell(0,0, "Importe: $importe", '', 0, '', false);
    $pdf->SetXY(50, 65);  $pdf->Cell(0,0, "Fecha Pago: $fecha_pago", '', 0, '', false);
    $pdf->SetXY(50, 75);  $pdf->Cell(0,0, "Fecha Conciliado: $fecha_conciliado", '', 0, '', false);
    $pdf->SetXY(50, 85);  $pdf->Cell(0,0, "Estado: $estado", '', 0, '', false);

    $pdf->Output("cheque_$id.pdf", 'I'); //I
    return;
    //    return sfView::NONE;
  }


}
