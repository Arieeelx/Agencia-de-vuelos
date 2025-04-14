
<!DOCTYPE html>
<html lang="es">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" type="image/png" href="imagenes/avioncito1.png">
      <link rel="stylesheet" href="styles.css">
      <title>Ingresar ¡Vuela con nosotros!</title> 
  </head>
 
  <body>
    <form name="Iniciar sesion" method="post"> 

        <div class="container">
          <fieldset id="caja">

            <legend id="titulo-caja"> ✈️ </legend>

              <div id="dato-nombre">
                <label for="email">Email </label>
                <input type="email" class="form-email" name="email" placeholder="Ingrese email">
              </div>

              <div id="dato-contraseña">
                <label for="contraseña">Contraseña </label>
                <input type="password" maxlength="8" class="form-password" name="contraseña" placeholder="Contraseña">
              </div>

              <div id="botones">
                <input type="submit" name="ingreso">
                <button><a href="registro.php">Registrarme</button></a>
              </div>
              
          </fieldset>
        </div>
      </form>
      <?php 
        include("validar_acceso.php");
      ?>
  </body>
</html>

