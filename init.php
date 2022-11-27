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
    include $tpl . "header.php";

//    if (!isset($noNavBar)){
//        include $tpl . "mainSideBar.php";
//    }


