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

    $importe          = $cheque->getImporte();
    $fecha_emision    = Formatos::fechaemision(date('Y-m-d'));
    $fecha_pago       = Formatos::fechapago($cheque->getFechaPago());
    $receptor         = $cheque->getReceptor();
    $importe_letras   = NumLet::num2letras($importe);

    // Corte en dos con separado en espacio
    $importe_letras_1 = substr($importe_letras,0,35);
    $ultimo_espacio   = strripos($importe_letras_1,' ');
    $importe_letras_1 = substr($importe_letras_1,0, $ultimo_espacio);
    $importe_letras_2 = substr($importe_letras,$ultimo_espacio);

    $pdf->AddPage("P","CHEQUE",true,false);

    $pdf->SetXY(145, 8);  $pdf->Cell(0,0, Formatos::moneda($importe), '', 0, '', false);
    $pdf->SetXY(63, 16);  $pdf->Cell(0,0, $fecha_emision, '', 0, '', false);
    $pdf->SetXY(55, 23);  $pdf->Cell(0,0, $fecha_pago, '', 0, '', false);
    $pdf->SetXY(64, 29);  $pdf->Cell(0,0, $receptor, '', 0, '', false);
    $pdf->SetXY(80, 36);  $pdf->Cell(0,0, $importe_letras_1, '', 0, '', false);
    $pdf->SetXY(50, 41);  $pdf->Cell(0,0, $importe_letras_2, '', 0, '', false);

    $pdf->Output("cheque_$id.pdf", 'I'); //I
    return;
    //    return sfView::NONE;
  }

}
