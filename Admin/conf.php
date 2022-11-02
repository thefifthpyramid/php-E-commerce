<?php
    //connect DB
    $dsn    = "mysql:host=localhost;dbname=php_e-commerce";
    $user   = "root";
    $pass   = '';
    $optopn = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    try {
        $con = new PDO($dsn,$user,$pass,$optopn);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "you are connected";
    }
    catch (PDOException $e){
        echo "faild to connect " . $e->getMessage();
    }