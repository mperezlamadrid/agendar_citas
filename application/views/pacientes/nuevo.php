<style>
  .container{
    padding: 20px;
  }
</style>

<div class="container">
  <?php echo validation_errors(); ?>

  <?php echo form_open('pacientes/nuevo'); ?>
    <label for="nombre"> Nombre:</label>
    <input type="input" name="nombre">
    <br>

    <label for="apellido"> Apellido:</label>
    <input type="input" name="apellido">
    <br>

    <label for="direccion"> Direccion:</label>
    <input type="input" name="direccion">
    <br>

    <label for="cedula"> Cedula:</label>
    <input type="input" name="cedula">
    <br>

    <input type="submit" name="submit" value="Crear">
  <?php echo form_close(); ?>
</div>
