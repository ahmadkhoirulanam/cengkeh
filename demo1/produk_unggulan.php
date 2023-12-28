<?php 

include '../konek.php';
date_default_timezone_set('Asia/Jakarta');
?>
<?php
	if(!isset($_POST['tampilkan'])){
		$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
		$sql = "SELECT * FROM administrasi";
	$query = mysqli_query($konek,$sql);

	}elseif(isset($_POST['tampilkan'])){
		$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
		$sql = "SELECT
		data_user.nik,
		data_user.nama,
		data_request_sktm.acc,
		data_request_sktm.keperluan,
		data_request_sktm.request
	FROM
		data_user
	INNER JOIN data_request_sktm ON data_request_sktm.nik = data_user.nik
	WHERE year(data_request_sktm.acc) = '$tahun'
	UNION
	SELECT
		data_user.nik,
		data_user.nama,
		data_request_skp.acc,
		data_request_skp.keperluan,
		data_request_skp.request
	FROM
		data_user
	INNER JOIN data_request_skp ON data_request_skp.nik = data_user.nik
	WHERE year(data_request_skp.acc) = '$tahun'
	UNION
	SELECT
		data_user.nik,
		data_user.nama,
		data_request_sku.acc,
		data_request_sku.keperluan,
		data_request_sku.request
	FROM
		data_user
	INNER JOIN data_request_sku ON data_request_sku.nik = data_user.nik
	WHERE year(data_request_sku.acc) = '$tahun'
	UNION
	SELECT
		data_user.nik,
		data_user.nama,
		data_request_skd.acc,
		data_request_skd.keperluan,
		data_request_skd.request
	FROM
		data_user
	INNER JOIN data_request_skd ON data_request_skd.nik = data_user.nik
	WHERE year(data_request_skd.acc) = '$tahun'
	";
	$query = mysqli_query($konek,$sql);
	}

?>

            <div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Daftar Berita</h2>
							</div>
						</div>
					</div>
                </div>
                <div class="page-inner mt--5">
					<div class="row mt--2">
						<!-- <div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
								<div class="card-tools">
								<form action="" method="POST">
                                            <div class="form-group">
                                                <select name="tahun" class="form-control">
													<option value="">Pilih</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
													<option value="2021">2021</option>
												</select>
                                                <div class="form-group">
                                                    <input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-primary btn-sm">
													<a href="?halaman=laporan_pertahun">
													<input type="submit" value="Reload" class="btn btn-primary btn-sm">
													</a>
                                                </div>
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
						</div> -->
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-tools">
											<a href="?halaman=tambah_unggulan" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-plus"></i>
												</span>
												Tambah Berita
											</a>
										</div>
                                        
								</div>
								<div class="card-body">
									<table class="table mt-3">
										<thead>
										<tr>
											<th>No</th>
											<th>Berita</th>
											<th>keterangan</th>																				
											<th>foto</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>
											<?php
											// jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
											$query = "SELECT * FROM produk_unggulan ORDER BY id_produk_unggulan ASC";
											$result = mysqli_query($konek, $query);
											//mengecek apakah ada error ketika menjalankan query
											if(!$result){
												die ("Query Error: ".mysqli_errno($konek).
												" - ".mysqli_error($konek));
											}

											//buat perulangan untuk element tabel dari data mahasiswa
											$no = 1; //variabel untuk membuat nomor urut
											// hasil query akan disimpan dalam variabel $data dalam bentuk array
											// kemudian dicetak dengan perulangan while
											while($row = mysqli_fetch_assoc($result))
											{
											?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $row['nama_unggulan']; ?></td>
												<td><?php echo $row['keterangan']; ?></td>												
												<td style="text-align: center;"><img src="gambar/<?php echo $row['foto']; ?>" style="width: 50px;"></td>
												
												<td>
													<div class="form-button-action">
														<a href="?halaman=ubah_produk_unggulan&id=<?php echo $row['id_produk_unggulan']; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit User">
															<i class="fa fa-edit"></i>
														</a>
														<a href="?halaman=hapus_produk_unggulan&id=<?php echo $row['id_produk_unggulan']; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus User">
															<i class="fa fa-times"></i>
														</a>
													</div>
												</td>
												
											</tr>
												
											<?php
												$no++; //untuk nomor urut terus bertambah 1
											}
											?>
											</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
			</div>