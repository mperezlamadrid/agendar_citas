<?php
  if(isset($resultado)){
    if($resultado){
      echo "<p>Guardado correctamente</p>";
    }else{
      echo "<p>Error al guardar, ya existe una cita al mismo tiempo con el mismo doctor</p>";
    }
  }
?>

<div class="container">
  <a class="btn btn-success" href="<?=base_url('citas/crear')?>" role="button">Nuevo</a>

  <table class="table table-hover table-bordered">
    <tr class="info">
    	<td>Fecha</td>
    	<td>Hora</td>
    	<td>Paciente</td>
      <td>Doctor</td>
    	<td>Acciones</td>
    </tr>
    <?php foreach($citas as $fila){ ?>
      <tr>
          <td><?php echo $fila["fecha"]; ?></td>
          <td><?php echo $fila["hora"]; ?></td>
          <td><?php  $CI =& get_instance(); echo $CI->get_data_paciente($fila['paciente_id']); ?></td>
          <td><?php  $CI =& get_instance(); echo $CI->get_data_doctor($fila['doctor_id']); ?></td>
          <td>
            <a href="<?php echo site_url('citas/editar/'.$fila['id']); ?>" class="btn btn-success btn-xs">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a>

            <a href="<?php echo site_url('citas/eliminar/'.$fila['id']); ?>" class="btn btn-danger btn-xs">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </a>
          </td>
      </tr>
    <?php } ?>
  </table>
</div>
