<?php
/*
     * title function
     *  to change each page title
*/
function getTitle(){

    global $pageTitle;

    if (isset($pageTitle)){
        echo $pageTitle;
    }else{
        echo 'UnFound title';
    }
}
/*
     * redirect function
     *  parametirs
        * $errorMsg
        * $seconds
*/
function redirectHome($errorMsg,$seconds = 3){
    echo '<div class="alert alert-danger">$errorMsg.</div>';
    echo '<div class="alert alert-info">You will be redirected to Home page After $seconds seconds.</div>';
    header("refresh:$seconds;url=auth/dashboard.php ");
    exit();
}







?>