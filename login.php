<?php 
  session_start();

    if (isset($_POST['entrar'])) {
      require 'conexion.php';

     
      $email = $_POST['email'];
      $contrasena = $_POST['contrasena'];

      $query=$cnnPDO->prepare('SELECT * from usuarios WHERE email=:email and contrasena=:contrasena ');

      $query->bindParam(':email',$email);
      $query->bindParam(':contrasena',$contrasena);

      $query->execute();

      $count=$query->rowCount();
      $campo = $query->fetch();

      if ($count) {
        $_SESSION['nombre'] = $campo['nombre'];
        $_SESSION['email'] = $campo['email'];
        $_SESSION['contrasena'] = $campo['contrasena'];

         header("location:principal.php");
        


      }
  }
    ob_end_flush();
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Registro - Tienda de Ropa</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }
  .container {
    max-width: 600px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  h2 {
    text-align: center;
    color: #333;
  }
  .form-group {
    margin-bottom: 20px;
  }
  label {
    display: block;
    margin-bottom: 8px;
    color: #666;
  }
  input[type="text"],
  input[type="email"],
  input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
  }
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>

<div class="container">
  <h2>Iniciar Sesion</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="contrasena">
    </div>
    <button type="submit" name="entrar" class="btn btn-success">Entrar</button>
    no tienes cuenta?
    <a href="registro.php" class="">Registrate</a>
  </form>
</div>

</body>
</html>
