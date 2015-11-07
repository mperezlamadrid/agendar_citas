<link rel="stylesheet" type="text/css" href="<?=base_url()?>table_style.css">

<div class="container">
  <div class="info-box">
    <table class="data-table">
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Cedula</th>
        <th>Especialidad</th>
      </tr>
      <?php
        foreach ($doctores as $doctor) {
      ?>
        <tr>
          <td> <?php  echo $doctor['nombre']; ?> </td>
          <td> <?php  echo $doctor['apellido']; ?> </td>
          <td> <?php  echo $doctor['direccion']; ?> </td>
          <td> <?php  echo $doctor['cedula']; ?> </td>
          <td> <?php  echo $doctor['especialidad']; ?> </td>
        </tr>
      <?php
        }
      ?>
    </table>
  </div>
  <p> <a href="/agendar_citas/doctores/index"> Atras </a> </p>
  <p> <a href="/agendar_citas"> Inicio </a> </p>
</div>
