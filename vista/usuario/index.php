<!DOCTYPE html>
<html>
  <head>
    <title>Tienda X</title>

    <!-- Javascript -->
    <script type="text/javascript" src="/vista/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/vista/js/jquery.validate.js"></script>
    <script type="text/javascript" src="/vista/js/util.validator.js"></script>
    <script type="text/javascript" src="/vista/js/form.js"></script>
   
  </head>
  <body>
      <h2> Bienvenid@ <?=$_SESSION['nombre_u']?> Usuario de la Tienda X </h2>
      Ahora como usuario puedes:
      <ul>      
          <li>
              <a href='/Tienda/consultor/catalogo'>
                  Consutar los productos y su disponibilidad
              </a>
          </li>
      <li> <a href='/Tienda/usuario/carrito'> Consultar tu carrito
          de compras </a> </li>
      <!-- <li> <a href='/Tienda/usuario/historial'> Consultar tu historial
           de compras </a> </li> -->
      <li> <a href='/Tienda/usuario/comprar'> Comprar lo que hay en tu carrito  </a></li>
      <li> <a href='/Tienda/usuario/agregar'> Agregar productos a tu carrito  </a></li>
          <li>
              <a href='/Tienda/exit'>
                  Cerrar sesión
              </a>
          </li>
      </ul>

  </body>
</html>
