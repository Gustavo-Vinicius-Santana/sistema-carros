<?php
    if(session_status() != PHP_SESSION_ACTIVE){
        session_set_cookie_params(['httponly' => true]);

        session_start();
    }
?>