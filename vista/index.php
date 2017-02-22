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
      <h2> Bienvenido al sitio de la Tienda X </h2>
      A través de este sitio puedes:
      <ul>
          <li>
              <a href='/Tienda/consultor/catalogo'>
                  Consutar los productos y su disponibilidad
              </a>
          </li>
          <li>
              <a href='/Tienda/consultor/alta'>
                  Darte de alta como usuario
              </a>
          </li>
      </ul>
      Una vez siendo usuario podrás:
      <ul>     
          <li>
              <a href='/Tienda/usuario/carrito'>
                  Consultar tu carrito de compras
              </a>
          </li>
          <!-- <li>
               <a href='/Tienda/usuario/historial'>
               Consultar tu historial de compras
               </a>
               </li> -->
          <li>
              <a href='/Tienda/usuario/comprar'>
                  Comprar lo que hay en tu carrito
              </a>
          </li>
          <li>
              <a href='/Tienda/usuario/agrega'>
                  Agregar productos a tu carrito
              </a>
          </li>
      </ul>

      
      ¿Ya tienes cuenta de usuario o administraror?
      <br>
      <a href='/Tienda/login'> Ingresa al sistema </a>

  </body>
</html>
