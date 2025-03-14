<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

// Ambil data dari form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $pendidikan = $_POST['pendidikan'];
    $email = $_SESSION['email'];
    
    if(isset($_FILES['foto'])){
        $upload_dir = "uploads/";

    $target_file = $upload_dir . basename($_FILES['foto']['name']);

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)){
        $foto = $target_file;
    } else{
        die("Upload gagal.");
    }
} else{
    die("Tidak ada foto yang terupload.");
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result - CV Generator</title>
    <link rel="stylesheet" type="text/css" href="cvstyle.css">
</head>
<body>
    <div class="container3">
        <h1>Curriculum Vitae</h1>
        <hr>
        <?php if(!empty($foto)): ?>
        <img src="<?php echo $foto; ?>" alt="Foto Profil"
        class="foto">
        <?php endif; ?>

        <br>

        <p><strong>Email: <br></strong>
        <?php echo $email; ?></p>

        <p><strong>Nama Lengkap: <br></strong>
        <?php echo $nama; ?></p>
        
        <p><strong>Tempat, Tanggal Lahir: <br></strong>
        <?php echo "$tempat, $tanggal"; ?></p>
        
        <p><strong>Riwayat Pendidikan:</strong></p>
        
        <p><?php echo nl2br($pendidikan); ?></p>
        
        <hr>
        <a style="margin-top: 10px;" href="form.php">Kembali ke Form</a> | 
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>