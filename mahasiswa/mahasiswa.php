<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
/* table{
        margin-top: 10px;
    }
    table, td, th{
        border : solid gray 2px;
        border-collapse : collapse;
    }
    td{
        padding: 10px 10px;
    } */
/* $sql=mysqli_query($conn, "SELECT COUNT(*) as count FROM beasiswa;");
*/
</style>



<body>
    <h2 class="mt-2">Data Mahasiswa</h2>
    <a href="?page=mahasiswa&action=add" class=" btn btn-purple btn-sm rounded-lg">Tambah Data</a>
    <div class="container mt-2">
        <table class="table table-striped table-bordered text-center">
            <thead class="">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>IPK</th>
                    <th>Beasiswa</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
     
        $sql = mysqli_query($conn, "SELECT * from mahasiswa left join beasiswa on mahasiswa.id_mahasiswa = beasiswa.id_beasiswa;");
        $check = mysqli_query($conn, "SELECT COUNT(*) as count FROM beasiswa;");
        $ch = $check->fetch_assoc();
        while ($d = $sql->fetch_assoc()) {
        $id = $d['id_mahasiswa'];
        ?> <tr>
                <td><?= $d['id_mahasiswa']?></td>
                <td><?= $d['nama']?></td>
                <td><?= $d['ipk']?></td>
                <td>
                    <?php 
                if ($d['beasiswa'] == ""){
                    if ($d['id_beasiswa'] == ""){
                        ?>
                    <a href=" 
                    <?php 
                    if($d['ipk'] >= 3){
                        if($ch['count'] >= 10){ 
                            echo "?page=mahasiswa";
                        }else{
                            echo "?page=mahasiswa&action=beasiswa&id=".$d['id_mahasiswa'];
                        }
                    } else{
                        // echo "?page=mahasiswa";
                    }
                            ?>"
                        onclick="<?php if($d['ipk'] < 3 ) { echo "alert('ipk tidak mencukupi')"; } if($ch['count'] >= 10){ echo "alert('Quota beasiswa telah habis')";}?>">Daftar
                        Beasiswa</a>
                    <?php
                        } else{   
                    }
                } else{
                    ?>
                    <a href="?page=beasiswaid&id=<?= $d['id_mahasiswa']?>"><?= $d['beasiswa']?></a>
                    <?php
                }
                ?>
                </td>
                <td class="text-center">
                    <?php if($d['beasiswa'] != NULL){ if($d['status'] == 0){echo "Unverified";}else{echo "Verified";}}else{echo "belum daftar";}?>
                </td>
                <td class="text-center">
                    <a href="?page=mahasiswa&action=edit&id=<?= $d['id_mahasiswa']?>">Edit</a>
                    <a href="?page=mahasiswa&action=delete&id=<?= $d['id_mahasiswa']?>"
                        onclick="alert('delete?')">Hapus</a>
                    <?php 
                    if($d['beasiswa'] != NULL){
                        if($d['status'] == 0){
                            echo "<a style=\"background-color: rgb(111,66,193)\" class=\"text-light p-2 rounded-lg\" href=\"?page=mahasiswa&action=verify&id=". $d['id_mahasiswa']."\">Verifikasi</a>";
                        }else{
                            echo "<a class=\"text-light bg-danger p-2 rounded-lg\" href=\"?page=mahasiswa&action=verify&id=". $d['id_mahasiswa'] ."\">Revoke</a>";
                        }
                    }?>
                </td>
            </tr>
            <?php
        }
        ?>
        </table>
    </div>
</body>

</html>