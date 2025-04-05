<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form CRUD</title>

    <style>
        body{ 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            padding: 10px; 
            margin-left: 20px;
            margin-right: 20px;
        }

        h1{
            text-align: center;
            padding: 10px;
        }

        div{
            margin-bottom: 30px;
        }

        form{
            text-align: center;
        }

        input, button{
            margin: 5px;
            padding: 8px;
            border-radius: 10px;
            border-color: grey;
        }

        input{
            margin-bottom: 10px;
        }

        button{
            font-weight: bold;
            color: black;
            background-color: dodgerblue;
        }

        button:hover {
            background-color:#007bff;
        }

        table{ 
            border-collapse: collapse;
            width: 100%; 
            margin-top: 10px;
            text-align: center;
        }

        .edit, .delete{
            color: black;
        }


        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th{
            background-color: #f2f2f2; 
        }
    </style>


</head>
<body>
    <div>
    <h1>Form Mahasiswa</h1>
    <form method="POST" action="">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="nim" placeholder="NIM" required>
        <input type="text" name="alamat" placeholder="Alamat" required>
        <br>
        <?php if (isset($_GET['edit'])): ?>
        <button type="submit" name="update">Update</button>
        <button><a href="?" class="cancel">Cancel</a></button>
    <?php else: ?>
        <button type="submit" name="simpan">Simpan</button>
    <?php endif; ?>

    </form>
    </div>
    <hr>    
    <?php
        $conn = new mysqli('localhost', 'root', '', 'mahasiswadb');
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        if (isset($_POST['simpan'])) {
            $nama = $conn->real_escape_string($_POST['nama'] ?? '');
            $nim = $conn->real_escape_string($_POST['nim'] ?? '');
            $alamat = $conn->real_escape_string($_POST['alamat'] ?? '');
            $conn->query("INSERT INTO mahasiswa (nama, nim, alamat) VALUES ('$nama', '$nim', '$alamat')");
        }

        if (isset($_GET['delete'])) {
            $id = (int)$_GET['delete'];
            $conn->query("DELETE FROM mahasiswa WHERE id=$id");
        }

        if(isset($_GET['edit'])){
            $id = (int)$_GET['edit'];
            $result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
            $edit = $result->fetch_assoc();
        }

        if (isset($_POST['update'])) {
            $nama = $conn->real_escape_string($_POST['nama']);
            $nim = $conn->real_escape_string($_POST['nim']);
            $alamat = $conn->real_escape_string($_POST['alamat']);
            $conn->query("UPDATE mahasiswa SET nama='$nama', nim='$nim', alamat='$alamat' WHERE id=$id");
        }

        $result = $conn->query("SELECT id, nama, nim, alamat FROM mahasiswa");

        echo "<h1> Data Mahasiswa </h1>";

        echo "<table class='tabel'><tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Alamat</th>
            <th>Actions</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['nim']}</td>
                <td>{$row['alamat']}</td>
                <td>
                        <button><a href='?edit={$row['id']}' class='edit'>Edit</a></button>
                        <button><a href='?delete={$row['id']}' class='delete'
                        onclick='return confirm(\"Yakin ingin menghapus?\")'> Delete </a></button>
                </td>
              </tr>";
        }
        echo "</table>";
        $conn->close();
    ?>
</body>
</html>