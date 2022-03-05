<?php

require_once('../config/dbconnection.php');
if (isset($_SESSION['email'])) {
    header("Location: ../index.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
}

$errorMsg = 'credentials not mathed. please try again with right information';
$adminQuery = "SELECT `email`, `password` FROM `admin-login` WHERE `email` = '$email' ";  //getting database info's by email checking. Be carefully about single and double quotation
$dbQuery = mysqli_query($dbConnect, $adminQuery);

if (isset($_POST['submit'])) {
    $getAdminInfo = mysqli_fetch_assoc($dbQuery);
    if ($getAdminInfo['email'] == $email && $getAdminInfo['password'] == md5($password)) {
        $_SESSION['email'] = $email;
        header("Location: ../index.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login </title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class=" mb-3">
                                        <label for="email">Email address</label>
                                        <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" />
                                        <span class="text-danger">
                                            <?php
                                            if (isset($_POST['submit'])) {
                                                if ($getAdminInfo['email'] !== $email || $getAdminInfo['password'] !== md5($password)) {
                                                    echo $errorMsg;
                                                }
                                            }
                                            ?>

                                        </span>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" />
                                    </div>
                                    <div class="d-flex align-items-center mt-4 mb-0">
                                        <input value="Login" type="submit" name="submit" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>