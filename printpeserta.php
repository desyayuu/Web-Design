<?php require_once("include/db.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php
  $SearchQueryParameter=$_GET['Print'];
  $connection;
  $Query="SELECT * FROM siswa WHERE id_siswa='$SearchQueryParameter'";
  $Execute=mysqli_query($connection, $Query);
  while($DataRows=mysqli_fetch_array($Execute)){
       $Namasiswa=$DataRows["nama_siswa"];
       $Alamat=$DataRows["alamat"];
       $Jeniskelamin=$DataRows["jenis_kelamin"];
       $Agama=$DataRows["agama"];
       $Sekolahasal=$DataRows["sekolah_asal"];
  }
                    
?>

<?php
require('include/fpdf182/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(50,8,'Nama',0,0,'L');
$pdf->Cell(100,8,': '.$Namasiswa.'',0,0,'L');
$pdf->Ln();
$pdf->Cell(50,8,'Alamat',0,0,'L');
$pdf->Cell(100,8,': '.$Alamat.'',0,0,'L');
$pdf->Ln();
$pdf->Cell(50,8,'Jenis Kelamin',0,0,'L');
$pdf->Cell(100,8,': '.$Jeniskelamin.'',0,0,'L');
$pdf->Ln();
$pdf->Cell(50,8,'Agama',0,0,'L');
$pdf->Cell(100,8,': '.$Agama.'',0,0,'L');
$pdf->Ln();
$pdf->Cell(50,8,'Sekolah Asal',0,0,'L');
$pdf->Cell(100,8,': '.$Sekolahasal.'',0,0,'L');
$pdf->Output('D','Peserta.pdf');