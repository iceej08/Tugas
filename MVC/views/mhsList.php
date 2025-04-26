<body>
<h1>Data Mahasiswa</h1>
<table class="tabel">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Alamat</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($mahasiswa as $mhs):?>
        <tr>
            <td><?= $mhs['id'] ?></td>
            <td><?= $mhs['nama'] ?></td>
            <td><?= $mhs['nim'] ?></td>
            <td><?= $mhs['alamat'] ?></td>
            <td>
                <button><a href="index.php?edit=<?= $row['id'] ?>" class="edit">Edit</a></button>
                <button><a href="index.php?action=delete&id=<?= $row['id'] ?>" class="delete"
                onclick="return confirm('Yakin ingin menghapus?')">Delete</a></button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>