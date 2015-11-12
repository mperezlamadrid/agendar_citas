<div class="container">
  <?php echo form_open("citas/guardar"); ?>
    <div class="form-group">
      <label for="nombre">Fecha</label>
      <?php echo form_input('fecha', $usu->fecha, array('class'=>'form-control', 'placeholder'=>'Fecha de la cita')); ?>
    </div>
    <div class="form-group">
      <label for="apellido">Hora</label>
      <?php echo form_input('hora', $usu->hora, array('class'=>'form-control', 'placeholder'=>'Hora de la cita')); ?>
    </div>
    <div class="form-group">
      <label for="direccion">Doctor</label>
      <select class="form-control" name="doctor_id">
        <option value="0"> Doctores </option>
        <?php foreach($doctores as $campo){ ?>
          <option value="<?php echo $campo['id']; ?>"><?php echo $campo['nombre'].' '.$campo['apellido']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="cedula">Paciente</label>
      <select class="form-control" name="paciente_id">
        <option value="0"> Pacientes </option>
        <?php foreach($pacientes as $campo){ ?>
          <option value="<?php echo $campo['id']; ?>"><?php echo $campo['nombre'].' '.$campo['apellido']; ?></option>
        <?php } ?>
      </select>
    </div>
    <?php echo form_hidden('id', $usu->id); ?>

    <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary" />
    <input type="reset" name="boton_reset" value="Resetear" class="btn btn-default">
    <a class="btn btn-warning pull-right" href="<?=base_url('citas/index')?>">Atras</a>
  <?php echo form_close(); ?>
</div>
