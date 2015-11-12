<div class="container">
  <?php echo form_open("doctores/guardar"); ?>
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <?php echo form_input('nombre', $usu->nombre, array('class'=>'form-control', 'placeholder'=>'Nombre del medico')); ?>
    </div>
    <div class="form-group">
      <label for="apellido">Apellido</label>
      <td> <?php echo form_input('apellido', $usu->apellido, array('class'=>'form-control', 'placeholder'=>'Apellido del medico')); ?> </td>
    </div>
    <div class="form-group">
      <label for="direccion">Direccion</label>
      <td> <?php echo form_input('direccion', $usu->direccion, array('class'=>'form-control', 'placeholder'=>'Direccion del medico')); ?> </td>
    </div>
    <div class="form-group">
      <label for="cedula">Cedula</label>
      <td> <?php echo form_input('cedula', $usu->cedula, array('class'=>'form-control', 'placeholder'=>'Cedula del medico')); ?> </td>
    </div>
    <div class="form-group">
      <label for="cedula">Especialidad</label>
      <td> <?php echo form_input('especialidad', $usu->especialidad, array('class'=>'form-control', 'placeholder'=>'Especialidad del medico')); ?> </td>
    </div>
    <?php echo form_hidden('id', $usu->id); ?>

    <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary" />
    <input type="reset" name="boton_reset" value="Resetear" class="btn btn-default">
    <a class="btn btn-warning pull-right" href="<?=base_url('doctores/index')?>">Atras</a>
  <?php echo form_close(); ?>
</div>
