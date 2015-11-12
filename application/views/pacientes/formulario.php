<?php echo form_open("pacientes/guardar"); ?>

<table>
  <tr>
      <td>Nombre</td>
      <td> <?php echo form_input('nombre', $usu->nombre); ?> </td>
  </tr>
  <tr>
      <td>Apellido</td>
      <td> <?php echo form_input('apellido', $usu->apellido); ?> </td>
  </tr>
  <tr>
      <td>Direccion</td>
      <td> <?php echo form_input('direccion', $usu->direccion); ?> </td>
  </tr>
  <tr>
      <td>Cedula</td>
      <td> <?php echo form_input('cedula', $usu->cedula); ?> </td>
  </tr>
</table>

<?php echo form_hidden('id', $usu->id); ?>

<input type="submit" name="Enviar" value="Enviar" class="btn btn-primary" />
<input type="reset" name="boton_reset" value="Resetear" class="btn btn-warning" >

<?php echo form_close(); ?>
