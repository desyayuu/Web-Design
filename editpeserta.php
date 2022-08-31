<?php require_once("include/db.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php
if(isset($_POST["Submit"])){
    $Nama=mysqli_real_escape_string($connection, $_POST["Nama"]);
    $Alamat=mysqli_real_escape_string($connection, $_POST["Alamat"]);
    $Jenis_kelamin=mysqli_real_escape_string($connection, $_POST["jenis_kelamin"]);
    $Agama=mysqli_real_escape_string($connection, $_POST["Agama"]);
    $SekolahAsal=mysqli_real_escape_string($connection, $_POST["SekolahAsal"]);
    global $connection;
    $EditFromURL=$_GET['Edit'];
    $Query="UPDATE siswa SET nama_siswa='$Nama',alamat='$Alamat',jenis_kelamin='$Jenis_kelamin',agama='$Agama',sekolah_asal='$SekolahAsal' WHERE id_siswa='$EditFromURL'";
    $Execute=mysqli_query($connection, $Query);
    if($Execute){
        $_SESSION["SuccessMessage"]="Peserta berhasil di-edit";
        Redirect_to("peserta.php");
    }else{
        $_SESSION["ErrorMessage"]="Gagal di-edit, Coba Lagi!";
        Redirect_to("peserta.php");
    }
}

?>

<!DOCTYPE HTML>

<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Siswa</title>
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
                    <li class="nav-item">
                        <a href="daftar.php" class="nav-link"><i class="fa fa-globe" aria-hidden="true"></i><span>Daftar Baru</span></a>
                    </li>
                </ul>
            </div>
    </nav><br/>
    <div class="container-fluid">
        <div class="row">
            <!--Main Area-->
            <div class="col-sm-10">
                <h1>Update Peserta</h1>
                <div>
                    <?php
                    $SearchQueryParameter=$_GET['Edit'];
                    $connection;
                    $Query="SELECT * FROM siswa WHERE id_siswa='$SearchQueryParameter'";
                    $Execute=mysqli_query($connection, $Query);
                    while($DataRows=mysqli_fetch_array($Execute)){
                        $NamaSiswaUpdated=$DataRows['nama_siswa'];
                        $AlamatUpdated=$DataRows['alamat'];
                        $JenisKelaminUpdated=$DataRows['jenis_kelamin'];
                        $AgamaUpdated=$DataRows['agama'];
                        $SekolahAsalUpdated=$DataRows['sekolah_asal'];
                    }
                    
                    ?>
                    <form action="editpeserta.php?Edit=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                    <div class="form-group">
                    <label for="nama">Nama: </label>
                    <input value="<?php echo $NamaSiswaUpdated ?>" class="form-control" type="text" name="Nama" id="nama">
                    </div>
                    <div class="form-group">
                    <label for="alamat">Alamat: </label>
                    <textarea class="form-control" name="Alamat" id="alamat"><?php echo $AlamatUpdated; ?></textarea>
                    </div>
                    <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin: </label>
                    <?php
                    if($JenisKelaminUpdated=="L")
                    {
                        echo "<br/><input type='radio' name='jenis_kelamin' value='L' checked>Laki-Laki<br>
                              <input type='radio' name='jenis_kelamin' value='P'>Perempuan<br/>";
                    }
                    elseif($JenisKelaminUpdated=="P")
                    {
                        echo "<br/><input type='radio' name='jenis_kelamin' value='L'>Laki-Laki<br>
                              <input type='radio' name='jenis_kelamin' value='P' checked>Perempuan<br/>";
                    }else{
                        echo "<br/><input type='radio' name='jenis_kelamin' value='L'>Laki-Laki<br>
                              <input type='radio' name='jenis_kelamin' value='P'>Perempuan<br/>";
                    }
                    ?>
                    </div>
                    <div class="form-group">
                    <label for="agama">Agama: </label>
                    <select class="form-control" name="Agama" id="agama">
                        <option value="<?php echo $AgamaUpdated ?>"><?php echo $AgamaUpdated ?></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghuchu">Konghuchu</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="ttl">Sekolah Asal: </label>
                    <input value="<?php echo $SekolahAsalUpdated ?>" class="form-control" type="text" name="SekolahAsal" id="sekolah">
                    </div>
                    </div>
                    <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Edit Peserta">
                    </fieldset>
                    <br>
                    </form>
                </div>
            </div>       
        </div> <!--Ending of Row-->
    </body>
</html>