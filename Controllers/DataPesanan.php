<?php

require '../Models/PesananModel.php';
require '../Models/UserModel.php';

$pesanan = new PesananModel();
$user = new UserModel();

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if ($act == 'edit') {
        $data = [
            'id_pesanan' => $_POST['id_pesanan'],
            'jumlah' => $_POST['jumlah'],
            'tgl_pengiriman' => $_POST['tgl_pengiriman']
        ];
        $pesanan->update($data);
        if ($pesanan) {
            header('Location: ../Views/pages/pesanan.php');
        }
    }
    if ($act == 'editOwner') {
        $data = [
            'id_pesanan' => $_POST['id_pesanan'],
            'jumlah' => $_POST['jumlah'],
            'status' => $_POST['status'],
            'tgl_pemesanan' => $_POST['tgl_pemesanan']
        ];

        $pesanan->updateOwner($data);
        if ($pesanan) {
            header('Location: ../Views/pages/pesanan.php');
        }
    } else if ($act == 'add') {
        $id_user = '';
        if ($_POST['nama'] != '') {
            $dataCustomer = [
                'nama_customer' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jk'] == '' ? 'perempuan' : $_POST['jk'],
                'no_telepon' => $_POST['telp'] == '' ? '089638181254' : $_POST['telp'],
                'email' => $_POST['email'] == '' ? 'email@dummy.com' : $_POST['email'],
                'password' => $_POST['password'] == '' ? '123456' : $_POST['password']
            ];

            if ($user->newCust($dataCustomer)) {
                $lastCust = $user->getLastCust();
                $id_user = $lastCust['id_customer'];
            };
        } else {
            $id_user = $_POST['id_user'];
        }

        $dataOrder = [
            'id_user' => $id_user,
            'id_pupuk' => $_POST['id_pupuk'],
            'jumlah' => $_POST['jumlah'],
            'status' => 'pending',
            'tgl_pengiriman' => $_POST['tgl_pengiriman'],
            'tgl_pemesanan' => date("Y-m-d")
        ];

        $pesanan->insertNew($dataOrder);
        if ($pesanan) {
            header('Location: ../Views/pages/pesanan.php');
        }
    } else if ($act == 'delete') {
        // $id = $_GET['id'];
        // $pupuk->delete($id);
        // if ($pupuk) {
        //     header('Location: ../Views/pages/pupuk.php');
        // }
    }
}
