<?php

date_default_timezone_set('Europe/Berlin');

ini_set('display_errors', 'Off');

$GLOBALS['DB_CONNECTION'] = mysqli_connect(
    'localhost',
    'root',
    'root',
    'phpblog'
);

if(!$GLOBALS['DB_CONNECTION']){
    exit;
}

register_shutdown_function(function(){
    if(array_key_exists('DB_CONNECTION', $GLOBALS) && $GLOBALS['DB_CONNECTION']){
        mysqli_close($GLOBALS['DB_CONNECTION']);
    }
});

ini_set('session.gc_maxlifetime', 1440);
session_set_cookie_params(1440);

session_start();
