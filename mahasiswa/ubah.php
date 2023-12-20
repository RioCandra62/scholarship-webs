<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
$v = $sql->fetch_assoc();
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
    <h2>Edit Data</h2>
    <form action="" method="post">
        ID : <input class="form-control rounded-lg" type="text" name="id" value="<?= $v['id_mahasiswa']?>" readonly><br>
        Nama : <input class="form-control rounded-lg" type="text" name="nama" value="<?= $v['nama']?>"><br>
        IPK : <input class="form-control rounded-lg" type="text" name="ipk" value="<?= $v['ipk']?>"><br>
        <input class="btn btn-warning btn-rounded " type="reset" name="reset">
        <input class="btn btn-purple btn-rounded" type="submit" name="simpan">
    </form>
    <?php
    if(isset($_POST['simpan'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $ipk = $_POST['ipk'];

        $sql = mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', ipk='$ipk' WHERE id_mahasiswa='$id'");

        if($sql){
            ?>
    <script>
    alert("Data Edited!");
    window.location.href =
        "<?php if($_SESSION['name'] == "admin"){echo "?page=mahasiswa";}else{echo "?page=session&sub=mahasiswa";}?>"
    </script>
    <?php
        }
    }
    ?>
</body>

</html>