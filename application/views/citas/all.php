<link rel="stylesheet" type="text/css" href="<?=base_url()?>table_style.css">

<div class="container">
  <div class="info-box">
    <table class="data-table">
      <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Paciente</th>
        <th>Doctor</th>
      </tr>
      <?php
        foreach ($citas as $cita) {
      ?>
        <tr>
          <td> <?php  echo $cita['fecha']; ?> </td>
          <td> <?php  echo $cita['hora']; ?> </td>
          <td> <?php  $CI =& get_instance(); echo $CI->get_data_paciente($cita['paciente_id']); ?> </td>
          <td> <?php  $CI =& get_instance(); echo $CI->get_data_doctor($cita['doctor_id']); ?> </td>
        </tr>
      <?php
        }
      ?>
    </table>
  </div>
  <p> <a href="/agendar_citas/doctores/index"> Atras </a> </p>
  <p> <a href="/agendar_citas"> Inicio </a> </p>
</div>
