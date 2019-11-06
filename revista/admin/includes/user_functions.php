<?php

    // Admin user variables
    $admin_id = 0;
    $isEditingUser = false;
    $username = "";
    $role = "";
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

    function editAdmin($admin_id)
    {
        global $conexion, $username, $role, $isEditingUser, $admin_id, $email;

        $sql = "SELECT * FROM users WHERE id=$admin_id LIMIT 1";
        $result = mysqli_query($conexion, $sql);
        $admin = mysqli_fetch_assoc($result);

        // set form values ($username and $email) on the form to be updated
        $username = $admin['username'];
        $email = $admin['email'];
    }

    //Función para actualizar rol del usuario
    function updateAdmin($request_values){
        global $conexion, $errors, $role, $isEditingUser, $admin_id;
        // get id of the admin to be updated
        $admin_id = $request_values['admin_id'];
        // set edit state to false
        $isEditingUser = false;
    
        if(isset($request_values['role'])){
            $role = $request_values['role'];
        }
        // register user if there are no errors in the form
        if (count($errors) == 0) {    
            $query = "UPDATE users SET role='$role' WHERE id=$admin_id";
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
        $sqlPag = "SELECT * FROM users WHERE role IS NOT NULL";

        //Realiza la consulta
        $resultPag = mysqli_query($conexion, $sqlPag);

        //Cuenta el número total de registros
        $total_registros = mysqli_num_rows($resultPag);

        //Obtiene el total de páginas existentes
        $total_paginas = ceil($total_registros / $limit); 

        
        $sql = "SELECT * FROM users WHERE role IS NOT NULL LIMIT $offset, $limit";
        $result = mysqli_query($conexion, $sql);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        return $users;
    }

?>