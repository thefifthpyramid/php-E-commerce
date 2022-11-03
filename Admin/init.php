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
    $func = "includes/functions/"; //template directory
    $css = "layout/css/"; //css directory
    $js = "layout/js/"; //css directory
    $lang = "includes/langs/"; //Lang directory


    // import file
    include "conf.php";
    include $func . "functions.php";
    include $lang . "en.php";
    include $tpl . "header.php";

    if (!isset($noNavBar)){
        include $tpl . "mainSideBar.php";
    }


