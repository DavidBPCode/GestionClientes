<!--

  Autor: David Bernabé
  E-mail: david.bern.pal@gmail.com
  Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

  Función: Página que crea cliente nuevo
  
-->
<?php

   // Incluimos la clase Modificar cliente
   include __DIR__ . '/includes/constumer.php';

   // Instanciamos un objeto de modificar cliente
   $newconstumer = new Constumer;

   // ModificarCliente contendrá los datos del array asociativo de $_POST que se obtienen de la página editar
   $newconstumer->SetNewConstumer($_POST);

   // Si Modificar cliente no obtuviese datos se muestra error, de lo contrario se indica que el cliente ha sido modificado
   if($newconstumer == false) {

      $message = "No se ha podido modificar el cliente. Consulta con el administrador.";

   } else {

      $message = "El cliente ha sido creado correctamente. <br><br>
                  <a href='datosclientes.php'>Crear otro cliente</a> <br><br>
                  <a href='index.php'>Volver al menú principal</a>";

   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es">

   <head>
    <?php

      // Ficheros de configuración y nombre de empresa
      include __DIR__ . '/includes/header.php';
      include __DIR__ . '/includes/business.php';

      // Incluir comprobación de sesión
      include __DIR__ . '/session/comprobarsesion.php';

      // Instanciamos un objeto nuevo de empresa para rescatar el nombre de la peluquería
      $namebusiness = new Business();

      // Usamos el método para rescatar nombre de empresa y lo guardamos en otra variable para poder usarla más tarde
      $business = $namebusiness->getNameBusiness();

    ?>
   </head>
   <body>
      <?php

        // Comprobar sesion
        ComprobarSesion();

      ?>
      <div class="container">
         <header class="header">
            <h1>Gestión Clientes <small><a href="index.php" class="non-format"><?php echo $business;?></a></small></h1>
         </header>
      </div>
      <div class="container menu-index menu-search">
         <p><?php echo $message; ?></p>
      </div>
   </body>
   
</html>
