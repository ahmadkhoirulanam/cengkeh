<?php
    session_start();
    include 'konek.php';
    $level = "pemohon";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="muka/lib/animate/animate.min.css" rel="stylesheet">
    <link href="muka/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="muka/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="muka/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="muka/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0">Desa Kedumulyo</h1>
                    <!-- <img src="muka/img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="#features" class="nav-item nav-link">Profil</a>
                        <a href="#unggulan" class="nav-item nav-link">Produk Unggulan</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Administrasi</a>
                            <div class="dropdown-menu m-0">
                                <?php
                                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                                $query = "SELECT * FROM jenis_administrasi";
                                $result = mysqli_query($konek, $query);
                                //mengecek apakah ada error ketika menjalankan query
                                if (!$result) {
                                    die("Query Error: " . mysqli_errno($konek) .
                                        " - " . mysqli_error($konek));
                                }

                                //buat perulangan untuk element tabel dari data mahasiswa
                                $no = 1; //variabel untuk membuat nomor urut
                                // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                // kemudian dicetak dengan perulangan while
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                     <a href="http://localhost/surat-keterangan-desa/administrasi.php?id=<?php echo $row['id_jenis_administrasi']; ?>" class="dropdown-item"><?php echo $row['nama_jenis']; ?></a>

                                <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                }
                                ?>

                            </div>
                        </div>
                        <a href="#contack" class="nav-item nav-link">Hubungi Kami</a>
                    </div>
                    <a href="pegawai.php" class="btn btn-primary py-2 px-4">Login Admin</a>
                </div>
            </nav>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Daftar Administrasi</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Administrasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Daftar Administrasi</h5>
                    <h1 class="mb-5">
                        <?php 
                           $id = ($_GET["id"]);
                        ?>
                        Di Desa Kedumulyo
                    </h1>
                </div>
                <div class="row g-4">
                   
                    <?php
                        // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                        $query = "SELECT * FROM `administrasi` WHERE `id_jenis_administrasi`='$id'";
                        $result = mysqli_query($konek, $query);
                        //mengecek apakah ada error ketika menjalankan query
                        if (!$result) {
                            die("Query Error: " . mysqli_errno($konek) .
                                " - " . mysqli_error($konek));
                        }

                        //buat perulangan untuk element tabel dari data mahasiswa
                        $no = 1; //variabel untuk membuat nomor urut
                        // hasil query akan disimpan dalam variabel $data dalam bentuk array
                        // kemudian dicetak dengan perulangan while
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                             <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="service-item rounded pt-3">
                                    <div class="p-4">
                                    <img src="demo1/gambar/<?php echo $row['foto']; ?>" style="width: 200px;height: 200px;"><br><br>
                                        <h5><?php echo $row['nama']; ?>-<?php echo $row['periode']; ?></h5>
                                        <p><?php echo substr($row['keterangan'], 0, 85); ?>...</p>
                                        <a class="btn btn-success py-3 px-5 mt-2" href="<?php echo $row['link']; ?>" target="_blank" >Lihat</a>
                                    </div>
                                </div>
                            </div>

                        <?php
                            $no++; //untuk nomor urut terus bertambah 1
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Service End -->
        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="muka/lib/wow/wow.min.js"></script>
    <script src="muka/lib/easing/easing.min.js"></script>
    <script src="muka/lib/waypoints/waypoints.min.js"></script>
    <script src="muka/lib/counterup/counterup.min.js"></script>
    <script src="muka/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="muka/lib/tempusdominus/js/moment.min.js"></script>
    <script src="muka/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="muka/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="muka/js/main.js"></script>
</body>

</html>