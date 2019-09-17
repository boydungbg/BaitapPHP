<?php
    // Set access detail
    define('db_user','root');
    define('db_password','root');
    define('db_host','localhost');
    define('db_name','onlineshopdb');
    define('db_port','2610');
    // Make connect
    $conn = new mysqli(db_host,db_user,db_password,db_name,db_port);
    // Set encoding
    $conn->set_charset("utf-8");
