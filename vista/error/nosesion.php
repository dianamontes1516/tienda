<!DOCTYPE html>
<html>
  <head>
    <title>Tienda X</title>

  </head>
  <body>
    <?php
        $ruta = $_SERVER['DOCUMENT_ROOT'];
        require_once($ruta.'/vista/menu.php');
    ?>
    
    <h2>Error!!! </h2>

    Estimado visitante, para acceder a esta página
    necesita haber ingresado al sistema o tener una
    cuenta con otros permisos.
    <br>
    Si ya tiene con un usuario ingrese a su
    <a href='/Tienda/consultor/login'> cuenta.</a>

    <br>
    
    O cree una cuenta si no la tiene.
    
    <a href='/Tienda/consultor/alta'>
      Alta como Usuario.
    </a>
    <br>
    <a href='/Tienda'>
      Inicio
    </a>
  </body>
</html>
