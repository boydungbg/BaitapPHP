<?php
require('../Common/test_connection.php');
$sql = "update users set user_fname = '" . $_POST["fname"] . "', user_lname = '" . $_POST["lname"] . "', user_email = '" . $_POST["email"] . "',user_pass='" . $_POST["password"] . "' where user_id = " . $_GET["id"];
if (mysqli_query($conn, $sql) == true) {
    header("Location: Adminpage.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
