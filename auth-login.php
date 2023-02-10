<?php
require_once("database/config.php");

$message = "";

if (isset($_POST['Login'])) {
    //inputan

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $formdata = array();

    //cek username
    if (empty($_POST['username'])) {
        $message .= '<li>Username tidak boleh kosong</li>';
    } else {
        $formdata['username_user'] = $username;
    }

    //cek password
    if (empty($_POST['password'])) {
        $message .= '<li>password tidak boleh kosong</li>';
    } else {
        $formdata['password_user'] = $password;
    }

    if ($message == '') {

        // cek username pada database
        $stmnt = $conn->prepare("SELECT * FROM tb_user WHERE username = ?");
        $stmnt->execute(array($formdata['username_user']));

        //cek database
        if ($stmnt->rowCount() > 0) {
            foreach($stmnt->fetchAll() as $row)
            {
                if(password_verify($formdata['password_user'], $row['password']))
                {
                    session_start();

                    session_regenerate_id();

                    $user_session_id = session_id();

                    $query = "
                    UPDATE tb_user 
                    SET session_id = '".$user_session_id."' 
                    WHERE id_user = '".$row['id_user']."'
                    ";

                    $conn->query($query);

                    $_SESSION['id_user'] = $row['id_user'];

                    $_SESSION['email'] = $row['email'];

                    $_SESSION['session_id'] = $user_session_id;

                    $_SESSION['role'] = $row['role'];

                    $_SESSION['username'] = $row['username'];

                    header('location:index.php');
                }
                else
                {
                    $message = '<li>Password Salah</li>';
                }
            }
        } else {
            $message = '<li>Username Salah atau tidak terdaftar</li>';
        }


        // // eksekusi query untuk menyimpan ke database
        // $saved = $stmnt->execute($params);
        // // jika query simpan berhasil, maka user sudah terdaftar
        // // maka alihkan ke halaman login
        // if ($saved)
        //     header("Location: auth-login.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form method="post">
                        <?php
                        if ($message != "") {
                            echo '<div class="alert alert-light-warning alert-dismissible fade show" role="alert">
                                <ul>' . $message . '</ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>';
                        }
                        ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username"
                                name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <!-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> -->
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit" name="Login">Log
                            in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.php"
                                class="font-bold">Sign
                                up</a>.</p>
                        <!-- <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/main.js"></script>
<script type="text/javascript">
    window.onbeforeunload = function () {
        document.forms["register"].reset();
    }
</script>

</html>