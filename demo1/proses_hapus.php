<?php
include '../konek.php';
$id = $_GET["id"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM administrasi WHERE id_administrasi ='$id' ";
    $hasil_query = mysqli_query($konek, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($konek).
       " - ".mysqli_error($konek));
    } else {
      echo "<script>alert('Data berhasil ditambah.');window.location='main2.php?halaman=daftar_administrasi';</script>";
    }