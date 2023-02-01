<?php 

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "client");



function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows;
}


function tambah($data) {
    global $conn;


    $nama = htmlspecialchars($data["nama"]);
    $nomor_invoice = htmlspecialchars($data["nomor_invoice"]);
    $tanggal_input = htmlspecialchars($data["tanggal_input"]);
    $tanggal_tempo = htmlspecialchars($data["tanggal_tempo"]);
    $umur_piutang = htmlspecialchars($data["umur_piutang"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $sisa_piutang = htmlspecialchars($data["sisa_piutang"]);


    //query insert data
    $query = "INSERT INTO piutang
                VALUES
            ('', '$nama', '$nomor_invoice', '$tanggal_input', '$tanggal_tempo', '$umur_piutang', '$nominal', '$sisa_piutang')
        ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM piutang WHERE id = $id");

    return mysqli_affected_rows($conn);
}



function edit($data) {
        global $conn;

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nomor_invoice = htmlspecialchars($data["nomor_invoice"]);
        $tanggal_input = htmlspecialchars($data["tanggal_input"]);
        $tanggal_tempo = htmlspecialchars($data["tanggal_tempo"]);
        $umur_piutang = htmlspecialchars($data["umur_piutang"]);
        $nominal = htmlspecialchars($data["nominal"]);
        $sisa_piutang = htmlspecialchars($data["sisa_piutang"]);


        //query insert data
        $query = "UPDATE piutang SET
                    nama = '$nama',
                    nomor_invoice = '$nomor_invoice',
                    tanggal_input = '$tanggal_input',
                    tanggal_tempo = '$tanggal_tempo',
                    umur_piutang = '$umur_piutang',
                    nominal = '$nominal',
                    sisa_piutang = '$sisa_piutang'
                WHERE id = $id
            ";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


?>