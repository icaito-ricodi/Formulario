<?php
  
  include ("conexion.php");
  // Verifica si el formulario ha sido enviado
  if (isset($_POST['send'])) {

    if (
      strlen($_POST['name']) >= 1 &&
      strlen($_POST['password']) >= 1 &&
      strlen($_POST['email']) >= 1 &&
      strlen($_POST['phone']) >= 1
    ) {
      // Recoge los datos del formulario
      $name = trim($_POST['name']);
      $password = trim($_POST['password']);
      $email = trim($_POST['email']);
      $phone = trim($_POST['phone']);
      $fecha = date("d/m/y");

      // Prepara la consulta SQL
      $consulta = "INSERT INTO datos(nombre, contraseña, email, telefono, fecha) VALUES ('$name', '$password', '$email', '$phone', '$fecha')";

      $resultado = mysqli_query($conex, $consulta);

      // Ejecuta la consulta
      if ($resultado) {
        ?>
          <h3 class="success">Tu registro se ha completado</h3>
          <?php
      } else {
        ?>
          <h3 class="error">Ocurrio un error</h3>
          <?php
      }
    }else {
      ?>
      <h3 class="error">Por favor completa todos los campos</h3>
      <?php
    }
  }

  ?>