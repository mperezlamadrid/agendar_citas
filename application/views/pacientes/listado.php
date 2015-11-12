<?php
  if(isset($resultado)){
    if($resultado){
      echo "<p>Guardado correctamente</p>";
    }else{
      echo "<p>Error al guardar, ya existe el paciente con la misma cedula</p>";
    }
  }
?>

<a class="btn btn-success" href="<?=base_url('pacientes/crear')?>" role="button">Nuevo</a>

<table class="table table-hover">
  <tr>
  	<td>Nombre</td>
  	<td>Usuario</td>
  	<td>Direccion</td>
    <td>Cedula</td>
  	<td>Acciones</td>
  </tr>
  <?php foreach($pacientes as $fila){ ?>
    <tr>
        <td><?php echo $fila["nombre"]; ?></td>
        <td><?php echo $fila["apellido"]; ?></td>
        <td><?php echo $fila["direccion"]; ?></td>
        <td><?php echo $fila["cedula"]; ?></td>
        <td><?php echo anchor("pacientes/editar/".$fila["id"], 'Editar', 'title="Editar Paciente"'); ?></td>
    </tr>
  <?php } ?>
</table>
