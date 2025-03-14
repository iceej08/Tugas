<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate CV</title>
    <link rel="stylesheet" type="text/css" href="cvstyle.css">
</head>
<body>
    <div class="container2">
        <h1>Generate Your CV</h1>
        <form enctype="multipart/form-data" action="showcv.php" method="POST">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="tempat">Tempat Lahir:</label>
            <input type="text" id="tempat" name="tempat" required>

            <p class="tanggal">
            <label for="tanggal">Tanggal Lahir:</label>
            <input type="date" id="tanggal" name="tanggal" required>
            </p>

            <label for="pendidikan">Riwayat Pendidikan:</label>
            <textarea id="pendidikan" name="pendidikan" rows="5" required></textarea>

            <label for="foto">Upload Foto Anda.</label>
            <input name="foto" id="foto" type="file" accept="image/*" style="margin-bottom: 15px; margin-left: 60px;">
            
            <button type="submit">Create CV</button>
        </form>
        <br>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>