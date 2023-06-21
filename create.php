<?php
require("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $episode = $_POST["episode"];
    $tahun = $_POST["tahun"];
    $studio = $_POST["studio"];
    $genre = $_POST["genre"];

    $perintah = "INSERT INTO tbl_anime(nama, episode, tahun, studio, genre) VALUES('$nama', '$episode', '$tahun', '$studio', '$genre')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);

    if ($cek > 0) {
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    } else {
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan. Gagal Menyimpan Data";
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);