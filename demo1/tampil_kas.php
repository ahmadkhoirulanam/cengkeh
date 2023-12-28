<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 


<link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->

    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


    <div class="page-inner">
	<div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-success">
                <div class="panel-heading" style="font-size: 20px;">
                    Data Rekapitulasi
                </div>
				<p>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover table table-bordered" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Masuk</th>
                                    <th>Jenis</th>
                                    <th>Keluar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                                    $no = 1;
                                    $sql = mysqli_query($konek, "SELECT * FROM kas");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                ?>
                                    <tr class="odd gradeX">
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['kode']; ?>
                                        </td>
                                        <td>
                                            <?php echo date('d F Y', strtotime($data['tgl'])); ?>
                                        </td>
                                        <td>
                                            <?php echo $data['keterangan']; ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($data['jumlah']).",-"; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['jenis']; ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($data['keluar']).",-"; ?>
                                        </td>
                                    </tr>
									<?php error_reporting (E_ALL ^ E_NOTICE); ?>
                                    <?php 
                                    $total = $total+$data['jumlah'];
                                    $total_keluar = $total_keluar+$data['keluar'];

                                    $saldo_akhir = $total - $total_keluar;                      
                                    } 
                                ?>
                            </tbody>

                            <tr>
                                <td  colspan="6" style="text-align: left; font-size: 16px; color: maroon;">Total Kas Masuk :</td>
                                <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
								
                            </tr>

                            <tr>
                                <td colspan="6" style="text-align: left; font-size: 16px; color: maroon;">Total Kas Keluar :</td>
                                <td style="font-size: 17px; text-align: right; "><font style="color: red;"><?php echo " Rp." . number_format($total_keluar).",-"; ?></font></td>
                            </tr>

                            <tr>
                                <td colspan="6" style="text-align: left; font-size: 16px; color: red;">Saldo Akhir :</td>
                                <th style="font-size: 17px; text-align: right;"><font style="color: purple;"><?php echo " Rp." . number_format($saldo_akhir).",-"; ?></font></th>
                            </tr>
                        </table>
                    </div>

                    <div id="" class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                Copyright © 2018 All rights reserved. Template by <a href="http://binarycart.com/">Binary Admin</a>
                                <br> Developed By <a href="https://web.facebook.com/Ions.Revolutionz" target="_blank"><b>Ion's</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
				</div>
				<?php
					if(isset($_GET['id_request_skd'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_skd WHERE id_request_skd=$id_request_skd");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
							}
					}elseif(isset($_GET['id_request_sktm'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_sktm WHERE id_request_sktm=$id_request_sktm");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}
					}elseif(isset($_GET['id_request_skp'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_skp WHERE id_request_skp=$id_request_skp");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}
					}elseif(isset($_GET['id_request_sku'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_sku WHERE id_request_sku=$id_request_sku");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}
					}
				?>