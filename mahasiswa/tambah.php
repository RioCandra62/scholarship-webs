<?php
$sql = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id_mahasiswa desc");
$d = $sql->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Tambah Data</h2>
    <form action="" method="post">
        ID : <input class="form-control rounded-lg" type="text" name="id" value="<?= $d['id_mahasiswa'] + 1;?>"
            readonly><br>
        Nama : <input class="form-control rounded-lg" type="text" name="nama"><br>
        ipk : <input class="form-control rounded-lg" type="text" name="ipk"><br>
        <input class="btn btn-info rounded-lg" type="submit" name="simpan">
    </form>
    <?php
    if(isset($_POST['simpan'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $ipk = $_POST['ipk'];

        $sql = mysqli_query($conn, "INSERT INTO mahasiswa VALUE('$id', '$nama', '$ipk')");

        if($sql){
            ?>
    <script>
    alert("Data Added!");
    window.location.href =
        "<?php if($_SESSION['name'] == "admin"){echo "?page=mahasiswa";}else{echo "?page=session&sub=mahasiswa";}?>"
    </script> 
    <?php
        }
    }
    ?>
</body>

</html>