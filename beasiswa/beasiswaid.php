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

</style>
<body>
    <h2>Data Beasiswa</h2>
    <!-- <a href="?page=mahasiswa&action=add">Tambah Data</a> -->
    <div class="container ">
    <table class="table table-striped table-bordered">
        <thead  class="">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Semester</th>
                <th>IPK</th>    
                <th>Beasiswa</th>
                <th>Berkas</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        $id = $_GET['id'];
        $sql = mysqli_query($conn, "SELECT * from mahasiswa INNER JOIN beasiswa ON mahasiswa.id_mahasiswa = beasiswa.id_beasiswa WHERE id_mahasiswa='$id'");
        while ($d = $sql->fetch_assoc()) {
        ?>
        <tr class="text-center">
            <td><?= $d['id_beasiswa']?></td>
            <td><?= $d['nama']?></td>
            <td><?= $d['email']?></td>
            <td><?= $d['hp']?></td>
            <td><?= $d['semester']?></td>
            <td><?= $d['ipk']?></td>
            <td>
                <?php
                $img = "";
                if ($d['beasiswa'] == ""){
                    ?>
                    <a href="?page=mahasiswa&action=beasiswa&id=<?= $d['id_mahasiswa']?>">Daftar Beasiswa</a>
                    <?php
                } else{
                    echo $d['beasiswa'];
                }
                ?>
            </td>
            <td>

                <?php if($d['berkas'] == "" ){echo "berkas tidak ditemukan";}else{echo "<a href="."assets/".$d['berkas']."><div style=\"background-image:url(assets/".$d['berkas']."); width:100px; height:120px; background-size:cover; background-position: center; background-repeat: no-repeat;\"></div></a>";}?>
            </td>
            <td>
                <a href="?page=beasiswa&action=edit&id=<?= $d['id_mahasiswa']?>">Edit</a>
                <a href="?page=beasiswa&action=delete&id=<?= $d['id_mahasiswa']?>">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    </div>
</body>
</html>