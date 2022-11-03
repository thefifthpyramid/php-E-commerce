<?php

function getTitle(){

    global $pageTitle;

    if (isset($pageTitle)){

        echo $pageTitle;

    }else{

        echo 'UnFound';

    }
}
?>