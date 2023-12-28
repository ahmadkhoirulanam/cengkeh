<?php
// memanggil file konek.php untuk melakukan konek database
include '../konek.php';

// membuat variabel untuk menampung data dari form
$id = $_POST['id'];
$kecamatan   = $_POST['kecamatan'];
$tanah     = $_POST['tanah'];
$produksi   = $_POST['produksi'];
//cek dulu jika merubah gambar produk jalankan coding ini

  // jalankan query UPDATE berdasarkan ID yang produknya kita edit
  $query  = "UPDATE pemalang SET kecamatan = '$kecamatan', tanah = '$tanah', produksi = '$produksi'";
  $query .= "WHERE id = '$id'";
  $result = mysqli_query($konek, $query);
  // periska query apakah ada error
  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($konek) .
      " - " . mysqli_error($konek));
  } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Data berhasil ditambah ya.');window.location='main2.php?halaman=daftar_administrasi';</script>";
    
  }

