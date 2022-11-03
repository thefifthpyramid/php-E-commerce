<?php

    function lang($phrase){
        static $lang = array(
            'name' => 'Ahmed Ali Klay',
            'logout'=>'Logout',
            'profile' => 'Profile',
        );
        return $lang[$phrase];
    };
//    $lang = array (
//        'name' => 'Ahmed Ali Klay'
//    );