<?php
// Pastikan file diupload melalui form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Variabel untuk menyimpan lokasi file yang diupload
    $uploadDirectory = "uploads/";  // Tentukan folder upload

    // Memastikan folder uploads ada dan dapat ditulis
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);  // Membuat folder jika belum ada
    }

    // Mengamankan nama file
    $fileName = basename($_FILES['file']['name']);
    $fileName = preg_replace('/[^a-zA-Z0-9\-_\.]/', '_', $fileName);  // Mengganti karakter ilegal dengan underscore

    $filePath = $uploadDirectory . $fileName;

    // Cek apakah file berhasil diupload
    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        // Simpan data lainnya ke database jika perlu
        // Contoh: simpan judul, nama artis, genre, dsb ke database

        // Redirect ke halaman sukses setelah upload berhasil
        header("Location: success.php?upload=success");
        exit();
    } else {
        // Jika gagal upload
        echo "File upload failed.";
    }
}
?>
