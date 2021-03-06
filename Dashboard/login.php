<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            // set session

            if ($row['level'] == "admin") {

                $_SESSION["login"] = true;
                $_SESSION['level'] = "admin";
                header("Location: index.php");
            } else if ($row['level'] == "pelayan") {

                $_SESSION["login"] = true;
                $_SESSION['level'] = "pelayan";
                header("Location: main.php");
            } else if ($row['level'] == "kasir") {

                $_SESSION["login"] = true;
                $_SESSION['level'] = "kasir";
                header("Location: kasir.php");
            } else if ($row['level'] == "koki") {

                $_SESSION["login"] = true;
                $_SESSION['level'] = "koki";
                header("Location: koki.php");
            }

            // $_SESSION["login"] = true;

            // header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hail Resto - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="d-flex flex-row bd-highlight brand-wrapper">
                                <img src="../assets/img/logo.png" alt="logo" class="logo">
                                <h1 class="font-weight-bold txt-hail">HAIL RESTO</h1>
                            </div>
                            <form action="" method="POST" name="f">
                                <div class="form-group">
                                    <label for="username" class="form-label fw-bolder">Username</label>
                                    <input name="username" class="form-control" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="form-label fw-bolder">Password</label>
                                    <input name="password" type="password" class="form-control" required>
                                </div>
                                <input type="submit" class="btn btn-block login-btn mb-4 btn-light" value="Login" name="login">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="../assets/img/login.png" alt="login" class="login-card-img">
                    </div>
                </div>
            </div>

        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>