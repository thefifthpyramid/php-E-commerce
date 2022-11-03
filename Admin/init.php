<?php
    //routes
    $tpl = "includes/templates/"; //template directory
    $css = "layout/css/"; //css directory
    $js = "layout/js/"; //css directory
    $lang = "includes/langs/";


    // import file
    include "conf.php";
    include $lang . "ar.php";
    include $tpl . "header.php";

    if (!isset($noNavBar)){
        include $tpl . "mainSideBar.php";
    }

