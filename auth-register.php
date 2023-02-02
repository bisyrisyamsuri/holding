<?php
require_once("config.php");

$message = '';
session_start();
session_regenerate_id();

if (isset($_POST['register'])) {

    // filter data yang diinputkan

    $mail = $_POST["email"];
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $pass_conf = $_POST["conf-password"];

    //cek format
    $cekmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $role = 2;
    $session_id = session_id();

    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $confirm = password_hash($_POST["conf-password"], PASSWORD_DEFAULT);
    $dataform = array();

    // menyiapkan query untuk insert
    $sql = "INSERT INTO tb_user (username, email, password, role, session_id) 
     VALUES (:username, :email, :password, :role, :session_id)";
    $stmt = $conn->prepare($sql);


    if (empty($mail)) {
        $message .= '<li>Email tidak boleh kosong</li>';
    } else {
        if (!$cekmail) {
            $message .= '<li>Email tidak sesuai</li>';
        } else {
            $dataform['email_user'] = $mail;
        }
    }

    if (empty($user)) {
        $message .= '<li>Username tidak boleh kosong</li>';
    } else {
        // cek username pada database
        $stmnt = $conn->prepare("SELECT username FROM tb_user WHERE username = :usr");
        $stmnt->bindParam(':usr', $user);
        $stmnt->execute();
        if ($stmnt->rowCount() > 0) {
            $message .= '<li>Username telah digunakan</li>';
        } else {
            // Insert the input into the database
            $dataform['username_user'] = $username;
        }
    }

    if (empty($pass)) {
        $message .= '<li>password tidak boleh kosong</li>';
    } else {
        if ($pass == $pass_conf) {
            $dataform['username_pass'] = $password;
        } else {
            $message .= '<li>Password tidak sama</li>';
        }
    }

    if ($message == '') {

        $params = array(
            ":role" => $role,
            ":username" => $dataform['username_user'],
            ":password" => $dataform['username_pass'],
            ":email" => $dataform['email_user'],
            ":session_id" => $session_id,
        );
        // eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute($params);
        // jika query simpan berhasil, maka user sudah terdaftar
        // maka alihkan ke halaman login
        if ($saved)
            header("Location: auth-login.php");

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
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <form method="post" name="register">
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
                            <input type="text" class="form-control form-control-xl" placeholder="Email" name="email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
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
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Confirm Password"
                                name="conf-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit"
                            name="register">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="auth-login.php" class="font-bold">Log
                                in</a>.</p>
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