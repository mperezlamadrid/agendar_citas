<?php
  if(isset($resultado)){
    if($resultado){
      echo "<p>Guardado correctamente</p>";
    }else{
      echo "<p>Error al guardar, ya existe un medico con la misma cedula</p>";
    }
  }
?>

<div class="container">
  <a class="btn btn-success" href="<?=base_url('doctores/crear')?>" role="button">Nuevo</a>

  <table class="table table-hover table-bordered">
    <tr class="info">
    	<td>Nombre</td>
    	<td>Usuario</td>
    	<td>Direccion</td>
      <td>Cedula</td>
      <td>Especialidad</td>
    	<td>Acciones</td>
    </tr>
    <?php foreach($doctores as $fila){ ?>
      <tr>
          <td><?php echo $fila["nombre"]; ?></td>
          <td><?php echo $fila["apellido"]; ?></td>
          <td><?php echo $fila["direccion"]; ?></td>
          <td><?php echo $fila["cedula"]; ?></td>
          <td><?php echo $fila["especialidad"]; ?></td>
          <td>
            <a href="<?php echo site_url('doctores/editar/'.$fila['id']); ?>" class="btn btn-success btn-xs">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a>

            <a href="<?php echo site_url('doctores/eliminar/'.$fila['id']); ?>" class="btn btn-danger btn-xs">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </a>
          </td>
      </tr>
    <?php } ?>
  </table>
</div>
