<?php

class UserModel
{
    public function connection()
    {
        $connection = new mysqli("localhost", "root", "", "db_sapi");
        return $connection;
    }
    public function getAll()
    {
        $query = "SELECT * FROM owner";
        $data_owner = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = [];
        while ($row = mysqli_fetch_assoc($data_owner)) {
            $result[] = $row;
        }
        return $result;
    }
    public function getAllCust()
    {
        $query = "SELECT * FROM customer";
        $data_owner = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = [];
        while ($row = mysqli_fetch_assoc($data_owner)) {
            $result[] = $row;
        }
        return $result;
    }
    public function findOwner($id)
    {
        $query = "SELECT * FROM owner WHERE id_owner = $id";
        $data_owner = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = mysqli_fetch_assoc($data_owner);
        return $result;
    }
    public function authOwner($email, $password)
    {
        $connection = $this->connection();
        $sql = "SELECT * FROM owner WHERE email = '$email' AND password = '$password'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    public function authCustomer($email, $password)
    {
        $connection = $this->connection();
        $sql = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    public function findCustomer($id)
    {
        $query = "SELECT * FROM owner WHERE id_customer = $id";
        $data_customer = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = mysqli_fetch_assoc($data_customer);
        return $result;
    }
    public function addUser($email, $password)
    {
        $connection = $this->connection();
        $sql = "INSERT INTO customer (email, password) VALUES ('$email', '$password')";
        $result = $connection->query($sql);
        return $result;
    }
    public function update($data)
    {
        $query = "UPDATE owner SET nama = '$data[nama]', jenis_kelamin = '$data[jenis_kelamin]', no_telepon = '$data[no_telepon]', email = '$data[email]' WHERE id_owner = $data[id_user]";
        $data_owner = mysqli_query($this->connection(), $query);
        return $data_owner;
    }
    public function updateCust($data)
    {
        $query = "UPDATE customer SET nama_customer = '$data[nama_customer]', jenis_kelamin = '$data[jenis_kelamin]', no_telepon = '$data[no_telepon]', email = '$data[email]' WHERE id_customer = $data[id_customer]";
        $data_customer = mysqli_query($this->connection(), $query);
        return $data_customer;
    }
    public function getLastCust()
    {
        $query = "SELECT * FROM customer ORDER BY id_customer DESC LIMIT 1";
        $data_owner = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        
        $result = mysqli_fetch_assoc($data_owner);
        return $result;
    }
    public function newCust($data)
    {
        $query = "INSERT INTO customer (nama_customer, jenis_kelamin, no_telepon, email, password) VALUES ('$data[nama_customer]','$data[jenis_kelamin]','$data[no_telepon]','$data[email]','$data[password]')";
        $data_customer = mysqli_query($this->connection(), $query);
        return $data_customer;
    }
    public function findAccount($id, $type)
    {
        $query = "SELECT * FROM ".$type." WHERE id_".$type." = $id";
        $data = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = mysqli_fetch_assoc($data);
        return $result;
    }
}