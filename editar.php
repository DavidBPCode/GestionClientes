<?php
   // Incluimos la clase EditarCliente
   include("includes/editarcliente.php");

   // Instanciamos un objeto de la clase editar clientes
   $cliente = new EditarCliente;

   // Traemos el valor del cliente a editar
   $idcliente = $_GET['id'];

   // Creamos un objeto nuevo que traiga el cliente a editar usando el método EditClient de EditarCliente
   $editarcliente = $cliente->EditClient($idcliente);

   // Recorremos todo el array y guardamos cada elmento del campo en su correspondiente variable
   foreach ($editarcliente as $elemento) {
      $id = $elemento['idclientes'];
      $nombre = $elemento['nombre'];
      $alias = $elemento['alias'];
      $movil = $elemento['movil'];
      $direccion = $elemento['direccion'];
      $poblacion = $elemento['poblacion'];
      $provincia = $elemento['provincia'];
      $codigopostal = $elemento['codigopostal'];
      $tratamientocapilar = $elemento['tratamientocapilar'];
      $tratamientocorporal = $elemento['tratamientocorporal'];
      $observaciones = $elemento['observaciones'];
   }
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
      <?php

      // Recuperamos sesión si la hubiera
      session_start();

      // Comprobar si está con la sesión iniciada, si no lo está redirigimos a acceder.php
      // Si lo está lo dejamos en la página actual
      if(!isset($_SESSION['usuario'])) {

       header('location:acceder.php');

      }

      ?>
      <div class="container">
       <header class="header">
            <h1>Gestión Clientes <small><a href="index.php" class="non-format"><?php echo $empresa;?></a></small></h1>
       </header>
      </div>
      <div class="container menu-create">
      <div class="container">
         <a href="index.php">Home</a> > <a href="buscarcliente.php">Buscar</a> > <a href="javascript:history.back()">Ver cliente</a><br><br>
      </div>
         <form action="actualizarcliente.php" method="POST">
           <div class="form-horizontal">
                <div class="form-group">
                     <label class="col-lg-2 control-label">ID Cliente</label>
                     <div class="col-lg-10">
                        <input type="text" name="idcliente" id="idcliente" class="form-control input_size" value="<?php echo $id;?>" required>
                     </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Nombre</label>
                    <div class="col-lg-10">
                        <input type="text" name="nombre" id="nombre" class="form-control input_size" value="<?php echo $nombre;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Alias</label>
                    <div class="col-lg-10">
                        <input type="text" name="alias" id="alias" class="form-control input_size" value="<?php echo $alias;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Móvil</label>
                    <div class="col-lg-10">
                        <input type="text" name="movil" id="movil" class="form-control input_size" value="<?php echo $movil;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Dirección</label>
                    <div class="col-lg-10">
                        <input type="text" name="direccion" id="direccion" class="form-control input_size" value="<?php echo $direccion;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Población</label>
                    <div class="col-lg-10">
                        <input type="text" name="poblacion" id="poblacion" class="form-control input_size" value="<?php echo $poblacion;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Provincia</label>
                    <div class="col-lg-10">
                        <input type="text" name="provincia" id="provincia" class="form-control input_size" value="<?php echo $provincia;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Código Postal</label>
                    <div class="col-lg-10">
                        <input type="text" name="codigopostal" id="codigopostal" class="form-control input_size" value="<?php echo $codigopostal;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tratamiento Capilar</label>
                    <div class="col-lg-10">
                        <input type="text" name="tratamientocapilar" id="tratamientocapilar" class="form-control input_size" value="<?php echo $tratamientocapilar;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tratamiento Corporal</label>
                    <div class="col-lg-10">
                        <input type="text" name="tratamientocorporal" id="tratamientocorporal" class="form-control input_size" value="<?php echo $tratamientocorporal;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Observaciones</label>
                    <div class="col-lg-10">
                        <input type="text" name="observaciones" id="observaciones" class="form-control input_size" value="<?php echo $observaciones;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" name="enviar" value="Salvar" class="btn btn-default">Salvar</button>
                    </div>
                </div>
           </div>
         </form>
      </div>
    </body>
</html>
