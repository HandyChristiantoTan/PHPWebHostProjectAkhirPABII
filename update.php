<?php
require("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $episode = $_POST["episode"];
    $tahun = $_POST["tahun"];
    $studio = $_POST["studio"];
    $genre = $_POST["genre"];

    $perintah = "Update tbl_anime SET nama = '$nama', episode = '$episode', tahun = '$tahun', studio = '$studio', genre = '$genre' WHERE id = '$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);

    if ($cek > 0) {
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
    } else {
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan. Gagal Mengubah Data";
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);