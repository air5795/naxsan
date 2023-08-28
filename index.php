<?php

$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
  header('location: sistema/');
} else {




  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
      $alert = "Ingrese su Usuario y Clave ";
    } else {

      require_once "conexion.php";

      $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
      $pass = md5(mysqli_real_escape_string($conexion, $_POST['clave']));

      $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$user' AND clave = '$pass' ");
      mysqli_close($conexion);
      $result = mysqli_num_rows($query);

      if ($result > 0) {
        $data = mysqli_fetch_array($query);



        $_SESSION['active'] = true;
        $_SESSION['iduser'] = $data['idusuario'];
        $_SESSION['nombre'] = $data['nombre'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['user'] = $data['usuario'];
        $_SESSION['rol'] = $data['rol'];

        header('location: sistema/');
      } else {
        $alert = "El Usuario o Clave son Incorrectos";
        session_destroy();
      }
    }
  }
}
?>








<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN SIS-NAXSAN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="shortcut icon" href="img/icono2.png">
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="" style="background-color: lightgrey;color: black;">

  <section class="container-fluid">
    <div class="row g-0">
      <div class="col-lg-8 d-none d-lg-block">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>

          </div>
          <div class="carousel-inner">

            <div class="carousel-item img-1 min-vh-100 active ">

              <div class="carousel-caption d-none d-md-block">
                <h5>PONCELET</h5>
                <p>airsoft</p>
              </div>
            </div>

            <div class="carousel-item img-2 min-vh-100">

              <div class="carousel-caption d-none d-md-block">
                <h5>Poncelet</h5>
                <p>Airsoft</p>
              </div>
            </div>

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-lg-4  ">
        <div class="px-lg-6 pt-lg-4 pb-lg-3 p-4 w-100 mb-auto">

          <center><img src="img/ICONO2.PNG" class=""></center>
        </div>
        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">



          <!-- Formulario de envio de datos login -->

          <form action="" method="post">

            <div class="mb-4">
              <label for="disabledTextInput" class="form-label font-weight-bold"><i class="bi bi-person"></i> Usuario</label>
              <input type="text" name="usuario" id="disabledTextInput" class="form-control border-0" placeholder="Colocar Usuario" style="color: #ff8a8a !important;">
            </div>
            <div class="mb-4">
              <label for="disabledTextInput" class="form-label font-weight-bold"><i class="bi bi-lock"></i> Contraseña</label>
              <input type="password" name="clave" id="disabledTextInput" class="form-control  border-0" placeholder="Colocar Contraseña" style="color: #ff8a8a !important;">
            </div>

            <a href="#" class="form-text text-muted text-decoration-none">Has olvidado tu contraseña ?</a>
            <div class="alert form-text text-center"><?php echo isset($alert) ? $alert : ''; ?></div>
            <button type="submit" class="btn btn-primary w-100 border-0">Iniciar Sesión <i class="bi bi-chevron-right"></i></button>
            </fieldset>
          </form>




        </div>

        <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
          <p class="d-inline-block mb-0 ">No tienes una cuenta? </p> <a href="#" class=" text-decoration-none">Registrate aqui </a>
        </div>
      </div>

    </div>

    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>