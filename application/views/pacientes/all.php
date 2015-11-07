<link rel="stylesheet" type="text/css" href="<?=base_url()?>table_style.css">

<div class="container">
  <div class="info-box">
    <table class="data-table">
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Cedula</th>
      </tr>
      <?php
        foreach ($pacientes as $paciente) {
      ?>
        <tr>
          <td> <?php  echo $paciente['nombre']; ?> </td>
          <td> <?php  echo $paciente['apellido']; ?> </td>
          <td> <?php  echo $paciente['direccion']; ?> </td>
          <td> <?php  echo $paciente['cedula']; ?> </td>
        </tr>
      <?php
        }
      ?>
    </table>
  </div>
  <p> <a href="/agendar_citas/pacientes/index"> Atras </a> </p>
  <p> <a href="/agendar_citas"> Inicio </a> </p>
</div>
