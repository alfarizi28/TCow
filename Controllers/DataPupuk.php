<?php

require '../Models/PupukModel.php';

$pupuk = new PupukModel();

if(isset($_GET['act'])){
    $act = $_GET['act'];
    if($act == 'edit'){
        $id = $_GET['id'];
        $data = [
            'id' => $_GET['id'],
            'nama_pupuk' => $_POST['nama_pupuk'],
            'tanggal_produksi' => $_POST['tanggal_produksi'],
            'ukuran' => $_POST['ukuran'],
            'harga' => $_POST['harga'],
            'stock' => $_POST['stock'],
        ];
        $pupuk->update($data);
        if ($pupuk) {
            header('Location: ../Views/pages/pupuk.php');
        }
    }
    else if($act == 'add'){
        $data = [
            'nama_pupuk' => $_POST['nama_pupuk'],
            'tanggal_produksi' => $_POST['tanggal_produksi'],
            'ukuran' => $_POST['ukuran'],
            'harga' => $_POST['harga'],
            'stock' => $_POST['stock'],
        ];
        $pupuk->insertNew($data);
        if ($pupuk) {
            header('Location: ../Views/pages/pupuk.php');
        }
    }
    else if($act == 'getAjax'){
        $id = $_GET['id'];
        $data = $pupuk->findPupukAjax($id);
        $response = array('Success' => true, 'data' => $data);
        echo json_encode($response);
    }
    else if($act == 'delete'){
        $id = $_GET['id'];
        $pupuk->delete($id);
        if ($pupuk) {
            header('Location: ../Views/pages/pupuk.php');
        }
    }
}
?>