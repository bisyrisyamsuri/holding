<?php
require_once("auth.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="marker/leaflet.awesome-markers/dist/leaflet.awesome-markers.css">

    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css" />

    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <script src="data-map.php"></script>
    <style type="text/css">
        #map {
            height: 740px;
            border-radius: 10px;
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
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Mapping Bisnis UIN Malang</h3>
                            <p class="text-subtitle text-muted">Pilih Pemetaan Berdasarkan Kampus dibawah ini.</p>
                            <div class="btn-group mb-4" role="group" aria-label="Basic example">
                                <button id="kampus1" type="button" class="btn">Kampus 1</button>
                                <button id="kampus2" type="button" class="btn">Kampus 2</button>
                                <button id="kampus3" type="button" class="btn">Kampus 3</button>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Maps</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12">
                            <div class="card">
                                <div id="map" class="card-header">
                                    <script src="https://cdn.leafletjs.com/leaflet/1.6.0/leaflet.js"></script>
                                    <script
                                        src="marker/leaflet.awesome-markers/dist/leaflet.awesome-markers.js"></script>
                                    <script>

                                        var HalalIcon = L.AwesomeMarkers.icon({
                                            icon: 'certificate',
                                            prefix: 'fa',
                                            markerColor: 'green'
                                        });

                                        var ServiceIcon = L.AwesomeMarkers.icon({
                                            icon: 'handshake',
                                            prefix: 'fa',
                                            markerColor: 'red'
                                        });

                                        var PropertyIcon = L.AwesomeMarkers.icon({
                                            icon: 'building',
                                            prefix: 'fa',
                                            markerColor: 'yellow'
                                        });

                                        var MedicIcon = L.AwesomeMarkers.icon({
                                            icon: 'staff-snake',
                                            prefix: 'fa',
                                            markerColor: 'purple'
                                        });

                                        var AkademiIcon = L.AwesomeMarkers.icon({
                                            icon: 'graduation-cap',
                                            prefix: 'fa',
                                            markerColor: 'orange'
                                        });

                                        let locations = [
                                            { name: "Lokasi Kampus 1", lat: -7.951774601837539, lng: 112.60744550307471 },
                                            { name: "Lokasi Kampus 2", lat: -7.9065642516316625, lng: 112.57827697252293 },
                                            { name: "Lokasi Kampus 3", lat: -7.921936802882444, lng: 112.54748557846389 }
                                        ];

                                        let map = L.map("map").setView([-7.960096399038165, 112.61961992341092], 15);

                                        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                        }).addTo(map);

                                        var btn1 = document.getElementById("kampus1").addEventListener("click", function () {
                                            function getData(locations, index) {
                                                return locations[index];
                                            }
                                            let name = getData(locations, 0);

                                            map.setView([name.lat, name.lng], 20);
                                        });
                                        var btn2 = document.getElementById("kampus2").addEventListener("click", function () {
                                            function getData(locations, index) {
                                                return locations[index];
                                            }
                                            let name = getData(locations, 1);

                                            map.setView([name.lat, name.lng], 20);
                                        });
                                        var btn3 = document.getElementById("kampus3").addEventListener("click", function () {
                                            function getData(locations, index) {
                                                return locations[index];
                                            }
                                            let name = getData(locations, 2);

                                            map.setView([name.lat, name.lng], 20);
                                        });
                                        // var marker1 = L.marker([-7.950738267809427, 112.60768291304596]).addTo(map);
                                        // var marker2 = L.marker([-7.950773069320486, 112.60714996711323]).addTo(map);
                                        // var marker3 = L.marker([-7.951650839800158, 112.60705626235107]).addTo(map);
                                        // var marker4 = L.marker([-7.921839320425756, 112.54688882551744]).addTo(map);
                                        // var marker5 = L.marker([-7.921783531556376, 112.54728713353012]).addTo(map);
                                        // var marker6 = L.marker([-7.921915033879249, 112.5474748881489]).addTo(map);
                                        // var marker7 = L.marker([-7.906238022206914, 112.57795090284475]).addTo(map);
                                        // var marker8 = L.marker([-7.906423992089501, 112.57864023051656]).addTo(map);
                                        // var marker9 = L.marker([-7.906195514793395, 112.57894332011543]).addTo(map);
                                        // var marker10 = L.marker([-7.906373514558228, 112.57933760481485]).addTo(map);
                                        // marker1.bindPopup("<b>Perpustakaan UIN!</b><br><img src='https://lh5.googleusercontent.com/p/AF1QipNiLJ-KijmrFBbw06ZXLuxWcEdHGbc_DaPr9Ukt=w408-h306-k-no' width='200' height='150'/><br>Lihat Detail <a href='layout-default.html'>disini</a>");
                                        // marker2.bindPopup("<b>Fakultas SAINTEK!</b><br><img src='https://lh5.googleusercontent.com/p/AF1QipNKltfBomCaL1JrRGkGEhf9pzPkGinP8eRZlbi2=w408-h544-k-no' width='200' height='150'/><br>Lihat Detail <a href='layout-default.html'>disini</a>");
                                        // marker3.bindPopup("<b>Fakultas Syariah!</b><br><img src='https://lh5.googleusercontent.com/p/AF1QipNljjoiJE6Ix1S0v9XowK5N19hDmbPaqDtB8PPY=w408-h272-k-no' width='200' height='150'/><br>Lihat Detail <a href='layout-default.html'>disini</a>");
                                        // marker4.bindPopup("<b>Perpustakaan UIN 2!</b><br><img src='https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=Qg_U1Lw62OKp9Oa_XrMPdw&cb_client=search.gws-prod.gps&w=408&h=240&yaw=76.004&pitch=0&thumbfov=100' width='200' height='150'/><br>Lihat Detail <a href='layout-default.html'>disini</a>");
                                        // marker5.bindPopup("<b>Fakultas Syariah!</b><br><img src='https://lh5.googleusercontent.com/p/AF1QipNljjoiJE6Ix1S0v9XowK5N19hDmbPaqDtB8PPY=w408-h272-k-no' width='200' height='150'/><br>Lihat Detail <a href='layout-default.html'>disini</a>");
                                        // marker6.bindPopup("<b>Fakultas Syariah!</b><br><img src='https://lh5.googleusercontent.com/p/AF1QipNljjoiJE6Ix1S0v9XowK5N19hDmbPaqDtB8PPY=w408-h272-k-no' width='200' height='150'/><br>Lihat Detail <a href='layout-default.html'>disini</a>");
                                        // marker7.bindPopup("<b>Fakultas Syariah!</b><br><img src='https://lh5.googleusercontent.com/p/AF1QipNljjoiJE6Ix1S0v9XowK5N19hDmbPaqDtB8PPY=w408-h272-k-no' width='200' height='150'/><br>Lihat Detail <a href='layout-default.html'>disini</a>");
                                        // marker8.bindPopup("<b>Fakultas Syariah!</b><br><img src='https://lh5.googleusercontent.com/p/AF1QipNljjoiJE6Ix1S0v9XowK5N19hDmbPaqDtB8PPY=w408-h272-k-no' width='200' height='150'/><br>Lihat Detail <a href='layout-default.html'>disini</a>");
                                        // marker9.bindPopup("<b>Fakultas Syariah!</b><br><img src='https://lh5.googleusercontent.com/p/AF1QipNljjoiJE6Ix1S0v9XowK5N19hDmbPaqDtB8PPY=w408-h272-k-no' width='200' height='150'/><br>Lihat Detail <a href='layout-default.html'>disini</a>");
                                        // marker10.bindPopup("<b>Fakultas Syariah!</b><br><img src='https://lh5.googleusercontent.com/p/AF1QipNljjoiJE6Ix1S0v9XowK5N19hDmbPaqDtB8PPY=w408-h272-k-no' width='200' height='150'/><br>Lihat Detail <a href='layout-default.html'>disini</a>");

                                        // Mengambil data dari file data.php menggunakan AJAX
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET', 'data-map.php', true);
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                var data = JSON.parse(xhr.responseText);
                                                for (var i = 0; i < data.length; i++) {
                                                    if (data[i].id_kategori == "1") {
                                                        // var marker = L.marker([data[i].lat, data[i].lon], { icon: L.AwesomeMarkers.icon({ icon: 'home', prefix: 'fas', markerColor: 'red' }) }).addTo(ma p);
                                                        var marker = L.marker([data[i].lat, data[i].lon], { icon: HalalIcon }).addTo(map);
                                                    } else if (data[i].id_kategori == "2") {
                                                        var marker = L.marker([data[i].lat, data[i].lon], { icon: ServiceIcon }).addTo(map);
                                                    } else if (data[i].id_kategori == "3") {
                                                        var marker = L.marker([data[i].lat, data[i].lon], { icon: PropertyIcon }).addTo(map);
                                                    } else if (data[i].id_kategori == "4") {
                                                        var marker = L.marker([data[i].lat, data[i].lon], { icon: MedicIcon }).addTo(map);
                                                    } else if (data[i].id_kategori == "5") {
                                                        var marker = L.marker([data[i].lat, data[i].lon], { icon: AkademiIcon }).addTo(map);
                                                    }
                                                    else {
                                                        var marker = L.marker([data[i].lat, data[i].lon]).addTo(map);
                                                    }

                                                    // var kategori = data[i].id_kategori;
                                                    // var marker;
                                                    // switch (kategori) {
                                                    //     case 1:
                                                    //         var marker = L.marker([data[i].lat, data[i].lon], { icon: HalalIcon }).addTo(map);
                                                    //         break;
                                                    //     case 2:
                                                    //         var marker = L.marker([data[i].lat, data[i].lon], { icon: ServiceIcon }).addTo(map);
                                                    //         break;
                                                    //     default:
                                                    // var marker = L.marker([data[i].lat, data[i].lon]).addTo(map);
                                                    //         break;
                                                    // }
                                                    // marker.bindPopup("<img src='" + data[i].url_gambar + "' style='width:100px;'/> <br> <b>" + data[i].jenis_layanan + "</b> <br>Lihat Detail <a href='layout-default.html'>disini</a>").openPopup();
                                                }
                                            }
                                        }
                                        xhr.send();
                                    </script>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
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

    <script src="assets/js/main.js"></script>
    <script src="assets/js/session.js"></script>
</body>

</html>