<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';


    //cek tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    //cek data berhasil ditambahkan atau tidak
   if( tambah($_POST) > 0 ) {
       echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
       ";
   } else {
       echo "
            <script>
                alert('Data gagal ditambahkan!');
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
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Piutang</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required>
            </li>

            <li>
                <label for="nomor_invoice">Nomor Invoice : </label>
                <input type="text" name="nomor_invoice" id="nomor_invoice" required>
            </li>

            <li>
                <label for="tanggal_input">Tanggal Input Data : </label>
                <input type="date" name="tanggal_input" id="tanggal_input" required>
            </li>

            <li>
                <label for="tanggal_tempo">Tanggal Jatuh Tempo : </label>
                <input type="date" name="tanggal_tempo" id="tanggal_tempo" required>
            </li>

            <li>
                <label for="umur_piutang">Umur Piutang : </label>
                <input type="text" name="umur_piutang" id="umur_piutang">
            </li>

            <li>
                <label for="nominal">Nominal : </label>
                <input type="text" name="nominal" id="nominal" required>
            </li>

            <li>
                <label for="sisa_piutang">Sisa Piutang : </label>
                <input type="text" name="sisa_piutang" id="sisa_piutang">
            </li>

            <li>
                <button type="submit" name="submit">Tambahkan Data</button>
            </li>

        </ul>
    </form>

</body>
</html>