<?php

    session_start();    //start session

    session_unset();    //unset the session

    session_destroy();  //destroy the session

    header('Location: ../index.php');