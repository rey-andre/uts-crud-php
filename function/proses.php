<?php
include 'connect.php';
if(isset($_POST['btnProses'])){
    $judul = $_POST['judul'];
    $ringkasan = $_POST['ringkasan'];

    if($_POST['btnProses']=="tambah"){

        $gambar = $_FILES['gambar']['name'];
        $dir = "../assets/";
        $dirFile = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($dirFile,$dir . $gambar);

        $query = "INSERT INTO berita VALUES ('','$gambar','$judul','$ringkasan')";
        $sql = mysqli_query($conn, $query);
        if($sql){
            header('location:../berita.php');
        }
    } else {
        // echo "edit data";
        if($_FILES['gambar']['name']!=""){
            $queryHapus = "SELECT gambar FROM berita WHERE id='$_POST[id]'";
            $sqlHapus=mysqli_query($conn,$queryHapus);
            $data=mysqli_fetch_array($sqlHapus);
            unlink("../assets/".$data['gambar']);

            $gambar = $_FILES['gambar']['name'];
            $dir = "../assets/";
            $dirFile = $_FILES['gambar']['tmp_name'];
            move_uploaded_file($dirFile,$dir . $gambar);

            $query = "UPDATE berita SET gambar='$gambar', judul='$judul', ringkasan='$ringkasan' WHERE id='$_POST[id]'";
            
        }else {
            $query = "UPDATE berita SET judul='$judul', ringkasan='$ringkasan' WHERE id='$_POST[id]'";
        }
        $sql = mysqli_query($conn,$query);
            if($sql){
                header('location:../berita.php');
            }
    }
} elseif($_GET['hapus']){
    $queryHapus = "SELECT gambar FROM berita WHERE id='$_GET[hapus]'";
    $sqlHapus=mysqli_query($conn,$queryHapus);
    $data=mysqli_fetch_array($sqlHapus);

    unlink("../assets/".$data['gambar']);

    $query = "DELETE FROM berita WHERE id='$_GET[hapus]'";
    $sql = mysqli_query($conn,$query);
    if($sql){
        header('location:../berita.php');
    }
}

?>