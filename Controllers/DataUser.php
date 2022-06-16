<?php
require '../Models/UserModel.php';

$model = new UserModel();

if(isset($_GET['act'])){
    $act = $_GET['act'];
    if($act == 'edit'){
        $id = $_POST['id_user'];

        if (isset($_GET['type']) && $_GET['type'] == 'owner') {
            $data = [
                'id_user' => $_POST['id_user'],
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'no_telepon' => $_POST['no_telp'],
                'email' => $_POST['email'],
            ];

            $model->update($data);
            if ($model) {
                header('Location: ../Views/landing.php');
            }
        }

        if (isset($_GET['type']) && $_GET['type'] == 'customer') {
            $data = [
                'id_customer' => $_POST['id_user'],
                'nama_customer' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'no_telepon' => $_POST['no_telp'],
                'email' => $_POST['email'],
            ];

            $model->updateCust($data);
            if ($model) {
                header('Location: ../Views/landing.php');
            }
        }
    }else if($act == 'auth'){
        $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $model->authOwner($email, $password);
            if($result){
                // create session
                session_start();
                // session user to owner
                $_SESSION['user'] = 'owner';
                $_SESSION['data_user'] = $result;
                header('Location: ../Views/landing.php');
            }else{
                header('Location: ../Views/admin/login.php?act=error');
            }
    }else if($act == 'signup'){
        $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $model->addUser($email, $password);
            if($result){
                header('Location: ../Views/login/login.php');
            }else{
                header('Location: ../Views/login/login.php?act=error');
            }
    }else if($act == 'authcust'){
        $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $model->authCustomer($email, $password);
            if($result){
                // create session
                session_start();
                // session user to customer
                $_SESSION['user'] = 'customer';
                $_SESSION['data_user'] = $result;
                header('Location: ../Views/landing.php');
            }else{
                header('Location: ../Views/login/login.php?act=error');
            }
    }else if($act == 'logout'){
        session_start();
        session_destroy();

        header("Location: ../index.php");
    }
    // switch ($act) {
    //     case 'auth':
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];
    //         $result = $model->authOwner($email, $password);
    //         if($result){
    //             // create session
    //             session_start();
    //             // session user to owner
    //             $_SESSION['user'] = 'owner';
    //             $_SESSION['data_user'] = $result;
    //             header('Location: ../Views/landing.php');
    //         }else{
    //             header('Location: login.php?act=error');
    //         }
    //         break;
    //     case 'signup':
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];
    //         $result = $model->addUser($email, $password);
    //         if($result){
    //             header('Location: ../Views/login/login.php');
    //         }else{
    //             header('Location: ../Views/login/login.php?act=error');
    //         }
    //         break;
    //     case 'authcust':
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];
    //         $result = $model->authCustomer($email, $password);
    //         if($result){
    //             // create session
    //             session_start();
    //             // session user to customer
    //             $_SESSION['user'] = 'customer';
    //             header('Location: ../Views/landing.php');
    //         }else{
    //             header('Location: ../Views/login/login.php?act=error');
    //         }
    //         break;
    //     case 'edit':
    //         $id = $_POST['id_user'];
    //         $data = [
    //             'id_user' => $_POST['id_user'],
    //             'nama' => $_POST['nama'],
    //             'jenis_kelamin' => $_POST['jenis_kelamin'],
    //             'no_telepon' => $_POST['no_telp'],
    //             'email' => $_POST['email'],
    //         ];
    //         $model->update($data);
    //         if ($model) {
    //             header('Location: ../Views/landing.php');
    //         }else{
    //             header('Location: ../Views/landing.php');
    //         }
    //         break;
    //     case 'delete':
    //         break;
    //     default:
    //         echo "Action not found";
    //         break;
    // }
}