<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Uploader</title>
    <link rel="stylesheet" href="path/to/styles.css">
    <script type="module" src="/src/main.jsx" defer></script>
    <style>
        /* CSS untuk spinner dan tombol */
        .spinner {
            border: 4px solid #f3f3f3; /* Light grey */
            border-top: 4px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Hide the spinner initially */
        .spinner-hidden {
            display: none;
        }

        /* Style the button when clicked */
        button.uploading {
            background-color: #4caf50; /* Change background to green while uploading */
            pointer-events: none; /* Disable the button while uploading */
        }

        button.uploading .spinner {
            display: inline-block; /* Show the spinner */
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-900 to-black text-gray-100 min-h-screen flex flex-col">
    <header class="bg-blue-800 text-white py-6 shadow-lg">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold">🎵 Music Uploader 🎶</h1>
        </div>
    </header>
    <main class="container mx-auto flex-grow my-10 p-8 bg-gradient-to-r from-gray-800 to-gray-900 shadow-xl rounded-lg flex flex-col items-center justify-center">
        <h2 class="text-3xl font-semibold text-gray-200 mb-6">Upload Your Music</h2>
        <form action="koneksi.php" method="post" enctype="multipart/form-data" class="space-y-6 w-full max-w-md">
            <div>
                <label for="title" class="block text-lg font-medium text-gray-300 mb-2">Song Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter song title" required class="w-full p-3 border border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white">
            </div>
            <div>
                <label for="artist" class="block text-lg font-medium text-gray-300 mb-2">Artist Name:</label>
                <input type="text" id="artist" name="artist" placeholder="Enter artist name" required class="w-full p-3 border border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white">
            </div>
            <div>
                <label for="file" class="block text-lg font-medium text-gray-300 mb-2">Upload Music File:</label>
                <input type="file" id="file" name="file" accept="audio/*" required class="w-full p-3 border border-gray-600 rounded-lg shadow-sm bg-gray-700 text-white">
            </div>
            <div>
                <label for="genre" class="block text-lg font-medium text-gray-300 mb-2">Genre:</label>
                <select id="genre" name="genre" required class="w-full p-3 border border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white">
                    <option value="pop">Pop</option>
                    <option value="rock">Rock</option>
                    <option value="jazz">Jazz</option>
                    <option value="classical">Classical</option>
                    <option value="hip-hop">Hip-Hop</option>
                </select>
            </div>
            <div>
                <label for="description" class="block text-lg font-medium text-gray-300 mb-2">Description:</label>
                <textarea id="description" name="description" rows="4" placeholder="Describe your music..." class="w-full p-3 border border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white"></textarea>
            </div>
            <button type="submit" class="w-full py-3 bg-blue-600 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Upload
                <div class="spinner spinner-hidden"></div> <!-- Spinner -->
            </button>
        </form>        
    </main>
    <footer class="bg-gray-900 text-gray-400 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Music Uploader. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // JavaScript untuk menambahkan animasi spinner saat tombol di-click
        const uploadButton = document.querySelector("button");
        const spinner = uploadButton.querySelector(".spinner");

        // Tangani klik tombol
        uploadButton.addEventListener("click", function (event) {
            event.preventDefault();  // Mencegah form submit langsung
            uploadButton.classList.add("uploading");

            // Secara opsional, kita bisa menunggu beberapa detik untuk mensimulasikan upload
            setTimeout(function () {
                // Kirim form secara manual atau lanjutkan ke PHP sesuai dengan kebutuhan
                document.querySelector("form").submit();  // Submit form setelah animasi selesai

                // Bisa lanjutkan ke halaman sukses atau beri feedback setelah upload selesai
                alert("Upload berhasil!");
            }, 3000); // Misalnya 3 detik untuk simulasi
        });
    </script>
</body>
</html>
