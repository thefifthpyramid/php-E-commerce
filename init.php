<?php
    /*
    ==========================================================
    ==  Template directory
    ==  Css directory
    ==  Lang directory
    ==
    ==
    ==========================================================
    */

    //Error Report


    //routes
    $tpl = "includes/templates/"; //template directory
    $func = "Admin/includes/functions/"; //template directory
    $css = "Admin/layout/css/"; //css directory
    $js = "Admin/layout/js/"; //css directory
    $lang = "Admin/includes/langs/"; //Lang directory


    // import file
    include "Admin/conf.php";

    include $func . "functions.php";
    include $lang . "en.php";
    include $tpl . "head.php";

    if (!isset($noNavBar)){
        include $tpl . "header.php";
    }

    $created_msg = "Created Successfully";

    $deleted_msg = "Deleted Successfully";

