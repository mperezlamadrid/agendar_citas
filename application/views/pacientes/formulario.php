<div class="container">
  <?php echo form_open("pacientes/guardar"); ?>
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <?php echo form_input('nombre', $usu->nombre, array('class'=>'form-control', 'placeholder'=>'Nombre del paciente')); ?>
    </div>
    <div class="form-group">
      <label for="apellido">Apellido</label>
      <td> <?php echo form_input('apellido', $usu->apellido, array('class'=>'form-control', 'placeholder'=>'Apellido del paciente')); ?> </td>
    </div>
    <div class="form-group">
      <label for="direccion">Direccion</label>
      <td> <?php echo form_input('direccion', $usu->direccion, array('class'=>'form-control', 'placeholder'=>'Direccion del paciente')); ?> </td>
    </div>
    <div class="form-group">
      <label for="cedula">Cedula</label>
      <td> <?php echo form_input('cedula', $usu->cedula, array('class'=>'form-control', 'placeholder'=>'Cedula del paciente')); ?> </td>
    </div>
    <?php echo form_hidden('id', $usu->id); ?>

    <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary" />
    <input type="reset" name="boton_reset" value="Resetear" class="btn btn-default">
    <a class="btn btn-warning pull-right" href="<?=base_url('pacientes/index')?>">Atras</a>
  <?php echo form_close(); ?>
</div>
