<?php
require_once("auth.php");
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
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-1 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                            
                                                <?php
                                                $sql = "SELECT * FROM db_tesdata WHERE id=1";
                                                $data_chart = query($sql);
                                                foreach ($data_chart as $dc) :
                                                ?>
                                                    <h6 class="text-muted font-semibold">Jumlah Kerjasama</h6>
                                                    <h6 class="font-extrabold mb-0"><?php echo $dc['angka3'] ?></h6>
                                                <?php
                                                endforeach
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-1 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldDiscovery"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Layanan</h6>
                                                <h6 class="font-extrabold mb-0">24</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-1 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldTicket"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Kategori</h6>
                                                <h6 class="font-extrabold mb-0">4</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-1 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldPaper-Plus"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Kesepakatan</h6>
                                                <h6 class="font-extrabold mb-0">3</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Pertumbuhan Total Per-Bulan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Progress Per-Kategori</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $sql = 
                                        "SELECT tb_bisnis.id_jenispelayanan, tb_jenislayanan.id_layanan, tb_kategoribisnis.id_kategori, tb_kategoribisnis.target_capaian,  
                                        SUM(nilai_kerjasama) as nilai_kerjasama,
                                        CONCAT(ROUND((SUM(nilai_kerjasama) / (target_capaian))*100,2),'%') as percentage
                                        FROM tb_bisnis
                                        JOIN tb_jenislayanan
                                        ON tb_bisnis.id_jenispelayanan = tb_jenislayanan.id_layanan
                                        JOIN tb_kategoribisnis
                                        ON tb_jenislayanan.id_kategori = tb_kategoribisnis.id_kategori
                                        WHERE tb_kategoribisnis.id_kategori = 1 ";

                                        $data_chart = query($sql);
                                        foreach ($data_chart as $dc) :
                                        ?>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-success" width="32" height="32" fill="blue" style="width:10px">
                                                            <use xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <b>
                                                            <p class="mb-0 ms-3">Target Bisnis</p>
                                                        </b>
                                                    </div>
                                                </div>
                                                <div class="col-12  mt-2">
                                                    <div class="progress progress-alert-dark" style="height:40px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="progress-bar-label" style="font-size: 16px;">Rp <?php echo number_format($dc['target_capaian'], 0, ",", "."); ?></span>
                                                    </div>
                                                </div>
                                                    <div class="col-6 mt-2">
                                                        <h6 class="mb-0">100%</h6>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mt-4">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-danger" width="32" height="32" fill="blue" style="width:10px">
                                                            <use xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <b>
                                                            <p class="mb-0 ms-3">Pencapaian Saat Ini</p>
                                                        </b>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">

                                                    <div class="progress progress-danger" style="height: 38px;">
                                                        <div class="progress-bar" role="progressbar" style="width:<?php echo $dc['percentage']?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="progress-bar-label align-items-center" style="font-size: 16px; text-shadow: 0 0 1px #000;">Rp <?php echo number_format($dc['nilai_kerjasama'], 0, ",", "."); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-2">
                                                        <h6 class="mb-0"><?php echo $dc['percentage']?>%</h6>
                                                    </div>

                                            </table>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <!-- <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">Admin Holding</h5>
                                        <h6 class="text-muted mb-0">@uinmalang</h6>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Butuh Approval</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/4.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Hank Schrader</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/5.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Dean Winchester</h5>
                                        <h6 class="text-muted mb-0">@imdean</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/1.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">John Dodol</h5>
                                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                                    </div>
                                </div>
                                <div class="px-4">
                                    <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                        Approved</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Pembagian Per-Kategori</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

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