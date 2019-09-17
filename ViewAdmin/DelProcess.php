<?php
require("../Common/test_connection.php");
$id = $_GET["id"];
$sql = "delete from users where user_id = " . $id;
if (mysqli_query($conn, $sql) === true) {
    header("Location: Adminpage.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
