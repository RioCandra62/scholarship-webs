<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <ul>
        <li><a href="?page=mahasiswa">Data Mahasiwa</a></li>
        <li><a href="?page=beasiswa">Data Beasiswa</a></li>
        <li><a href="?page=daftar">Daftar Beasiswa</a></li>
    </ul>
    <?php
    $page = $_GET['page'];
    $action = $_GET['action'];  

    if($page == 'mahasiswa'){
        if ($action == ""){
            include "mahasiswa/mahasiswa.php";
        } elseif($action == "add"){
            include "mahasiswa/tambah.php";
        } elseif($action == "edit"){
            include "mahasiswa/ubah.php";
        }elseif($action == "delete"){
            include "mahasiswa/hapus.php";
        }elseif($action == "beasiswa"){
            include "beasiswa.php";
        }
    } elseif($page == 'beasiswaid'){
        include "beasiswa/beasiswaid.php";
    } elseif($page == 'beasiswa'){
        if($action == ""){
            include "beasiswa/beasiswa.php";
        } elseif($action == "edit"){
            include "beasiswa/ubah.php";
        }elseif($action == "delete"){
            include "beasiswa/hapus.php";
        }
    } elseif($page == 'daftar'){
        include "daftar/daftar.php";
    } 
    ?>
</body>
</html>