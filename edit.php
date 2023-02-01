<?php 
require 'functions.php';


//ambil data di url
$id = $_GET["id"];

//query data berdasarkan id
$datacl = query("SELECT * FROM piutang WHERE id = $id")[0];


    //cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    //cek data berhasil diubah atau tidak
   if( edit($_POST) > 0 ) {
       echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
       ";
   } else {
       echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'index.php';
             </script>
    ";
   }
    

}


 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data Piutang</h1>

    <form action="" method="post">
            <input type="hidden" name="id" value="<?= $datacl["id"]; ?>">
        
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $datacl["nama"]; ?>">
            </li>

            <li>
                <label for="nomor_invoice">Nomor Invoice : </label>
                <input type="text" name="nomor_invoice" id="nomor_invoice" required value="<?= $datacl["nomor_invoice"]; ?>">
            </li>

            <li>
                <label for="tanggal_input">Tanggal Input Data : </label>
                <input type="date" name="tanggal_input" id="tanggal_input" required value="<?= $datacl["tanggal_input"]; ?>">
            </li>

            <li>
                <label for="tanggal_tempo">Tanggal Jatuh Tempo : </label>
                <input type="date" name="tanggal_tempo" id="tanggal_tempo" required value="<?= $datacl["tanggal_tempo"]; ?>">
            </li>

            <li>
                <label for="umur_piutang">Umur Piutang : </label>
                <input type="text" name="umur_piutang" id="umur_piutang" value="<?= $datacl["umur_piutang"]; ?>">
            </li>

            <li>
                <label for="nominal">Nominal : </label>
                <input type="text" name="nominal" id="nominal" required value="<?= $datacl["nominal"]; ?>">
            </li>

            <li>
                <label for="sisa_piutang">Sisa Piutang : </label>
                <input type="text" name="sisa_piutang" id="sisa_piutang" value="<?= $datacl["sisa_piutang"]; ?>">
            </li>

            <li>
                <button type="submit" name="submit">Edit Data</button>
            </li>

        </ul>
    </form>

</body>
</html>