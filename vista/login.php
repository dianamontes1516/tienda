<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>

  </head>
  <body>
    <!-- El submit manejado en form.js -->
    <form id="login" action="/Tienda/controlador/consultor/login"
            method="post">      
      <div >
        <label for="usern" >username:</label>
        <input type="text" name="usern" id="usern" > 
      </div>
      
      <div>
        <label for="pass" >password:</label>
        <input type="password" id="pass" name="pass" >
      </div>

      <div>
          <button id="Cancel">  <a href='/Tienda'>Cancelar </a>   </button>
          <button id="Acceder">  Acceder     </button>
      </div>
    </form>
  </body>
</html>
