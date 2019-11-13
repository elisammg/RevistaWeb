<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'C:\wamp64\composer\vendor\autoload.php';

    // Admin user variables
    $admin_id = 0;
    $isEditingUser = false;
    $username = "";
    $role = "";
    $userRole = "";
    $email = "";
    $total_paginas = 0;

    // if user clicks the Edit admin button
    if (isset($_GET['edit-admin'])) {
        $isEditingUser = true;
        $admin_id = $_GET['edit-admin'];
        editAdmin($admin_id);
    }
    // if user clicks the update admin button
    if (isset($_POST['update_admin'])) {
        updateAdmin($_POST);
    }
    // if user clicks the Delete admin button
    if (isset($_GET['delete-admin'])) {
        $admin_id = $_GET['delete-admin'];
        deleteAdmin($admin_id);
    }

    function editAdmin($admin_id){
        global $conexion, $username, $role, $userRole, $isEditingUser, $admin_id, $email, $tipo, $yes, $nop;

        $sql = "SELECT users.id, users.username, users.email, users.suscripcion, users.role, cobro.iniciosusc, suscripcion.tipo 
                    FROM users 
                    LEFT JOIN cobro ON users.id = cobro.id_users 
                    LEFT JOIN suscripcion on cobro.id_sus = suscripcion.id 
                    WHERE users.id=$admin_id LIMIT 1";
                    
        $result = mysqli_query($conexion, $sql);
        $admin = mysqli_fetch_assoc($result);

        // set form values ($username and $email) on the form to be updated
        $username = $admin['username'];
        $email = $admin['email'];
        $tipo = $admin['tipo'];
        $userRole = $admin['role'];
        $yes = $admin['suscripcion'] = 1;
        $nop = $admin['suscripcion'] = 0;
    }

    //Función para actualizar rol del usuario
    function updateAdmin($request_values){
        global $conexion, $errors, $role, $isEditingUser, $admin_id, $yes, $nop;
        // get id of the admin to be updated
        $admin_id = $request_values['admin_id'];
        // set edit state to false
        $isEditingUser = false;
    
        if(isset($request_values['role'])){
            $role = $request_values['role'];
        }
        if(isset($request_values['pokemonsusc'])){
            $pokemonsusc = $request_values['pokemonsusc'];
        }
        // register user if there are no errors in the form
        if (count($errors) == 0) {    
            $query = "UPDATE users SET role='$role', suscripcion = '$pokemonsusc' WHERE id=$admin_id";
            mysqli_query($conexion, $query);
    
            $_SESSION['message'] = "Admin user updated successfully";
            header('location: admin.php');
            exit(0);
        }
    }

    //Función para eliminar usuario
    function deleteAdmin($admin_id) {
        global $conexion;
        $sql = "DELETE FROM users WHERE id=$admin_id";
        if (mysqli_query($conexion, $sql)) {
            $_SESSION['message'] = "User successfully deleted";
            header("location: admin.php");
            exit(0);
        }
    }

    //Toma los datos de los usuarios registrados
    function getAdminUsers($limit, $offset){
        global $conexion, $roles, $total_paginas;
        //Obtiene TODO de la tabla
        $sqlPag = "SELECT users.id, users.username, users.email, users.role, users.suscripcion, cobro.iniciosusc, suscripcion.tipo 
                    FROM users 
                    LEFT JOIN cobro ON users.id = cobro.id_users 
                    LEFT JOIN suscripcion on cobro.id_sus = suscripcion.id";

        //Realiza la consulta
        $resultPag = mysqli_query($conexion, $sqlPag);

        //Cuenta el número total de registros
        $total_registros = mysqli_num_rows($resultPag);

        //Obtiene el total de páginas existentes
        $total_paginas = ceil($total_registros / $limit); 

        
        $sql = "SELECT users.id, users.username, users.email, users.suscripcion, users.role, cobro.iniciosusc, suscripcion.tipo 
                    FROM users 
                    LEFT JOIN cobro ON users.id = cobro.id_users 
                    LEFT JOIN suscripcion on cobro.id_sus = suscripcion.id 
                    WHERE users.role IS NOT NULL 
                    ORDER BY users.id ASC
                    LIMIT $offset, $limit";
        $result = mysqli_query($conexion, $sql);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        return $users;
    }

    function getAdminEmail(){
        global $conexion;
        $sql = "SELECT email FROM users WHERE role='Admin'";
        $result = mysqli_query($conexion, $sql);
        $email = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $email;
    }

    if(isset($_GET['change-role'])){
        global $conexion;
        /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
        $mail = new PHPMailer(TRUE);
        $from = $_SESSION['users']['email'];
        $name = $_SESSION['users']['nombre'] .' '. $_SESSION['users']['apellido'];
        $sql = "SELECT * FROM users WHERE role='Admin'";
        $result = mysqli_query($conexion, $sql);

        /* Open the try/catch block. */
        try {
            /* Set the mail sender. */
            $mail->setFrom($from, $name);

            while($to = mysqli_fetch_assoc($result)){
                /* Add a recipient. */
                $mail->addAddress($to['email'], $to['nombre']. ' ' .$to['apellido']);
                echo $to['email'];
                echo $to['nombre']. ' ' .$to['apellido'];
            }

            /* Set the subject. */
            $mail->Subject = 'Change rol request';

            /* Set the mail message body. */
            $mail->Body = 'I\'d like to change my role to Author, please.';

            /* Finally send the mail. */
            $mail->send();
        }
        catch (Exception $e){
            /* PHPMailer exception. */
            echo $e->errorMessage();
        }
        catch (\Exception $e){
            /* PHP exception (note the backslash to select the global namespace Exception class). */
            echo $e->getMessage();
        }

        header("Location: loggeado.php");
    }

?>