<?php
$c = new ProductoControlador();
$items = $c->catalogo();
//print_r($items);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Catálogo</title>
   
  </head>
  <body>
    <?php
        $ruta = $_SERVER['DOCUMENT_ROOT'];
        require_once($ruta.'/vista/menu.php');
    ?>
      <h2>Estos son los productos que te ofrece la tienda X:</h2>
      <table>
          <tr id="_encabezado">
              <th>Articulo</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Exitencias</th>
              <th>Precio</th>
              <th>Agrega</th>
          </tr>
          
          <?php $j = 1; foreach($items as $i): ?>
              <form id="alta" action="/Tienda/controlador/usuario/agrega"
                    method="post">      
                  <tr>
                      <td> <?=$j?></td> <input type="hidden" value="<?=$i->id?>" name="producto">
                      <td> <?=$i->name?></td> 
                      <td> <?=$i->description?></td> 
                      <td> <?=$i->total?></td> 
                      <td> <?=$i->price?></td>
                      <td>
                          <button id="Acceder" type="submit">  Agregar  </button>
                      </td>
                  </tr>
              </form>
          <?php endforeach; ?>
      </table>

      <style>
        table{
          border: 2px solid rgba(122,139,172,1);
          padding: 15px;
          border-radius: 5px;
          box-shadow: 1px 2px 10px rgba(1,1,1,0.5);
        }
        #_encabezado{
          font-size: 16px;
        }
      </style>
  </body>
</html>
