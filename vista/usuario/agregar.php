<?php
$c = new ProductoControlador();
$items = $c->catalogo();
print_r($items);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Catálogo</title>
   
  </head>
  <body>
      <h2>Estos son los productos que te ofrece la tienda X:</h2>
      <table>
          <tr>
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
  </body>
</html>
