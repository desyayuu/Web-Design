<?php 
include 'include/db.php';
?>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Peserta</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Sekolah Asal</th>
    </tr>
    <?php
    $connection; 
    $Query="SELECT * FROM siswa";
    $Execute=mysqli_query($connection, $Query);
    $no = 1;
    while($d = mysqli_fetch_array($Execute)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['nama_siswa']; ?></td>
        <td><?php echo $d['alamat']; ?></td>
        <td><?php echo $d['jenis_kelamin']; ?></td>
        <td><?php echo $d['agama']; ?></td>
        <td><?php echo $d['sekolah_asal']; ?></td>
    </tr>
    <?php
    } 
    ?>
</table>