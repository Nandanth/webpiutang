<?php
require 'functions.php';

$daftar_piutang = query("SELECT * FROM piutang");


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
    
<h1>Daftar Piutang</h1>
<a href="tambah.php">Tambah Data</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0"> 

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Nama</th>
        <th>Nomor Invoice</th>
        <th>Tanggal Input Data</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Umur Piutang</th>
        <th>Nominal</th>
        <th>Sisa Piutang</th>
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
        <td><?= $row["umur_piutang"]; ?></td>
        <td><?= $row["nominal"]; ?></td>
        <td><?= $row["sisa_piutang"]; ?></td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
</table>

</body>
</html>