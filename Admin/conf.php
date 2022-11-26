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

/*
     * tables relation
        ALTER TABLE items
        ADD CONSTRAINT cat_1
        FOREIGN KEY(cat_id)
        REFERENCES categories(id)
        ON UPDATE CASCADE;

     *
        SELECT items.*, categories.name AS cat_name,users.userName FROM items
        INNER JOIN categories ON categories.id = items.cat_id
        INNER JOIN users ON users.id = items.member_id


     *  ALTER TABLE comments ADD CONSTRAINT items_comment FOREIGN KEY(item_id) REFERENCES items(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE;


     *  ALTER TABLE comments ADD CONSTRAINT comment_user
        FOREIGN KEY(user_id) REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE;


*/