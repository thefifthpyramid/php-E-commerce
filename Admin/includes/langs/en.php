<?php

    function lang($phrase){
        static $lang = array(
            'name' => 'Ahmed Ali Klay'
        );
        return $lang[$phrase];
    };
//    $lang = array (
//        'name' => 'Ahmed Ali Klay'
//    );