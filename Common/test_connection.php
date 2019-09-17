<?php
try {
    require('ConnectionMySQL_PHP.php');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully";
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage(), "\n";
}
