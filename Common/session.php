<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: ../Login-Logout/FormLogin.php");
} else {
    $user_check = $_SESSION['login_user'];
    require('test_connection.php');
    $sql = "select * from users where user_username = '" . $user_check . "';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $login_session = $row['user_fname'] . " " . $row['user_lname'];
        }
    }
}
