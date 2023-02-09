<?php
require_once("auth.php");
require_once('database/koneksi.php');
$id=$_GET["id_user"];
    $layanan=mysqli_query($conn, "SELECT * FROM tb_jenislayanan");
    $user=mysqli_query($conn, "SELECT * , tb_user.username FROM tb_userbisnisprofile  JOIN tb_user ON tb_user.id_user = tb_userbisnisprofile.id_user WHERE tb_user.id_user= '$id'");
    $usr=mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user='$id'");
    $kerjasama=mysqli_query($conn, "SELECT * FROM tb_jeniskerjasama");

    while ($row =mysqli_fetch_assoc($usr) ) {
        $username = $row["username"];

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Approval</title>
    
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
                                <h3>Form Approval</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="user_approval.php">User Approval</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Form Approval</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                <section class="section">
                    <div class="row">
                                        
                                    
                            <!-- // Basic Vertical form layout section end -->
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="card">
                                            
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form action="database/insert_approve.php" method="post" class="form form-vertical">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="first-name-icon">Nama User</label>
                                                                        <div class="position-relative">
                                                                         <select class="form-select" name="user">
                                                                        <option type="text" class="form-control" id="first-name-icon" value="<?=$id?>"><?=$username?></option>
                                                                         </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="target-id-icon">Jenis Layanan</label>
                                                                        <div class="position-relative">
                                                                        <select class="form-select" id="basicSelect" name="layanan" id="kategori">
                                                                            <option selected > Pilih Layanan </option>
                                                                            <?php 
                                                                            while($data=mysqli_fetch_array($layanan)) {
                                                                            ?>
                                                                            <option value="<?=$data['id_layanan']?>"><?=$data['jenis_layanan']?></option> 
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="target-id-icon">Jenis Kerjasama</label>
                                                                        <div class="position-relative">
                                                                        <select class="form-select" id="basicSelect" name="kerjasama" id="kategori">
                                                                            <option selected > Pilih Kerjasama </option>
                                                                            <?php 
                                                                            while($data=mysqli_fetch_array($kerjasama)) {
                                                                            ?>
                                                                            <option value="<?=$data['id_kerjasama']?>"><?=$data['keterangan']?></option> 
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="target-id-icon">Nilai Kerjasama</label>
                                                                        <div class="position-relative">
                                                                            <input type="text" name="n_kerjasama" class="form-control"
                                                                                placeholder="Masukan Nilai Kerjasama"
                                                                                id="target-id-icon">
                                                                            <div class="form-control-icon">
                                                                            <i class="bi bi-cash"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="form-check">
                                                                            <div class="checkbox">
                                                                                <input type="checkbox" name="tindakan" id="checkbox1" class="form-check-input" value="Disetujui">
                                                                                <label for="checkbox1">Disetujui</label>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="position-relative">
                                                                            <input type="text" name="tindakan" class="form-control"
                                                                                placeholder="Masukan Nilai Kerjasama"
                                                                                id="target-id-icon">
                                                                            <div class="form-control-icon">
                                                                            <i class="bi bi-cash"></i>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 d-flex justify-content-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                                    <button type="reset"
                                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
