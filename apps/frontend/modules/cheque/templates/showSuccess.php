<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $cheque->getId() ?></td>
    </tr>
    <tr>
      <th>Nro cheque:</th>
      <td><?php echo $cheque->getNroCheque() ?></td>
    </tr>
    <tr>
      <th>Nro cuenta:</th>
      <td><?php echo $cheque->getNroCuenta() ?></td>
    </tr>
    <tr>
      <th>Receptor:</th>
      <td><?php echo $cheque->getReceptor() ?></td>
    </tr>
    <tr>
      <th>Importe:</th>
      <td><?php echo $cheque->getImporte() ?></td>
    </tr>
    <tr>
      <th>Fecha pago:</th>
      <td><?php echo $cheque->getFechaPago() ?></td>
    </tr>
    <tr>
      <th>Fecha conciliado:</th>
      <td><?php echo $cheque->getFechaConciliado() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php echo $cheque->getEstado() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('cheque/edit?id='.$cheque->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('cheque/index') ?>">List</a>
