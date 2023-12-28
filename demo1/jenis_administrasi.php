<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Penerapan K-Means</h4>
                        <!-- <a href="?halaman=tambah_jenis_administrasi" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Tambah Jenis Kategorid
                        </a> -->
                    </div>
                </div>

                <div class="card-body">
                    <?php                  
                  
                    $sql = "SELECT * FROM pemalang";

                    // Execute the query
                    
                    $result = mysqli_query($konek, $sql);

                    // Check if there are rows in the result
                    if ($result->num_rows > 0) {
                        $dataset = array(); // Initialize an empty array to store the fetched data

                        // Fetch each row and add it to the dataset array
                        while ($row = $result->fetch_assoc()) {
                            // Assuming 'tanah' and 'produksi' are the column names in your table
                            $dataset[] = [$row['tanah'], $row['produksi']];
                            
                           
                        }

                    } else {
                        echo "No data found in the database.";
                    }
                  
                    $centroid = [
                        [165, 44],     // Gizi Buruk(C0)
                        [8, 2],     // Gizi kurang(C1)
                        [0, 0]
                    ];    // Obesitas(C4)
                    // print_r($centroid);


                    // Banyak Dataset
                    $banyak_dataset = sizeof($dataset); // 50
                  

                    // Banyak Centroid
                    $banyak_centroid = sizeof($centroid); // 5
                    

                    // Banyak Kolom
                    $banyak_kolom = sizeof($dataset[0]); // 2
                    
                    // Fungsi euclidean distance
                    function hitung_euclidean_distance($dataset, $centroid, $banyak_kolom)
                    {

                        $siat = 0;
                        for ($i = 0; $i < $banyak_kolom; $i++) { // 2 X
                            $siat = $siat + (($dataset[$i] - $centroid[$i]) ** 2);
                        }

                        return sqrt($siat);
                    }


                    // Iterasi K-Means
                    function iterasi_kmeans($dataset, $centroid, $banyak_dataset, $banyak_centroid, $banyak_kolom)
                    {

                        $dataset_label = [];
                        // $label_cluster = [];
                        for ($i = 0; $i < $banyak_dataset; $i++) { // 50X
                            $hasil_euclid = [];
                            for ($j = 0; $j < $banyak_centroid; $j++) { // 5X
                                $hasil_euclid[$j] = hitung_euclidean_distance($dataset[$i], $centroid[$j], $banyak_kolom);
                            }
                            // print_r($hasil_euclid);
                            // echo "<br/>";
                            $nilai_terkecil = min($hasil_euclid);
                            // print_r($nilai_terkecil);
                            // echo "<br/>";
                            $index_nilai_terkecil = array_search($nilai_terkecil, $hasil_euclid);
                            // print_r($index_nilai_terkecil);
                            // $label_cluster[$i] = $index_nilai_terkecil;
                            $dataset_label[$i] = $index_nilai_terkecil;
                        }

                        // print_r($dataset_label);
                        // echo "<br/>";


                        // Mengelompokkan dataset berdasarkan cluster
                        $isi_cluster = [];  // array 3 dimensi
                        for ($x = 0; $x < $banyak_centroid; $x++) {
                            $array_siat = [];
                            for ($y = 0; $y < $banyak_dataset; $y++) {
                                if ($dataset_label[$y] == $x) {
                                    array_push($array_siat, $dataset[$y]);
                                }
                            }
                            $isi_cluster[$x] = $array_siat;
                        }
                        // print_r($isi_cluster) ;


                        // Menghitung centroid_baru tiap cluster
                        $new_centroid = [];
                        for ($i = 0; $i < $banyak_centroid; $i++) { // 5 X
                            $hasil_centroid = [];
                            for ($j = 0; $j < $banyak_kolom; $j++) {  // 2 X
                                $temp_centroid = 0;
                                for ($k = 0; $k < sizeof($isi_cluster[$i]); $k++) { // sebanyak tiap2 cluster        
                                    $temp_centroid = $temp_centroid + $isi_cluster[$i][$k][$j];
                                }
                                $hasil_centroid[$j] = $temp_centroid / sizeof($isi_cluster[$i]);
                            }
                            $new_centroid[$i] = $hasil_centroid;
                        }

                        return [$new_centroid, $dataset_label];
                    }

                    // Print tabel hasil cluster
                    function print_hasil_cluster($dataset_label, $dataset, $banyak_dataset)
                    {

                        echo "<table class='display table table-striped table-hover'";
                        echo "<tr>";
                        echo "<th>Data Ke</th>";
                        echo "<th>Label Cluster</th>";
                        echo "</tr>";

                        $connection = mysqli_connect("localhost", "root", "", "cengkeh");

                        if (!$connection) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Assuming you have a query to fetch data from your database
                        
                        // Close the MySQL connection
                        mysqli_close($connection);

                        // Now, use the fetched data in your loop
                        $banyak_dataset = count($dataset_label);

                        for ($i = 0; $i < $banyak_dataset; $i++) {
                            echo "<tr>";
                            // Output data from the database
                            echo "<td>" . $dataset_label[$i] . "</td>";
                            
                            // Check the value of $dataset_label[$i] and display corresponding text
                            if ($dataset_label[$i] == 0) {
                                echo "<td>Baik</td>";
                            } elseif ($dataset_label[$i] == 1) {
                                echo "<td>Cukup</td>";
                            } else {
                                // You can add additional conditions or a default case here
                                echo "<td>Buruk</td>";
                            }

                            echo "</tr>";
                        }
                        
                        echo "</table>";
                    }


                    // Perulangan iterasi kmeans
                    $centroid_temp = [];
                    $ulang = TRUE;
                    while ($ulang) {
                        # code...
                        $centroid_dan_datasetlabel = iterasi_kmeans($dataset, $centroid, $banyak_dataset, $banyak_centroid, $banyak_kolom);
                        $centroid = $centroid_dan_datasetlabel[0];  // centroid akan berubah-ubah saat perulangan
                        $dataset_label = $centroid_dan_datasetlabel[1];  // dataset_label akan berubah-ubah saat perulangan
                        

                        if ($centroid == $centroid_temp) { // Membandingkan nilai centroid, jika sama iterasi berhenti.
                            $ulang = FALSE;
                        }

                        $centroid_temp = $centroid;

                        echo "<br/>";
                    }

                    print_hasil_cluster($dataset_label, $dataset, $banyak_dataset); // Menampilakn Hasil Cluster


                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                            New
                                        </span>
                                        <span class="fw-light">
                                            Row
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Name</label>
                                                <input id="addName" type="text" class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-0">
                                            <div class="form-group form-group-default">
                                                <label>Position</label>
                                                <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Office</label>
                                                <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <form action="">
                        <div class="table-responsive">
                            <table id="add" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $tampil = "SELECT * FROM jenis_administrasi";
                                    $query = mysqli_query($konek, $tampil);
                                    while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                        $id_jenis_administrasi  = $data['id_jenis_administrasi'];
                                        $nama_jenis = $data['nama_jenis'];

                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $dataset_label[$i]; ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="?halaman=ubah_jenis_administrasi&id_jenis_administrasi=<?php echo $id_jenis_administrasi; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit User">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="?halaman=kelola_jenis_administrasi&id_jenis_administrasi=<?php echo $id_jenis_administrasi; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus User">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($_GET['id_jenis_administrasi'])) {
    $sql_hapus = "DELETE FROM jenis_administrasi WHERE id_jenis_administrasi='" . $_GET['id_jenis_administrasi'] . "'";
    $query_hapus = mysqli_query($konek, $sql_hapus);
    if ($query_hapus) {
        echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=kelola_jenis_administrasi">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=kelola_jenis_administrasi">';
    }
}
?>