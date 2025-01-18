<?php
// Periksa apakah data berhasil dikirim (bisa ditambahkan kondisi lain jika diperlukan)
if (isset($_GET['upload']) && $_GET['upload'] == 'success') {
    $message = "Music file uploaded successfully!";
} else {
    $message = "There was an error with your upload.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Success</title>
    <link rel="stylesheet" href="path/to/styles.css">
</head>
<body class="bg-gradient-to-r from-green-900 to-black text-white min-h-screen flex flex-col">
    <header class="bg-green-800 text-white py-6 shadow-lg">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold">🎉 Success 🎉</h1>
        </div>
    </header>
    
    <main class="container mx-auto flex-grow my-10 p-8 bg-gradient-to-r from-gray-800 to-gray-900 shadow-xl rounded-lg flex flex-col items-center justify-center">
        <h2 class="text-3xl font-semibold text-gray-200 mb-6"><?php echo $message; ?></h2>
        
        <p class="text-lg text-gray-300 mb-6">Your music has been successfully uploaded. You can now add more or visit the main page.</p>
        
        <!-- Tombol untuk kembali ke halaman utama -->
        <a href="index.php" class="py-3 px-6 bg-blue-600 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">Go to Main Page</a>
    </main>

    <footer class="bg-gray-900 text-gray-400 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Music Uploader. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
