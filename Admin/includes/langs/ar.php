<?php

    function lang($phrase){
        static $lang = array(
            'name' => 'احمد علي كلاي',
            'logout'=>'تسجيل الخروج',
            'profile' => 'الملف الشخصي',
            'users_manage' => 'ادارة الاعضاء',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
        );
        return $lang[$phrase];
    };
//    $lang = array (
//        'name' => 'Ahmed Ali Klay'
//    );