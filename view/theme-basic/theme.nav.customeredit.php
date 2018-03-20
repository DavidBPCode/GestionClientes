<?php
    
    # Comprobamos si existe sesion, pero para eso primero hay que crearla
    session_start();

    # Si $_SESSION['validate'] es true, es que hay sesion si no es que el usuario no ha realizado el login
    # y se le envia a la pantalla de login
    if(!isset($_SESSION['validate'])) {

        header('location:login');

    }

?>

<div class="container content-nav col-sm-5">
    <form method="post">

        <h2 class="display-4 text-center">Actualizar Cliente</h2>
        
        <?php

            $edituser = new Controller();
            $edituser->editCustomerController();
            $edituser->updateCustomerController();

        ?>

    </form>
</div>