<?php
$c = new ProductoControlador();
$items = $c->catalogo();
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
          <tr>
              <th>Articulo</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Exitencias</th>
              <th>Precio</th>
          </tr>
          
          <?php $j = 1; foreach($items as $i): ?>
              <tr>
                  <td> <?=$j?></td> 
                  <td> <?=$i->name?></td> 
                  <td> <?=$i->description?></td> 
                  <td> <?=$i->total?></td> 
                  <td> <?=$i->price?></td> 
              </tr>
          <?php endforeach; ?>
      </table>
  </body>
    <style>
        table{
          border: 2px solid rgba(122,139,172,1);
          padding: 15px;
          border-radius: 5px;
          box-shadow: 1px 2px 10px rgba(1,1,1,0.5);
        }
    </style>
</html>
