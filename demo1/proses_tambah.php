<?php
// memanggil file konek.php untuk melakukan konek database
include '../konek.php';

	// membuat variabel untuk menampung data dari form
  $nama   = $_POST['nama'];
  $deskripsi     = $_POST['deskripsi'];
  $id_jenis_administrasi    = $_POST['id_jenis_administrasi'];
  $gambar_produk = $_FILES['gambar_produk']['name'];
  $link   = $_POST['link'];
  $periode   = $_POST['periode'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gambar_produk != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO administrasi (nama, keterangan, id_jenis_administrasi, foto, link, periode) VALUES ('$nama', '$deskripsi', '$id_jenis_administrasi','$nama_gambar_baru','$link','$periode')";
                  $result = mysqli_query($konek, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($konek).
                           " - ".mysqli_error($konek));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='main2.php?halaman=daftar_administrasi';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO administrasi (nama, keterangan, id_jenis_administrasi, foto, link, periode) VALUES ('$nama', '$deskripsi', '$id_jenis_administrasi','$nama_gambar_baru','$link','$periode')";
                  $result = mysqli_query($konek, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($konek).
                           " - ".mysqli_error($konek));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
                    echo '<meta http-equiv="refresh" content="3; url=?halaman=kelola_jenis_administrasi">';
                    
                  }
}

 
