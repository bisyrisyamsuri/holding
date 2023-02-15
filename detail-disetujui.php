<?php
require_once("auth.php");
require_once('database/koneksi.php');
$id_user = $_GET['id_bisnis'];
$sql = "SELECT *, tb_user.username, tb_jenislayanan.jenis_layanan, tb_jeniskerjasama.keterangan, tb_userbisnisprofile.cash_flow, tb_userbisnisprofile.proposal_bisnis FROM tb_bisnis JOIN tb_user ON tb_user.id_user=tb_bisnis.id_user JOIN tb_jenislayanan ON tb_bisnis.id_jenispelayanan=tb_jenislayanan.id_layanan JOIN tb_jeniskerjasama ON tb_bisnis.jenis_kerjasama=tb_jeniskerjasama.id_kerjasama JOIN tb_userbisnisprofile ON tb_bisnis.id_user=tb_userbisnisprofile.id_user WHERE id_bisnis= $id_user";
$data = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/summernote/summernote-lite.min.css">
    
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    
    <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>


<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
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
            
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Data Detail Disetujui</h3>                            
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"> <a href="data-disetujui.php">Data Disetujui</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Disetujui</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                <?php
                while ($bis = mysqli_fetch_array($data) ){
                    
                ?>
                    <div class="card">
                    <img src="assets/images/bg/setuju.png" class="position-absolute end-0" style="width: 300px; margin-top:100px; margin-right:100px;" alt="Image">
                        <div class="card-header">
                            <h4 class="card-title">Username: <?php echo $bis['username']?></h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title">Jenis Pelayanan Terpilih: </h1>
                            <span style="font-size:20px;"><?=$bis['jenis_layanan']?></span>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title">Jenis Kerjasama Terpilih: </h1>
                            <span style="font-size:20px;"><?=$bis['keterangan']?></span>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title">Nilai Kerjasama: </h1>
                            <span style="font-size:20px;"><?=$bis['nilai_kerjasama']?></span>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title">Tanggal Disetujui</h1>
                            <span style="font-size:20px;"><?= $bis['date']?></span>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title">Proposal Bisnis</h1>
                            <object data="database/<?php echo $bis['proposal_bisnis']?>" width="100%" height="500px" 
                                style="border-radius:10px; box-shadow: 1px 3px 10px #85CDFD;"></object>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title">Cash Flow</h1>
                            <object data="database/<?php echo $bis['cash_flow']?>" width="100%" height="500px" 
                                style="border-radius:10px; box-shadow: 1px 3px 10px #85CDFD;"></object>
                        </div>
                    </div>
                    <?php
                    }
                ?>
                </section>

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
    
<!-- filepond validation -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- image editor -->
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<!-- toastify -->
<script src="assets/vendors/toastify/toastify.js"></script>

<!-- filepond -->
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/vendors/summernote/summernote-lite.min.js"></script>


<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/session.js"></script>
</body>

</html>
