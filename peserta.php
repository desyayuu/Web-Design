<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php require_once("include/db.php"); ?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Pendaftaran Siswa</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/publicstyles.css">
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" charset="utf-8" />
	</head>
	<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-header">
            	<a class="navbar-brand" href="index.php">
                <H3>DIGITAL TALENT</H3></a>
            </div>
            <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" id="navScrollspy">
                    <li class="nav-item active">
                        <a href="peserta.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i><span>Calon Peserta</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="daftar.php" class="nav-link"><i class="fa fa-globe" aria-hidden="true"></i><span>Daftar Baru</span></a>
                    </li>
                </ul>
            </div>
        </nav><br/>
        <div class="container-fluid"> <!--Container-->
        	<H2>Pendaftar</H2>
            <div>
            <?php echo Message();
                echo SuccessMessage();  
            ?>
            </div>
                <form action="peserta.php" class="navbar-form navbar-right" style="margin-right: 105px;">
                <div class="form-inline">
                    <input type="text" class="form-control mr-sm-2" placeholder="Search" name="Search">
                    <button class="btn btn-primary btn-outline-light" name="SearchButton">Go</button>
                    <button type="reset" class="btn btn-primary btn-outline-light">Clear</button>
                    <a href="export.php"><button type="button" class="btn btn-success float-left ml-1">Export to Excel</button></a>
                </div><br />
                <?php
                global $connection;
                $data_pendaftar = mysqli_query($connection,"SELECT * FROM siswa");
                $jumlah_pendaftar = mysqli_num_rows($data_pendaftar);
                ?>
                <p>Jumlah Pendaftar = <b><?php echo $jumlah_pendaftar; ?> orang</b></p>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Sekolah Asal</th>
                            <th>Tindakan</th>
                            <th>Print</th>
                        </tr>
                        <?php
                            global $connection;
                            if(isset($_GET["SearchButton"])){
                            $Search=$_GET["Search"];
                      
                            $ViewQuery="SELECT * FROM siswa WHERE nama_siswa LIKE '%$Search%' OR alamat LIKE '%$Search%' OR jenis_kelamin LIKE '%$Search%' OR agama LIKE '%$Search%' OR sekolah_asal LIKE '%$Search%' ORDER BY id_siswa asc";
                            }
                            //The default query untuk peserta
                            else{
                            $ViewQuery="SELECT * FROM siswa ORDER BY id_siswa asc";}
                            $Execute=mysqli_query($connection, $ViewQuery);
                            $SrNo=0;
                            while($DataRows=mysqli_fetch_array($Execute)){
                                $Id=$DataRows["id_siswa"];   
                                $Nama=$DataRows["nama_siswa"];   
                                $Alamat=$DataRows["alamat"];   
                                $Jeniskelamin=$DataRows["jenis_kelamin"];   
                                $Agama=$DataRows["agama"];
                                $Sekolahasal=$DataRows["sekolah_asal"];
                                $SrNo++;
                                ?>
                            <tr>
                                
                            <td><?php echo $SrNo; ?></td>
                            <td><?php echo $Nama; ?></td>
                            <td><?php 
                                if(strlen($Alamat)>17){$Alamat=substr($Alamat,0,17).'...';}
                                echo $Alamat; ?></td>
                            <td><?php echo $Jeniskelamin; ?></td>
                            <td><?php echo $Agama; ?></td>
                            <td><?php echo $Sekolahasal; ?></td>
                            <td width="130">
                                <a href="editpeserta.php?Edit=<?php echo $Id; ?>"><span class="btn btn-sm btn-warning">Edit</span></a>
                                <a href="deletepeserta.php?Delete=<?php echo $Id; ?>"><span onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="btn btn-sm btn-danger">Delete</span></a>
                            </td>
                            <td><a href="printpeserta.php?Print=<?php echo $Id; ?>"><span class="btn btn-sm btn-primary">Print</span></a></td>
                            <?php } ?>                            
                            </tr>
                    </table>
                </div>
        </div>
	</body>
</html>