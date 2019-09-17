<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Login</title>
</head>

<body>
    <?php
    require('../Common/test_connection.php');
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['username'])) {
            $usernameErr = "Không được bỏ trống";
        }
        if (empty($_POST['password'])) {
            $passErr = "Không được bỏ trống ";
        } else {
            $sql = "select * from users where user_username = '" . $_POST['username'] . "';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($_POST['password'] == $row['user_pass']) {
                        $_SESSION['login_user'] = $_POST['username'];
                        if ($row['user_level'] == 1) {
                            header("location: ../ViewAdmin/Adminpage.php");
                            exit();
                        }
                        if ($row['user_level'] == 2) {
                            header("location: ../ViewUser/Index.php");
                            exit();
                        }
                    }
                }
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng. <br>";
            }
        }
    }
    ?>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                                <span><?php echo   $usernameErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <span><?php echo $passErr; ?></span>
                            </div>
                            <div class="form-group">
                                <span><?php echo $error; ?></span>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="../Register/FormRegister.php" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>