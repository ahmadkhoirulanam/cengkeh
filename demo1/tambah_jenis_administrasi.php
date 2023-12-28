<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <form method="POST">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">FORM TAMBAH Jenis Administrasi</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                               
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama..">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button name="simpan" class="btn btn-success btn-sm">Simpan</button>
                        <a href="?halaman=tampil_user" class="btn btn-default btn-sm">Batal</a>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {    
    $nama = $_POST['nama'];
    $sql = "INSERT INTO jenis_administrasi (id_jenis_administrasi, nama_jenis) VALUES (NULL, '$nama')";
    $query = mysqli_query($konek, $sql);

    if ($query) {
        echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=kelola_jenis_administrasi">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=kelola_jenis_administrasi">';
    }
}
?>