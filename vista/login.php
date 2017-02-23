<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>

  </head>
  <body>
    <?php
        $ruta = $_SERVER['DOCUMENT_ROOT'];
        require_once($ruta.'/vista/menu.php');
    ?>
    <div><h3>Login</h3></div>
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
    <style>
      *{
        box-sizing: border-box;
      }
      form{
        border: 3px solid rgba(213,134,112,1);
        display: inline-block;
        padding: 20px;
        border-radius: 5px;
      }
      form input {
        width: 100%;
        height: 30px;
        max-width: 350px;
        margin-bottom: 20px;
        margin-top: 3px;
        outline: none;
      }
      form button{
       height: 30px;
       cursor: pointer;
      }
      form button a{ text-decoration: none; }
    </style>
</html>
