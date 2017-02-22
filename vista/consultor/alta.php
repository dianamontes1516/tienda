<!DOCTYPE html>
<html>
  <head>
    <title>Alta Usuario</title>
   
  </head>
  <body>
      <p> Ingresa los siguientes datos para darte de alta como usuario</p>

      
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
          <button id="Cancel">  <a href='/Tienda'> Cancelar</a>    </button>
          <button id="Acceder" type="submit">  Alta  </button>
      </div>
    </form>
  </body>
</html>
