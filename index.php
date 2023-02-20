<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}


require 'functions.php';

$daftar_piutang = query("SELECT * FROM piutang");


//tombol cari ditekan
if ( isset($_POST["cari"]) ) {
    $daftar_piutang = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
</head>
<body>
   
<a href="logout.php">Log Out</a>

<h1>Daftar Piutang</h1>
<a href="tambah.php">Tambah Data</a>
<br><br>


<form action="" method="post">
    <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
    <button type="submit" name="cari">Search!</button>
</form>

<br>



<table border="1" cellpadding="10" cellspacing="0"> 

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Nama</th>
        <th>Nomor Invoice</th>
        <th>Tanggal Input Data</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Jangka Waktu Piutang</th>
        <th>Nominal</th>
        <th>Sisa Piutang</th>
        <th>Pembayaran</th>
    </tr>
<?php $i = 1; ?>
<?php foreach( $daftar_piutang as $row) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="edit.php?id=<?= $row["id"]; ?>">edit</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin untuk menghapus?');">delete</a> 
        </td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["nomor_invoice"]; ?> </td>
        <td><?= $row["tanggal_input"]; ?> </td>
        <td><?= $row["tanggal_tempo"]; ?> </td>
        <td><?= selisih($row["tanggal_input"], $row["tanggal_tempo"]); ?></td>
        <td><?= $row["nominal"]; ?></td>
        <td><?= $row["sisa_piutang"]; ?></td>

        <td>
             <a href="formpembayaran.php?id=<?= $row["id"]; ?>">Form Pembayaran</a> |
             <a href="formpembayaran.php?id=<?= $row["id"]; ?>">Rincian Pembayaran</a> |
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
</table>
<?php ;?>


</body>
</html>