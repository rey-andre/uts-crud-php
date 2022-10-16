<?php
include 'connect.php';
if(isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $data = mysqli_fetch_array($query);

    if(mysqli_num_rows($query) != 0){
        if($password == $data['password']){
            // login valid

            session_start();
            $_SESSION['username'] = $data['username'];

            header('location:../dashboard.php');
        } else{
            // pass salah
            header('location:../login.php?pesan=Password Salah');

        }
    } else{
        header('location:../login.php?pesan=Username Salah');
    }
}

?>