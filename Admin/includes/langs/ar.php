<?php

    function lang($phrase){
        static $lang = array(
            'name' => 'احمد علي كلاي',
            'logout'=>'تسجيل الخروج',
        );
        return $lang[$phrase];
    };
//    $lang = array (
//        'name' => 'Ahmed Ali Klay'
//    );