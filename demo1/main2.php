<?php
session_start();
if (isset($_SESSION['password']) == "" || ($_SESSION['hak_akses']) == "") {
	header('location:login.php');
} else {
	$hak_akses = $_SESSION['hak_akses'];
}
?>
<?php include 'header.php'; ?>
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="main2.php">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">fitur</h4>
				</li>
				<?php
				if ($hak_akses == "Rt") {
				?> 
					<li class="nav-item">
						<a data-toggle="collapse" href="#adminsitasi">
							<i class="fas fa-table"></i>
							<p>Kelola Website</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="adminsitasi">
							<ul class="nav nav-collapse">
								<li>
									<a href="?halaman=kelola_jenis_administrasi">
										<span class="sub-item">Perhitungan K-Means</span>
									</a>
								</li>
								<li>
									<a href="?halaman=daftar_administrasi">
										<span class="sub-item">Pesebaran Cengkeh</span>
									</a>
								</li>
								<li>
									<a href="?halaman=profil_desa">
										<span class="sub-item">Kelola Profil</span>
									</a>
								</li>
								<li>
									<a href="?halaman=produk_unggulan">
										<span class="sub-item">Kelola Berita</span>
									</a>
								</li>
							</ul>
						</div>
					</li>

					<!-- <li class="nav-item">
						<a data-toggle="collapse" href="#adminsitasi">
							<i class="fas fa-table"></i>
							<p>Pesebaran Cengkeh</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="adminsitasi">
							<ul class="nav nav-collapse">								
								<li>
									<a href="?halaman=profil_desa">
										<span class="sub-item">Kelola Cengkeh</span>
									</a>
								</li>
								<li>
									<a href="?halaman=produk_unggulan">
										<span class="sub-item">Perhitungan K-Means</span>
									</a>
								</li>
							</ul>
						</div>
					</li> -->


					<li class="nav-item">
						<a href="?halaman=tampil_user">
							<i class="fas fa-user-alt"></i>
							<p>Data User</p>
						</a>
					</li>
					<!-- <li class="nav-item">
						<a href="?halaman=permohonan_surat">
							<i class="far fa-calendar-check"></i>
							<p>Cetak Surat</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="?halaman=surat_dicetak">
							<i class="far fa-calendar-check"></i>
							<p>Surat Selesai</p>
						</a>
					</li> -->
				<?php
				} elseif ($hak_akses == "Rt2") {
				?>
					<li class="nav-item">
						<a href="?halaman=tampil_user">
							<i class="fas fa-user-alt"></i>
							<p>Data User</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="?halaman=permohonan_surat">
							<i class="far fa-calendar-check"></i>
							<p>Cetak Surat</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="?halaman=surat_dicetak">
							<i class="far fa-calendar-check"></i>
							<p>Surat Selesai</p>
						</a>
					</li>
				<?php
				} elseif ($hak_akses == "Rt3") {
				?>
					<li class="nav-item">
						<a href="?halaman=tampil_user">
							<i class="fas fa-user-alt"></i>
							<p>Data User</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="?halaman=permohonan_surat">
							<i class="far fa-calendar-check"></i>
							<p>Cetak Surat</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="?halaman=surat_dicetak">
							<i class="far fa-calendar-check"></i>
							<p>Surat Selesai</p>
						</a>
					</li>
				<?php
				} elseif ($hak_akses == "Lurah") {
				?>
					
					<li class="nav-item">
						<a data-toggle="collapse" href="#tables">
							<i class="fas fa-envelope"></i>
							<p>Surat</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="tables">
							<ul class="nav nav-collapse">
								<li>
									<a href="?halaman=laporan_perbulan">
										<span class="sub-item">Daftar Pengajuan</span>
									</a>
								</li>
								<li>
									<a href="?halaman=laporan_pertahun">
										<span class="sub-item">Laporan Pengajuan</span>
									</a>
								</li>

							</ul>
						</div>
					</li>
				<?php
				}
				?>
				<li class="mx-4 mt-2">
					<a href="logout.php" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="icon-logout"></i> </span>Logout</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->

