<?php
// Get from database db_pesanan
class PesananModel
{
    // Declare private variable
    public function connection(){
        return new mysqli('localhost', 'root', '', 'db_sapi');
    }
    public function getAll()
    {
        $query = "SELECT * FROM pesanan JOIN pupuk ON pesanan.id_pupuk=pupuk.id_pupuk";
        $data_pesanan = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = [];
        while ($row = mysqli_fetch_assoc($data_pesanan)) {
            $result[] = $row;
        }
        return $result;
    }

    public function getPesananCust($id_cust)
    {
        $query = "SELECT * FROM pesanan JOIN pupuk ON pesanan.id_pupuk=pupuk.id_pupuk WHERE pesanan.id_user = $id_cust";
        $data_pesanan = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = [];
        while ($row = mysqli_fetch_assoc($data_pesanan)) {
            $result[] = $row;
        }
        return $result;
    }

    public function findPesanan($id)
    {
        $query = "SELECT * FROM pesanan JOIN pupuk ON pesanan.id_pupuk=pupuk.id_pupuk JOIN customer ON pesanan.id_user=customer.id_customer WHERE id_pesanan = $id";
        $data_pesanan = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = mysqli_fetch_assoc($data_pesanan);
        return $result;
    }
    public function updateOwner($data)
    {
        $query = "UPDATE pesanan SET jumlah = '$data[jumlah]', status = '$data[status]', tgl_pemesanan = '$data[tgl_pemesanan]' WHERE id_pesanan = $data[id_pesanan]";
        $data_pesanan = mysqli_query($this->connection(), $query);
        return $data_pesanan;
    }
    public function update($data)
    {
        $query = "UPDATE pesanan SET jumlah = '$data[jumlah]', tgl_pengiriman = '$data[tgl_pengiriman]' WHERE id_pesanan = $data[id_pesanan]";
        $data_pesanan = mysqli_query($this->connection(), $query);
        return $data_pesanan;
    }
    public function delete($id)
    {
        // $query = "DELETE FROM pupuk WHERE id_pupuk = $id";
        // $data_pupuk = mysqli_query($this->connection(), $query);
        // return $data_pupuk;
    }
    public function insertNew($data)
    {
        $query = "INSERT INTO pesanan (id_user, id_pupuk, jumlah, status, tgl_pengiriman, tgl_pemesanan) VALUES ('$data[id_user]','$data[id_pupuk]','$data[jumlah]','$data[status]','$data[tgl_pengiriman]','$data[tgl_pemesanan]')";
        $data_pesanan = mysqli_query($this->connection(), $query);
        return $data_pesanan;
    }
}

