<?php

class viewMahasiswa {
    public function render($mahasiswa, $editData = null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Form CRUD Mahasiswa</title>
            <style>
                body { 
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
                    padding: 10px; 
                    margin-left: 20px;
                    margin-right: 20px;
                }

                h1 { 
                    text-align: center; 
                    padding: 10px; 
                }

                div { 
                    margin-bottom: 30px; 
                }

                form { 
                    text-align: center;
                }

                input, button {
                    margin: 5px; 
                    padding: 8px;
                    border-radius: 10px; 
                    border-color: grey;
                }

                input { 
                    margin-bottom: 10px; 
                }

                button {
                    font-weight: bold; 
                    color: black; 
                    background-color: dodgerblue;
                }

                button:hover { 
                    background-color:#007bff; 
                }
                
                table {  
                    border-collapse: collapse; 
                    width: 100%; 
                    margin-top: 10px; 
                    text-align: center;
                }

                th, td { 
                    border: 1px solid #ddd; 
                    padding: 10px; 
                }

                th { 
                    background-color: #f2f2f2; 
                }

                .cancel, .edit, .delete { 
                    text-decoration: none; 
                    color: black;
                }
            </style>
        </head>
        <body>
            <div>
                <h1>Form Mahasiswa</h1>
                <form method="POST" action="">
                    <input type="text" name="nama" placeholder="Nama" required 
                        value="<?= $editData['nama'] ?? '' ?>">
                    <input type="text" name="nim" placeholder="NIM" required 
                        value="<?= $editData['nim'] ?? '' ?>">
                    <input type="text" name="alamat" placeholder="Alamat" required 
                        value="<?= $editData['alamat'] ?? '' ?>">
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
            <h1>Data Mahasiswa</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Alamat</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $mahasiswa->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['nim'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td>
                            <button><a href='?edit=<?= $row['id'] ?>' class='edit'>Edit</a></button>
                            <button><a href='?delete=<?= $row['id'] ?>' class='delete'
                                onclick='return confirm("Yakin ingin menghapus?")'>Delete</a></button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </body>
        </html>
        <?php
    }
}
?>