<div class="main-panel">
	<div class="content">
		<?php
		if (isset($_GET['halaman'])) {
			$hal = $_GET['halaman'];
			switch ($hal) {
				case 'beranda';
					include 'beranda.php';
					break;
				case 'ubah_pemohon';
					include 'ubah_pemohon.php';
					break;
				case 'tampil_pemohon';
					include 'tampil_pemohon.php';
					break;
				case 'request_sktm';
					include 'request_sktm.php';
					break;
				case 'request_sku';
					include 'request_sku.php';
					break;
				case 'request_skp';
					include 'request_skp.php';
					break;
				case 'request_skd';
					include 'request_skd.php';
					break;
				case 'tampil_status';
					include 'status_request.php';
					break;
				case 'belum_acc_sktm';
					include 'belum_acc_sktm.php';
					break;
				case 'belum_acc_sku';
					include 'belum_acc_sku.php';
					break;
				case 'belum_acc_skp';
					include 'belum_acc_skp.php';
					break;
				case 'belum_acc_skd';
					include 'belum_acc_skd.php';
					break;
				case 'sudah_acc_sktm';
					include 'acc_sktm.php';
					break;
				case 'sudah_acc_sku';
					include 'acc_sku.php';
					break;
				case 'sudah_acc_skp';
					include 'acc_skp.php';
					break;
				case 'sudah_acc_skd';
					include 'acc_skd.php';
					break;
				case 'detail_sktm';
					include 'detail_sktm.php';
					break;
				case 'detail_sku';
					include 'detail_sku.php';
					break;
				case 'detail_skp';
					include 'detail_skp.php';
					break;
				case 'detail_skd';
					include 'detail_skd.php';
					break;
				case 'cetak_sktm';
					include 'cetak_sktm.php';
					break;
				case 'tampil_user';
					include 'tampil_user.php';
					break;
				case 'tambah_user';
					include 'tambah_user.php';
					break;
				case 'ubah_user';
					include 'ubah_user.php';
					break;
				case 'view_sktm';
					include 'view_sktm.php';
					break;
				case 'view_sku';
					include 'view_sku.php';
					break;
				case 'view_skp';
					include 'view_skp.php';
					break;
				case 'view_skd';
					include 'view_skd.php';
					break;
				case 'view_cetak_sktm';
					include 'view_cetak_sktm.php';
					break;
				case 'view_cetak_sku';
					include 'view_cetak_sku.php';
					break;
				case 'view_cetak_skp';
					include 'view_cetak_skp.php';
					break;
				case 'view_cetak_skd';
					include 'view_cetak_skd.php';
					break;
				case 'surat_dicetak';
					include 'surat_dicetak.php';
					break;
				case 'laporan_perbulan';
					include 'laporan_perbulan.php';
					break;
				case 'laporan_pertahun';
					include 'laporan_pertahun.php';
					break;
				case 'permohonan_surat';
					include 'permohonan_surat.php';
					break;
				case 'kelola_jenis_administrasi';
					include 'jenis_administrasi.php';
					break;
				case 'ubah_jenis_administrasi';
					include 'ubah_jenis_administrasi.php';
					break;

				case 'tambah_jenis_administrasi';
					include 'tambah_jenis_administrasi.php';
					break;
				case 'daftar_administrasi';
					include 'daftar_administrasi.php';
					break;
				case 'tambah_administrasi';
					include 'tambah_administrasi.php';
					break;
				case 'ubah_administrasi';
					include 'ubah_administrasi.php';
					break;
				case 'hapus_administrasi';
					include 'proses_hapus.php';
					break;
				case 'profil_desa';
					include 'profil_desa.php';
					break;
				case 'produk_unggulan';
					include 'produk_unggulan.php';
					break;
				case 'tambah_unggulan';
					include 'tambah_unggulan.php';
					break;
				case 'ubah_produk_unggulan';
					include 'ubah_produk_unggulan.php';
					break;
				case 'hapus_produk_unggulan';
					include 'proses_hapus_produk_unggulan.php';
					break;
				default:
					echo "<center>HALAMAN KOSONG</center>";
					break;
			}
		} else {
			include 'beranda2.php';
		}
		?>
	</div>
	<?php include 'footer.php'; ?>