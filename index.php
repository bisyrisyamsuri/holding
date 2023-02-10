<?php
require_once("auth.php");

require "database/koneksi.php";
function query($sql)
{
    global $conn;
    $hasil_query = mysqli_query($conn, $sql);
    $data_hasil_query = array();
    while ($record_hasil_query = mysqli_fetch_assoc($hasil_query)) {
        $data_hasil_query[] = $record_hasil_query;
    }
    return $data_hasil_query;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once("auth.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <style type="text/css">
        #map {
            height: 400px;
        }
    </style>
</head>


<body>
    <div id="app">
        <div id="sidebar" class="active">
            <?php include 'layout-sidebar.html'; ?>
        </div>

        <div id="main" class='px-4 layout-navbar'>
            <header class="mb-3">
                <nav class="px-0 navbar navbar-expand navbar-light ">
                    <div class="px-0 container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                        <?php include 'layout-navbar.html'; ?>
                    </div>
                </nav>
            </header>
            <?php
            if ($_SESSION['role'] == 1) {
                include("aside_index-admin.php");
            } else {
                include("aside_index-user.php");
            }
                ?>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/session.js"></script>

</body>

</html>