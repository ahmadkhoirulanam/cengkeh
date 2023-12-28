<?php
session_start();
include 'konek.php';
$level = "pemohon";
$query = "SELECT * FROM profil_desa";
$result = mysqli_query($konek, $query);
// jika data gagal diambil maka akan tampil error berikut
if (!$result) {
    die("Query Error: " . mysqli_errno($konek) .
        " - " . mysqli_error($konek));
}
// mengambil data dari database
$data = mysqli_fetch_assoc($result);
// apabila data tidak ada pada database maka akan dijalankan perintah ini
if (!count($data)) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $data['nama_desa']; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="muka/img/favicon.ico" rel="icon">

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
                    <h1 class="text-primary m-0">Desa <?php echo $data['nama_desa']; ?></h1>
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
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Selamat Datang<br>Di Desa <?php echo $data['nama_desa']; ?></h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Kedumulyo adalah desa di kecamatan Sukolilo, Pati, Jawa Tengah, Indonesia. Desa yang terletak sekitar 4 km arah timur laut dari ibu kota kecamatan Sukolilo ini terletak di lereng pegunungan Kapur Utara</p>
                            <a href="login.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Ajukan Surat</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-5" id="features">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="muka/img/2.jpeg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="muka/img/1.jpeg" style="margin-top: 55%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="muka/img/3.jpeg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="muka/img/4.jpeg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Profil Desa</h5>
                        <h1 class="mb-4">Selamat Datang Di Desa <?php echo $data['nama_desa']; ?></h1>
                        <p class="mb-4">Kedumulyo adalah desa di kecamatan Sukolilo, Pati, Jawa Tengah, Indonesia. Desa yang terletak sekitar 4 km arah timur laut dari ibu kota kecamatan Sukolilo ini terletak di lereng pegunungan Kapur Utara</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">5057</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Jumlah</p>
                                        <h6 class="text-uppercase mb-0">Penduduk</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">302</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Luas</p>
                                        <h6 class="text-uppercase mb-0">Wilayah</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" id="unggulan">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Desa <?php echo $data['nama_desa']; ?></h5>
                    <h1 class="mb-5">produk_unggulan</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <?php
                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                    $query = "SELECT * FROM produk_unggulan";
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
                        <div class="testimonial-item bg-transparent border rounded p-4">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                            <?php
                            $d = $row['keterangan'];
                            ?>
                            <p><?php echo $d; ?></p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="demo1/gambar/<?php echo $row['foto']; ?>" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h5 class="mb-1"><?php echo $row['nama_unggulan']; ?></h5>
                                    <small>Profession</small>
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
        <!-- Testimonial End -->

        <div class="container-xxl py-5" id="contack">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">GIS Wisata</h5>
                    <h1 class="mb-5">Desa <?php echo $data['nama_desa']; ?></h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Email</h5>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>book@example.com</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Telepon</h5>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>info@example.com</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">WA</h5>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>tech@example.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100" src="map_baru/index.html" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>

                </div>
            </div>
        </div>


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">

            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#"><?php echo $data['nama_desa']; ?></a>, All Right Reserved.</a>
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