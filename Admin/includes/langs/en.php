<?php

    function lang($phrase){
        static $lang = array(
            'name' => 'Ahmed Ali Klay',
            'logout'=>'Logout',
            'profile' => 'My Profile',
            'users_manage' => 'Users Manage',
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