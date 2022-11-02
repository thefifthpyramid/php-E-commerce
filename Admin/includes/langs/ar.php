<?php

    function lang($phrase){
        static $lang = array(
            'name' => 'احمد علي كلاي'
        );
        return $lang[$phrase];
    };
//    $lang = array (
//        'name' => 'Ahmed Ali Klay'
//    );