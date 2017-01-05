<?php
    include("includes/vercliente.php");

    $clientes = new DevuelveClientes();
    $alias = $_GET["alias"];
    $array_clientes = $clientes->getClientes($alias);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es">
    <head>
     <?php

        // Ficheros de configuración y nombre de empresa
       include("includes/header.php");
       include("includes/empresa.php");

       // Instanciamos un objeto nuevo de empresa para rescatar el nombre de la peluquería
       $nombreempresa = new Empresa();

       // Usamos el método para rescatar nombre de empresa y lo guardamos en otra variable para poder usarla más tarde
       $empresa = $nombreempresa->getNameBussines();

     ?>
    </head>

    <body>
         <div class="container">
             <header class="header">
                  <h1>Gestión Clientes <small><?php echo $empresa;?></small></h1>
             </header>
        </div>
        <div class="container menu-search">
           <table class="table table-striped">
             <tr class="header-table">
                <td>Alias</td>
                <td>Dirección</td>
                <td>Móvil</td>
                <td>Capilar</td>
                <td>Corporal</td>
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
                      echo "<a href='editar.php?id= " .  $elemento['idclientes'] . "'>Editar</a>
                           </td>";
                   echo "</tr>";
                 }
             ?>
          </table>
        </div>
    </body>
</html>
