<?php
include'include/db.php';
$DeleteFromURL=$_GET['Delete'];

mysqli_query($connection,
	"DELETE FROM siswa
	WHERE id_siswa='$DeleteFromURL'"
);

header("location:peserta.php");
?>