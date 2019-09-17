<!DOCTYPE html>
<html lang="en">
<?php
include('../Common/session.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <h3> Welcome, <?php echo  $login_session; ?></h3>
        <?php
        require('../Common/test_connection.php');
        $query = "Select * from users";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<table style='width: 100%'>";
            echo "<tr>
        <th>Edit</th>
        <th>Delete</th>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Register Date</th>
        </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
            <td><a href='UpdateForm.php?id= " . $row["user_id"] . "' onclick='return checkupdate()'>Edit</a></td>
            <td><a href='DelProcess.php?id= " . $row["user_id"] . "' onclick='return checkdelete()'>Delete</a></td>
            <td>" . $row["user_id"] . "</td>
            <td>" . $row["user_fname"] . "</td>
            <td>" . $row["user_lname"] . "</td>
            <td>" . $row["user_email"] . "</td>
            <td>" . $row["user_registerdate"] . "</td>
            </tr>";
            }
            echo "</table>";
        }
        echo "<a href='../Login-Logout/Logout.php'>Logout</a>";
        ?>
    </div>
    <script src="../java.js"></script>
</body>

</html>