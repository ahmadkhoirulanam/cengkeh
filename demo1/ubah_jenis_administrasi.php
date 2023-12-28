<!-- <?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
    if(isset($_GET['id_jenis_administrasi'])){
        $id_jenis_administrasi = $_GET['id_jenis_administrasi'];
        $sql = "SELECT * FROM jenis_administrasi WHERE id_jenis_administrasi='$id_jenis_administrasi'";
        $query = mysqli_query($konek,$sql);
        $data=mysqli_fetch_array($query,MYSQLI_BOTH);
        $id_jenis_administrasi = $data['id_jenis_administrasi'];     
        $nama = $data['nama_jenis'];
    }
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM UBAH USER</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												
												<div class="form-group">
													<label>Nama</label>
													<input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" placeholder="Nama..">
												</div>
												
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success btn-sm">Ubah</button>
									<a href="?halaman=tampil_user" class="btn btn-default btn-sm">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];
	$nama = $data['nama'];
		$jekel = $data['jekel'];
		$tempat = $data['tempat'];
		$tanggal = $data['tanggal'];
		$alamat = $data['alamat'];
		$status_warga = $data['status_warga'];

    $sql = "UPDATE data_user SET
    password='$password',
    hak_akses='$hak_akses',
	nama='$nama' WHERE nik='$nik'";
    $query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_user">';
	  }
}
?> -->

<?php
	if(isset($_GET['nik'])){
		$nik = $_GET['nik'];
		$tampil_nik = "SELECT * FROM data_user WHERE nik=$nik";
		$query = mysqli_query($konek,$tampil_nik);
		$data = mysqli_fetch_array($query,MYSQLI_BOTH);
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat_lahir'];
		$tanggal = $data['tanggal_lahir'];
		$jekel = $data['jekel'];
		$agama = $data['agama'];
		$alamat = $data['alamat'];
		$telepon = $data['telepon'];
		$status_warga = $data['status_warga'];
	}
	
?>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH USER</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIK</label>
													<input type="number" name="id_jenis_administrasi" class="form-control" placeholder="NIK Anda.." value="<?= $id_jenis_administrasi;?>" readonly>
												</div>
												<div class="form-group">
													<label>Nama Lengkap</label>
													<input type="text" name="nama_jenis" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $nama;?>">
												</div>
												
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success">Ubah</button>
									<a href="?halaman=beranda" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
	$id_jenis_administrasi = $_POST['id_jenis_administrasi'];
	$nama_jenis = $_POST['nama_jenis'];

    

	$sql = "UPDATE jenis_administrasi SET
	nama_jenis='$nama_jenis'
	WHERE id_jenis_administrasi=$id_jenis_administrasi";
	$query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=kelola_jenis_administrasi">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=kelola_jenis_administrasi">';
	  }
}
	
?>