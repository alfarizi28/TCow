<?php
// Check if admin is logged in
if(isset($_GET['admin'])){
    if($_GET['admin'] == 'true'){
        header('location: Views/login/admin.php');
    }
}
else{
    header('location: Views/login/login.php');
}
