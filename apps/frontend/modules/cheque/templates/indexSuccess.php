<h1>Lista de Cheques</h1>

  <a href="<?php echo url_for('cheque/new') ?>">Cargar Cheque</a>
  <br>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nro cheque</th>
      <th>Nro cuenta</th>
      <th>Receptor</th>
      <th>Importe</th>
      <th>Fecha pago</th>
      <th>Fecha conciliado</th>
      <th>Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cheques as $cheque): ?>
    <tr>
      <td><a href="<?php echo url_for('cheque/show?id='.$cheque->getId()) ?>"><?php echo $cheque->getId() ?></a></td>
      <td><?php echo $cheque->getNroCheque() ?></td>
      <td><?php echo $cheque->getNroCuenta() ?></td>
      <td><?php echo Formatos::capital($cheque->getReceptor()) ?></td>
      <td>
          <?php echo Formatos::moneda($cheque->getImporte()) ?> <br>
          <?php echo NumLet::num2letras($cheque->getImporte()) ?>
      </td>
      <td>
          <?php echo Formatos::fecha($cheque->getFechaPago()) ?> <br>
          <?php echo Formatos::fechapago($cheque->getFechaPago()) ?>
      </td>
      <td><?php echo Formatos::fecha($cheque->getFechaConciliado()) ?></td>
      <td><?php echo $cheque->getEstado() ?></td>
      <td><a href="cheque/imprimir?id=<?php echo $cheque->getId() ?>" target="_blank">Imprimir</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

