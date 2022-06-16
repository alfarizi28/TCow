<?php
// Get from database db_sapi
class SapiModel
{
    // Declare private variable
    public function connection(){
        return new mysqli('localhost', 'root', '', 'db_sapi');
    }
    public function getAll()
    {
        $query = "SELECT * FROM sapi";
        $data_sapi = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = [];
        while ($row = mysqli_fetch_assoc($data_sapi)) {
            $result[] = $row;
        }
        return $result;
    }
    public function findSapi($id)
    {
        $query = "SELECT * FROM sapi WHERE id_sapi = $id";
        $data_sapi = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = mysqli_fetch_assoc($data_sapi);
        return $result;
    }
    public function update($data)
    {
        $query = "UPDATE sapi SET jenis_kelamin = '$data[jenis_kelamin]', umur = '$data[umur]', status = '$data[status]', kondisi_sapi = '$data[kondisi]', id_owner = '$data[id_owner]' WHERE id_sapi = $data[id]";
        $data_sapi = mysqli_query($this->connection(), $query);
        return $data_sapi;
    }
    public function delete($id)
    {
        $query = "DELETE FROM sapi WHERE id_sapi = $id";
        $data_sapi = mysqli_query($this->connection(), $query);
        return $data_sapi;
    }
    public function insertNew($data)
    {
        $query = "INSERT INTO sapi (jenis_kelamin, umur, status, kondisi_sapi, id_owner) VALUES ('$data[jenis_kelamin]','$data[umur]','$data[status]','$data[kondisi_sapi]','$data[id_owner]')";
        $data_sapi = mysqli_query($this->connection(), $query);
        return $data_sapi;
    }
}

