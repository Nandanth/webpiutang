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


    function cari($keyword) {
        $query = "SELECT * FROM piutang
                WHERE 
                nama LIKE '%$keyword%' OR
                nomor_invoice LIKE '%$keyword%' OR
                tanggal_input LIKE '%$keyword%'OR
                tanggal_tempo LIKE '%$keyword%' OR
                umur_piutang LIKE '%$keyword%' OR
                nominal LIKE '%$keyword%' OR
                sisa_piutang LIKE '%$keyword%' 
                ";
            return query($query);
    }


    function registrasi($data) {
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        //cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");       

        if( mysqli_fetch_assoc($result) ) {
            echo "<script>
                    alert('Username sudah terdaftar!');
            </script>";
            return false;
        }

        //cek konfrimasi password
        if( $password !== $password2 ) {
            echo "<script> 
                    alert('Konfirmasi Password Tidak Sesuai!');
              </script>";
              return false;
        }

            //enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);
            

            //tambahkan user baru ke database
            mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

            return mysqli_affected_rows($conn);

    }


function selisih($tgl_input_data, $tgl_jatuh_tempo)
{
    $now = date("Y-m-d");

    $tgl1 = new DateTime($now);
    $tgl2 = new DateTime($tgl_jatuh_tempo);
    $d = $tgl2->diff($tgl1)->days;

    
    $selisih = '';
    

    if($d < 1){
        $d = 0;
    }

    if($d < 2){
        $selisih = "<span style='color:red;'><b><i>Sudah Jatuh Tempo</i></b></span>";
    }else{
        $selisih = $d." hari";
    } 

    if($tgl2 < $tgl1) {
        $selisih = "<span style='color:blue;'><b><i>Sudah Lewat Jatuh Tempo</i></b></span>";

    }
    
    return $selisih;
    // return  $now;
}
	
// function saldo($saldo_awal, $jmlh_pembayaran) {
//     $saldo_awal = $POST['nominal'];
//     $jml_pembayaran = $POST['jumlah_pembayaran'];
    
//     $sisa_piutang = $saldo_awal - $jml_pembayaran;

//     if($sisa_piutang = 0) {
//         echo "Lunas";
//     }
    
// }

// function form_pembayaran($data) {
//     global $conn;

//     $id = $data["id"];
//     $nama = htmlspecialchars($data["nama"]);
//     $nomor_invoice = htmlspecialchars($data["nomor_invoice"]);
//     $tanggal_input = htmlspecialchars($data["tanggal_input"]);
//     $tanggal_tempo = htmlspecialchars($data["tanggal_tempo"]);
//     $umur_piutang = htmlspecialchars($data["umur_piutang"]);
//     $nominal = htmlspecialchars($data["nominal"]);
//     $sisa_piutang = htmlspecialchars($data["sisa_piutang"]);
//     $jumlah_pembayaran = htmlspecialchars($data["jumlah_pembayaran"]);


//     //query insert data
//     $query = "UPDATE piutang SET
//                 nama = '$nama',
//                 nomor_invoice = '$nomor_invoice',
//                 tanggal_input = '$tanggal_input',
//                 tanggal_tempo = '$tanggal_tempo',
//                 umur_piutang = '$umur_piutang',
//                 nominal = '$nominal',
//                 sisa_piutang = '$sisa_piutang'
//                 jumlah_pembayaran = '$jumlah_pembayaran'
//             WHERE id = $id
//         ";

//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }



?>