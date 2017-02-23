<!DOCTYPE html>
<html>
  <head>
    <title>Alta Usuario</title>
   
  </head>
  <body>
      <p> Ingresa los siguientes datos para darte de alta como usuario</p>
      <div><h3>Nuevo Usuario</h3></div>
      <form id="alta" action="/Tienda/controlador/consultor/alta"
            method="post">      
      <div >
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" > 
      </div>
      
      <div >
        <label>Apellido paterno:</label>
        <input type="text" name="apat" id="apat" > 
      </div>
      
      <div >
        <label>Apellido materno:</label>
        <input type="text" name="amat" id="amat" > 
      </div>
      
      <div >
        <label>username:</label>
        <input type="text" name="usern" id="usern" value=''> 
      </div>
      
      <div >
        <label>Correo:</label>
        <input type="text" name="mail" id="mail" > 
      </div>
      
      <div>
        <label for="pass" >Contraseña:</label>
        <input type="password" id="pass1" name="pass">
      </div>
      
      <div>
        <label for="pass">Repite contraseña:</label>
        <input type="password" id="pass2" name="passC" >
      </div>

      <div>
          <button id="Cancel"  class="input_button">  <a href='/Tienda'> Cancelar</a>    </button>
          <button id="Acceder"  class="input_button" type="submit">  Alta  </button>
      </div>
    </form>
  </body>

  <style>
  *{
    box-sizing: border-box;
  }
    form{
      border-radius: 5px;
      padding: 15px;
      widows: 100%;
      display: inline-block;
      border:3px solid rgba(93,125,156,1);
    }

    form label{
      font-size: 16px;
    }

    form input{
      border: 2px solid rgba(93,125,156,1);
      height: 30px;
      max-width: 350px;
      width: 100%;
      margin-bottom: 15px;
    }

    form .input_button{
      margin-top:10px;
      height: 30px;
      padding: 5 10px;
      cursor: pointer;
    }

    form .input_button a{text-decoration: none;}
  </style>
</html>
