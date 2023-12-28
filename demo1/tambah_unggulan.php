<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="proses_tambah_produk.php" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">FORM TAMBAH Produk Unggulan</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">                        

                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama" class="form-control" autofocus="" required="" />
                                </div>                               
                                <div class="form-group">
                                    <label>keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" required="" />
                                </div>                               
                                <div class="form-group">
                                    <label>Gambar Produk</label>
                                    <input type="file" name="gambar_produk" class="form-control" required="" />
                                </div>
                             


                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit">Simpan Produk</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
