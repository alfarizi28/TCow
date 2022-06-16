<?php

require '../Models/SapiModel.php';

$sapi = new SapiModel();

if(isset($_GET['act'])){
    $act = $_GET['act'];
    if($act == 'edit'){
        $id = $_GET['id'];
        $data = [
            'id' => $_GET['id'],
            'jenis_kelamin' => $_POST['jenis_kelamin'],
            'umur' => $_POST['umur'],
            'status' => $_POST['status'],
            'kondisi' => $_POST['kondisi_sapi'],
            'id_owner' => $_POST['id_owner'],
        ];
        $sapi->update($data);
        if ($sapi) {
            header('Location: ../Views/pages/sapi.php');
        }
    }
    else if($act == 'add'){
        $data = [
            'jenis_kelamin' => $_POST['jenis_kelamin'],
            'umur' => $_POST['umur'],
            'status' => $_POST['status'],
            'kondisi_sapi' => $_POST['kondisi_sapi'],
            'id_owner' => $_POST['id_owner'],
        ];
        $sapi->insertNew($data);
        if ($sapi) {
            header('Location: ../Views/pages/sapi.php');
        }
    }
    else if($act == 'delete'){
        $id = $_GET['id'];
        $sapi->delete($id);
        if ($sapi) {
            header('Location: ../Views/pages/sapi.php');
        }
    }

}
?>