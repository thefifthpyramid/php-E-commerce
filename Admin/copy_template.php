<?php
    ob_start();
    session_start();
    /*
    ============================================================
    ==  manage page
    == you can create | delete | members from here
    ==
    ============================================================
    */
    $pageTitle = "categories";
    if(isset($_SESSION['username'])){
        include "init.php";
    }else{
        header('Location: auth/login.php'); //redirect to dashboard page
        exit();
    }
    /*
    ============================================================
    ==  multiple pages
    ============================================================
    */

    $do = isset($_GET['do']) ? $_GET['do'] : 'blank page';

    if($do == 'edit'){
        echo 'edit';
    }elseif ($do = 'create'){
        echo 'create';
    }else{
        header('Location:dashboard.php');
        exit();

        ob_end_flush();
    }

?>