<html>
<head>
    <title> KOP SURAT </title>
    <style type= "text/css">
    body {font-family: arial; background-color : #ccc }
    .rangkasurat {width : 980px;margin:0 auto;background-color : #fff;height: 200%;padding: 20px;}
    .tableatas {border-bottom : 5px solid #000; padding: 2px}
    .tengah {text-align : center;line-height: 5px;}
    .isi {line-height: 30px;}
    .left-align {
        text-align: left;
    }
    .header {
            text-align: center;
        }

        .from {
            margin-bottom: 10px;
        }

        .date {
            margin-bottom: 20px;
        }

        .subject {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .content {
            text-indent: 30px;
        }

        .signature {
            float: right;
            margin-top: 30px;
        }
        .body {
            text-align: justify;
            line-height: 1.6;
        }
        .ttd {
            text-align: right;
            line-height: 1.6;
        }


        .clear {
            clear: both;
        }
     </style >
</head>
<body>
<?php
    include 'konek.php';
    // Mengambil nilai id dari URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM data_request_skp natural join data_user WHERE id_request_skp=$id";
        $result = mysqli_query($konek, $query);
        // jika data gagal diambil maka akan tampil error berikut
        if (!$result) {
            die("Query Error: " . mysqli_errno($konek) .
                " - " . mysqli_error($konek));
        }
        // mengambil data dari database
        $data = mysqli_fetch_assoc($result);
        // apabila data tidak ada pada database maka akan dijalankan perintah ini
        if (!count($data)) {
            echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
        }
    } else {
        echo "Tidak ada nilai id dalam URL.";
    }
    ?>
    
<div class = "rangkasurat">
     <table width = "100%" class ="tableatas">
           <tr>
                 <td width="10%"> <img src="demo1/img/pati.png" width="100px"> </td>
                 <td width="90%" class = "tengah">
                       <h2>PEMERINTAHAN KABUPATEN PATI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                       <h2>KECAMATAN SUKOLILO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                       <h2>DESA KEDUMULYO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                       <b>Alamat : Kantor Kepala Desa Kedumulyo Kec. Sukolilo Kab. Pati KP. 59172&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                 </td>
            </tr>
     </table >
     <br>
     <br><br>
     <table border="0" align="center">
        <tr>
            <td>
                <center>
                    <font size="4"><b>SURAT KETERANGAN / PENGANTAR</b></font><br>
                    <hr style="margin:0px" color="black">
                    <font size="3"><b>Nomor : <?php echo $id; ?> / KDM / VIII / 2023</b></font><br>
                </center>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table border="0" align="">
        <tr>
            <td>
            <font size="4">Yang bertanda tangan di bawah ini Kepala Desa Kedumulyo Kec. Sukolilo Kab. Pati, menerangkan bahwa : </font>
            </td>
        </tr>
    </table>
    <br>
    <table border="0" class="isi ml-5">
        <tr>
            <td><font size="4">Nama Lengkap</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font></td>
            <td><font size="4"><?php echo $data['nama']; ?></font></td>
        </tr>
        <tr>
            <td><font size="4">Jenis Kelamin</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
            <td><font size="4"><?php echo $data['jekel']; ?></font></td>
        </tr>
        <tr>
            <td><font size="4">Tempat / Tanggal Lahir</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font></td>
            <td><font size="4">Pati / <?php echo $data['tanggal_lahir']; ?></font></td>
        </tr>
     
        <tr>
            <td><font size="4">Kewarganegaraan</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
            <td><font size="4">WNI</font></td>
        </tr>
        <tr>
            <td><font size="4">Status Perkawinan</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
            <td><font size="4">WNI</font></td>
        </tr>
        <tr>
            <td><font size="4">Status Warga</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font></td>
            <td><font size="4"><?php echo $data['status_warga']; ?></font></td>
        </tr>
        <tr>
            <td><font size="4">Agama</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font></td>
            <td><font size="4"><?php echo $data['agama']; ?></font></td>
        </tr>
        <tr>
            <td><font size="4">Nomor Induk Kependuudkan</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font></td>
            <td><font size="4"><?php echo $data['nik']; ?></font></td>
        </tr>
        <tr>
            <td><font size="4">Nomor Kartu Keluarga</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font></td>
            <td><font size="4">12435685</font></td>
        </tr>
        <tr>
            <td><font size="4">Alamat Tinggal</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font></td>
            <td><font size="4"><?php echo $data['alamat']; ?></font></td>
        </tr>
        <tr>
            <td><font size="4">Keperluan</font></td>
            <td><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</font></td>
            <td><font size="4"><?php echo $data['keperluan']; ?></font></td>
        </tr>
    </table>
    <br>
    <div class="body">
        
        <p><font size="4">Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat digunakan sebagaimana mestinya.</font></p>
    </div>
    <br>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <th></th>
            <th width="500px"></th>
            <th class="ttd"><font size="4">Sukolilo,  <?php echo $data['acc']; ?></font></th>
        </tr>
        <tr>
            <td><font size="4">Tanda tangan <br> Yang bersangkutan </font></td>
            <td></td>
            <td ><font size="4">Kepala Desa Kedumulyo</font></td>
        </tr>
        <tr>
            <th></th>
            <th width="80px"></th>
            <th><img src="demo1/img/ttd.png" width="70" height="87" alt=""></th>
        </tr>
        
        
        <tr>
            <td><b style="text-transform:uppercase"><u>(<?php echo $data['nama']; ?>)</u></b></td>
            <td></td>
            <td><b><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>(SUTRISNO)</u></font></b></td>
        </tr>
    </table>
</table>
</div>
<script>        
            window.print(); // Ini akan mencetak halaman secara otomatis        
    </script>
</body>
</html>