<?php
require_once("auth.php");
require_once('database/koneksi.php');
$kerjasama = "SELECT * FROM tb_jeniskerjasama";
$data = mysqli_query($conn, $kerjasama);
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
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
                            <h3>Data Kerjasama</h3>                            
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Kerjasama</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary mb-3"
                            href="tambah_kerjasama.php">Tambah Kerjasama</a>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Kerjasama</th>                                        
                                        <th>Aksi</th>
                                    </tr>                                    
                                </thead>
                                <tbody>   
                                <?php
                                    $nomor_urut=1;                                    
                                ?>                                 
                                    <tr>
                                    <?php                                
                                       
                                        foreach ($data as $row):
                                            ?>
                                        <td><?php echo $nomor_urut++ ?></td>
                                        <td><?php echo $row['keterangan']?></td>                             
                                        <td>
                                            <a type="button" id="update" class="btn btn-outline-success" data-bs-toggle="modal"
                                                data-bs-target="#inlineForm"
                                                data-id="<?php echo $row['id_kerjasama'];?>"
                                                data-keterangan="<?php echo $row['keterangan'];?>">
                                                Update
                                            </a>
                                            <a type=button class="btn btn-outline-danger" href="database/del_kerjasama.php?id_kerjasama=<?=$row['id_kerjasama']?>">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>     
                                    </tr>
                                    <?php
                                       endforeach
                                       ?>  
                                </tbody>                               
                            </table>
                            <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel33">Update Kategori</h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form action="database/u-kerjasama.php" method="post">
                                                            <div class="modal-body">
                                                            <input type="hidden" id="id_update" name="id_update">
                                                                <label>Jenis Kerjasama: </label>
                                                                <div class="form-group">
                                                                    <input type="text" id="kerjasama_update" name="kerjasama_update"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" class="btn btn-primary ml-1">Submit</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
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
    <script>
        $(document).ready(function(){
        $(document).on('click','#update',function(){ 
            var id = $(this).data('id');
            var keterangan = $(this).data('keterangan');
            $('#id_update').val(id);
            $('#kerjasama_update').val(keterangan);
        })
        })
    </script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>

</body>

</html>