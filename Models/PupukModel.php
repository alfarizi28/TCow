<?php
// Get from database db_pupuk
class PupukModel
{
    // Declare private variable
    public function connection(){
        return new mysqli('localhost', 'root', '', 'db_sapi');
    }
    public function getAll()
    {
        $query = "SELECT * FROM pupuk";
        $data_pupuk = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = [];
        while ($row = mysqli_fetch_assoc($data_pupuk)) {
            $result[] = $row;
        }
        return $result;
    }
    public function findPupuk($id)
    {
        $query = "SELECT * FROM pupuk WHERE id_pupuk = $id";
        $data_pupuk = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = mysqli_fetch_assoc($data_pupuk);
        return $result;
    }
    public function findPupukAjax($id)
    {
        $query = "SELECT * FROM pupuk WHERE id_pupuk = $id";
        $data_pupuk = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = mysqli_fetch_assoc($data_pupuk);
        return $result;
    }
    public function update($data)
    {
        $query = "UPDATE pupuk SET nama_pupuk = '$data[nama_pupuk]', tanggal_produksi = '$data[tanggal_produksi]', ukuran = '$data[ukuran]', harga = '$data[harga]', stock = '$data[stock]' WHERE id_pupuk = $data[id]";
        $data_pupuk = mysqli_query($this->connection(), $query);
        return $data_pupuk;
    }
    public function delete($id)
    {
        $query = "DELETE FROM pupuk WHERE id_pupuk = $id";
        $data_pupuk = mysqli_query($this->connection(), $query);
        return $data_pupuk;
    }
    public function insertNew($data)
    {
        $query = "INSERT INTO pupuk (nama_pupuk, tanggal_produksi, ukuran, harga, stock) VALUES ('$data[nama_pupuk]','$data[tanggal_produksi]','$data[ukuran]','$data[harga]','$data[stock]')";
        $data_pupuk = mysqli_query($this->connection(), $query);
        return $data_pupuk;
    }
}

