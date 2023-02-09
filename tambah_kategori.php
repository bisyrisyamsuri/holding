<?php
require_once("auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    
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
                                <h3>Tambah Kategori</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
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
                                                    <form action="database/insert_kategori.php" method="post" class="form form-vertical">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="first-name-icon">Nama Kategori</label>
                                                                        <div class="position-relative">
                                                                            <input type="text" name="kategori" class="form-control"
                                                                                placeholder="Masukan Nama Kategori"
                                                                                id="first-name-icon">
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-archive"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="target-id-icon">Target Capaian</label>
                                                                        <div class="position-relative">
                                                                            <input type="text" name="target" class="form-control"
                                                                                placeholder="Masukan Target Capaian"
                                                                                id="target-id-icon">
                                                                            <div class="form-control-icon">
                                                                            <i class="bi bi-cash"></i>
                                                                            </div>
                                                                        </div>
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
<script>
    // register desired plugins...
	FilePond.registerPlugin(
        // validates the size of the file...
        FilePondPluginFileValidateSize,
        // validates the file type...
        FilePondPluginFileValidateType,

        // calculates & dds cropping info based on the input image dimensions and the set crop ratio...
        FilePondPluginImageCrop,
        // preview the image file type...
        FilePondPluginImagePreview,
        // filter the image file
        FilePondPluginImageFilter,
        // corrects mobile image orientation...
        FilePondPluginImageExifOrientation,
        // calculates & adds resize information...
        FilePondPluginImageResize,
    );
    
    // Filepond: Basic
    FilePond.create( document.querySelector('.basic-filepond'), { 
        allowImagePreview: false,
        allowMultiple: false,
        allowFileEncode: false,
        required: false
    });

    // Filepond: Multiple Files
    FilePond.create( document.querySelector('.multiple-files-filepond'), { 
        allowImagePreview: false,
        allowMultiple: true,
        allowFileEncode: false,
        required: false
    });
    FilePond.create( document.querySelector('.Multiple-files-filepond'), { 
        allowImagePreview: false,
        allowMultiple: true,
        allowFileEncode: false,
        required: false
    });

    // Filepond: With Validation
    FilePond.create( document.querySelector('.with-validation-filepond'), { 
        allowImagePreview: false,
        allowMultiple: true,
        allowFileEncode: false,
        required: true,
        acceptedFileTypes: ['image/png'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

    // Filepond: ImgBB with server property
    FilePond.create( document.querySelector('.imgbb-filepond'), { 
        allowImagePreview: false, 
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort) => {
                // We ignore the metadata property and only send the file

                const formData = new FormData();
                formData.append(fieldName, file, file.name);

                const request = new XMLHttpRequest();
                // you can change it by your client api key
                request.open('POST', 'https://api.imgbb.com/1/upload?key=762894e2014f83c023b233b2f10395e2');

                request.upload.onprogress = (e) => {
                    progress(e.lengthComputable, e.loaded, e.total);
                };

                request.onload = function() {
                    if (request.status >= 200 && request.status < 300) {
                        load(request.responseText);
                    }
                    else {
                        error('oh no');
                    }
                };

                request.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if(this.status == 200) {
                            let response = JSON.parse(this.responseText);
                            
                            Toastify({
                                text: "Success uploading to imgbb! see console f12",
                                duration: 3000,
                                close:true,
                                gravity:"bottom",
                                position: "right",
                                backgroundColor: "#4fbe87",
                            }).showToast();
                
                            console.log(response);
                        } else {
                            Toastify({
                                text: "Failed uploading to imgbb! see console f12",
                                duration: 3000,
                                close:true,
                                gravity:"bottom",
                                position: "right",
                                backgroundColor: "#ff0000",
                            }).showToast();   

                            console.log("Error", this.statusText);
                        }
                    }
                };

                request.send(formData);
            }
        }
    });

    // Filepond: Image Preview
    FilePond.create( document.querySelector('.image-preview-filepond'), { 
        allowImagePreview: true, 
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

    // Filepond: Image Crop
    FilePond.create( document.querySelector('.image-crop-filepond'), { 
        allowImagePreview: true, 
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: true,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

        // Filepond: Image Exif Orientation
    FilePond.create( document.querySelector('.image-exif-filepond'), { 
        allowImagePreview: true, 
        allowImageFilter: false,
        allowImageExifOrientation: true,
        allowImageCrop: false,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

    // Filepond: Image Filter
    FilePond.create( document.querySelector('.image-filter-filepond'), {
        allowImagePreview: true, 
        allowImageFilter: true,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        imageFilterColorMatrix: [
            0.299, 0.587, 0.114, 0, 0,
            0.299, 0.587, 0.114, 0, 0,
            0.299, 0.587, 0.114, 0, 0,
            0.000, 0.000, 0.000, 1, 0
        ],
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });

    // Filepond: Image Resize
    FilePond.create( document.querySelector('.image-resize-filepond'), {
        allowImagePreview: true, 
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        allowImageResize: true,
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        imageResizeMode: 'cover',
        imageResizeUpscale: true,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });
    
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
            
        })
        $("#hint").summernote({
            height: 100,
            toolbar: false,
            placeholder: 'type with apple, orange, watermelon and lemon',
            hint: {
                words: ['apple', 'orange', 'watermelon', 'lemon'],
                match: /\b(\w{1,})$/,
                search: function (keyword, callback) {
                    callback($.grep(this.words, function (item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });

</script>

<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/session.js"></script>
</body>

</html>
