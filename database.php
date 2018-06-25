<?php

// Объявляем нужные константы
//define('DB_HOST', 'localhost');
//define('DB_USER', 'root');
//define('DB_PASSWORD', '');
//define('DB_NAME', 'my-filter');

$link = mysqli_connect('localhost', 'root', '', 'my-filter' );

if ( mysqli_connect_errno()) {
    echo 'Warning connect';
    exit();
}