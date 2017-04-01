<?php

    // Incluimos la clase Devuelve Clientes
    include("includes/vercliente.php");
    
    // Creamos un nuevo objeto
    $clientes = new DevuelveClientes();

    // Obtenemos los valores de los campos del formulario anterior
    $alias = $_GET["alias"];
    $number = $_GET["movil"];

   
    if(!empty($alias) && !empty($number)){
      // Si está cumplimentado el alias y el móvil busca por alias y móvil y devolverá los resultados por alias y móvil
      $array_clientes = $clientes->getClientesAliasPhone($alias, $number);
    }elseif(!empty($alias)){
      // Si está cumplimentado el alias busca por alias y devolverá los resultados por alias
      $array_clientes = $clientes->getClientesAlias($alias);
    }elseif(!empty($number)){
      // Si está cumplimentado el móvil busca por móvil y devolverá los resultados por móvil
      $array_clientes = $clientes->getClientesPhone($number);
    }
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es">
    <head>
     <?php

        // Ficheros de configuración y nombre de empresa
       include("includes/header.php");
       include("includes/empresa.php");

       // Incluir comprobación de sesión
       include("session/comprobarsesion.php");

       // Instanciamos un objeto nuevo de empresa para rescatar el nombre de la peluquería
       $nombreempresa = new Empresa();

       // Usamos el método para rescatar nombre de empresa y lo guardamos en otra variable para poder usarla más tarde
       $empresa = $nombreempresa->getNameBussines();

     ?>
    </head>

    <body>
      <?php

        // Comprobar sesion
        ComprobarSesion();

      ?>
      <div class="container">
       <header class="header">
            <h1>Gestión Clientes <small><a href="index.php" class="non-format"><?php echo $empresa;?></a></small></h1>
       </header>
      </div>
      <div class="container menu-search">
      <div class="container">
       <a href="index.php">Home</a> > <a href="buscarcliente.php">Buscar</a>
      </div>
      <table class="table table-striped">
       <tr class="header-table">
          <td>Alias</td>
          <td>Dirección</td>
          <td>Móvil</td>
          <td>Capilar</td>
          <td>Corporal</td>
          <td>Ver</td>
          <td>Editar</td>
       </tr>
       <?php
           foreach($array_clientes as $elemento){
             echo "<tr>";
                echo "<td>";
                      echo $elemento['alias'] .
                      "</td>";
                echo "<td>";
                      echo $elemento['direccion'] .
                   "</td>";
                echo "<td>";
                      echo $elemento['movil'] .
                    "</td>";
                echo "<td>";
                      echo $elemento['tratamientocapilar'] .
                    "</td>";
                echo "<td>";
                      echo $elemento['tratamientocorporal'] .
                    "</td>";
                echo "<td>";
                echo "<a href='vercliente.php?id=" .  $elemento['idclientes'] . "'><span class='glyphicon glyphicon-search'></span></a>
                     </td>";
                echo "<td>";
                echo "<a href='editar.php?id=" .  $elemento['idclientes'] . "'><span class='glyphicon glyphicon-edit'></span></a>
                     </td>";
             echo "</tr>";
           }
       ?>
      </table>
      </div>
    </body>
</html>
