<?php
include 'administrador.php';
include 'adminDAO.php';
if (isset($_POST['email'])) {
    $admin = new Administrador($_POST['email'], md5($_POST['psswd']));
    $adminDAO = new AdminDao();
    if($adminDAO->login($admin)){

        header('Location: zona.admin.php');
    }else {
        header('Location: index.php');
    }
}else {
    header('Location: index.php');
}
?>