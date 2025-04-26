<?php
class Mahasiswa {
    private $conn;
    private $table = 'mahasiswa';

    public function __construct() {
        // Koneksi database
        $this->conn = new mysqli('localhost', 'root', 'payung', 'mahasiswadb');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Ambil semua data mahasiswa
    public function getAll() {
        $result = $this->conn->query("SELECT id, nama, nim, alamat FROM {$this->table}");
        return $result;
    }

    // Ambil data mahasiswa berdasarkan ID
    public function getById($id) {
        $id = (int)$id;
        $result = $this->conn->query("SELECT * FROM {$this->table} WHERE id=$id");
        return $result->fetch_assoc();
    }

    // Tambah data mahasiswa baru
    public function create($data) {
        $nama = $this->conn->real_escape_string($data['nama'] ?? '');
        $nim = $this->conn->real_escape_string($data['nim'] ?? '');
        $alamat = $this->conn->real_escape_string($data['alamat'] ?? '');
        
        return $this->conn->query("INSERT INTO {$this->table} (nama, nim, alamat) VALUES ('$nama', '$nim', '$alamat')");
    }

    // Update data mahasiswa
    public function update($id, $data) {
        $id = (int)$id;
        $nama = $this->conn->real_escape_string($data['nama']);
        $nim = $this->conn->real_escape_string($data['nim']);
        $alamat = $this->conn->real_escape_string($data['alamat']);
        
        return $this->conn->query("UPDATE {$this->table} SET nama='$nama', nim='$nim', alamat='$alamat' WHERE id=$id");
    }

    // Hapus data mahasiswa
    public function delete($id) {
        $id = (int)$id;
        return $this->conn->query("DELETE FROM {$this->table} WHERE id=$id");
    }


}
?>