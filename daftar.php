<?php require_once("include/db.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php
if(isset($_POST["Submit"])){
    $Nama=mysqli_real_escape_string($connection, $_POST["nama"]);
    $Alamat=mysqli_real_escape_string($connection, $_POST["alamat"]);
    $Jenis_kelamin=mysqli_real_escape_string($connection, $_POST["jenis_kelamin"]);
    $Agama=mysqli_real_escape_string($connection, $_POST["Agama"]);
    $Sekolah=mysqli_real_escape_string($connection, $_POST["sekolah"]);
    global $connection;
    $Query="INSERT INTO siswa(nama_siswa,alamat,jenis_kelamin,agama,sekolah_asal)VALUES('$Nama','$Alamat','$Jenis_kelamin','$Agama','$Sekolah')";
    $Execute=mysqli_query($connection, $Query);
    if($Execute){
        $_SESSION["SuccessMessage"]="Pendaftaran Berhasil";
        Redirect_to("daftar.php");
    }else{
        $_SESSION["ErrorMessage"]="Pendaftaran Gagal, Coba Lagi!";
        Redirect_to("daftar.php");
    }
}

?>

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
                    <li class="nav-item">
                        <a href="peserta.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i><span>Calon Peserta</span></a>
                    </li>
                    <li class="nav-item active">
                        <a href="daftar.php" class="nav-link"><i class="fa fa-globe" aria-hidden="true"></i><span>Daftar Baru</span></a>
                    </li>
                </ul>
            </div>
        </nav><br/>
        <div class="container-fluid"> <!--Container-->
            	<H2>Tambah Data Peserta</H2>
                <div>
                <?php echo Message();
                    echo SuccessMessage();  
                ?>
                </div>
                <form action="daftar.php" method="post" enctype="multipart/form-data">
                <fieldset>
                <table id="tabel-input">
                        <tr>
                            <td class="label-formulir">Nama</td>
                            <td class="isian-formulir"><input type="text" name="nama" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="label-formulir">Alamat</td>
                            <td class="isian-formulir"><textarea rows="2" cols="40" name="alamat" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <td class="label-formulir">Jenis Kelamin</td>
                            <td class="isian-formulir"><input type="radio" name="jenis_kelamin" value="L"/>Laki-Laki</td>
                        </tr>
                        <tr>
                            <td class="label-formulir"></td>
                            <td class="isian-formulir"><input type="radio" name="jenis_kelamin" value="P"/>Perempuan</td>
                        </tr>
                        <tr>
                            <td class="label-formulir">Agama</td>
                            <td class="isian-formulir">
                                <select class="form-control" name="Agama" id="agama">
                                <option value="">Pilih Salah Satu</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Katolik">Kristen Katolik</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghuchu">Konghuchu</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-formulir">Sekolah Asal</td>
                            <td class="isian-formulir"><input type="text" name="sekolah" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="label-formulir"></td>
                            <td class="isian-formulir">
                                <input class="btn btn-primary float-left" type="Submit" name="Submit" value="Simpan">
                                <button type="reset" class="btn btn-info float-left ml-1">Reset</button>
                                <a href="index.php"><button type="button" class="btn btn-success float-left ml-1">Kembali</button></a>
                            </td>
                        </tr>
                </table>
                </fieldset>
                </form>
        </div>
	</body>
</html>