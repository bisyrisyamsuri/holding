<aside>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                        $sql = "SELECT COUNT(*) FROM tb_bisnis";
                                        $data_chart = query($sql);
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        $jumlah_kerjasama = $row[0];
                                        foreach ($data_chart as $dc):
                                            ?>
                                            <h6 class="text-muted font-semibold">Jumlah Kerjasama</h6>
                                            <h6 class="font-extrabold mb-0">
                                                <?php echo $jumlah_kerjasama ?>
                                            </h6>
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
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldDiscovery"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                        $sql = "SELECT COUNT(*) FROM tb_jenislayanan";
                                        $data_chart = query($sql);
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        $jumlah_layanan = $row[0]; foreach ($data_chart as $dc):
                                            ?>
                                            <h6 class="text-muted font-semibold">Jumlah Layanan</h6>
                                            <h6 class="font-extrabold mb-0">
                                                <?php echo $jumlah_layanan ?>
                                            </h6>
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
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldTicket"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                        $sql = "SELECT COUNT(*) FROM tb_kategoribisnis";
                                        $data_chart = query($sql);
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        $jumlah_kategori = $row[0]; foreach ($data_chart as $dc):
                                            ?>
                                            <h6 class="text-muted font-semibold">Jumlah Kategori</h6>
                                            <h6 class="font-extrabold mb-0">
                                                <?php echo $jumlah_kategori ?>
                                            </h6>
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
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldPaper-Plus"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Type Kerjasama</h6>
                                        <h6 class="font-extrabold mb-0">3</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row" onload=getDataChart()>
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
                        </div> -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <?php
                            $sql =
                                "SELECT tb_bisnis.id_jenispelayanan, tb_jenislayanan.id_layanan, tb_kategoribisnis.id_kategori, tb_kategoribisnis.target_capaian,  tb_kategoribisnis.kategori_bisnis,
                                        SUM(nilai_kerjasama) as nilai_kerjasama,
                                        CONCAT(ROUND((SUM(nilai_kerjasama) / (target_capaian))*100,2),'%') as percentage
                                        FROM tb_bisnis
                                        JOIN tb_jenislayanan
                                        ON tb_bisnis.id_jenispelayanan = tb_jenislayanan.id_layanan
                                        JOIN tb_kategoribisnis
                                        ON tb_jenislayanan.id_kategori = tb_kategoribisnis.id_kategori
                                        WHERE tb_bisnis.id_user = '$_SESSION[id_user]'
                                        GROUP BY tb_kategoribisnis.kategori_bisnis";

                            $data_chart = query($sql); foreach ($data_chart as $dc):
                                ?>
                                <div class="card-header">
                                    <h4>
                                        <?php echo $dc['kategori_bisnis'] ?>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <svg class="bi text-success" width="32" height="32" fill="blue"
                                                    style="width:10px">
                                                    <use
                                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                </svg>
                                                <b>
                                                    <p class="mb-0 ms-3">Target Bisnis</p>
                                                </b>
                                            </div>
                                        </div>
                                        <div class="col-12  mt-2">
                                            <div class="progress progress-alert-dark" style="height:40px;">
                                                <div class="progress-bar" role="progressbar" style="width: 100%"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="progress-bar-label" style="font-size: 16px;">Rp
                                                        <?php echo number_format($dc['target_capaian'], 0, ",", "."); ?>
                                                    </span>
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
                                                <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                    style="width:10px">
                                                    <use
                                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                </svg>
                                                <b>
                                                    <p class="mb-0 ms-3">Pencapaian Saat Ini</p>
                                                </b>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">

                                            <div class="progress progress-danger" style="height: 38px;">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width:<?php echo $dc['percentage'] ?>%" aria-valuenow="0"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <span class="progress-bar-label align-items-center"
                                                        style="font-size: 16px; text-shadow: 0 0 1px #000;">Rp <?php echo number_format($dc['nilai_kerjasama'], 0, ",", "."); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <h6 class="mb-0">
                                                    <?php echo $dc['percentage'] ?>%
                                                </h6>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <?php
                            endforeach
                            ?>
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
                </div>
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
                </div> -->
            </div>
        </section>
    </div>
</aside>