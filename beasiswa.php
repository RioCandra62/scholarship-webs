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
    <h2>Daftar Beasiswa</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- ID                  : <input type="text" name="id"><br> -->
        Masukan Nama : <input class="form-control rounded-lg" type="text" name="nama" value="<?= $v['nama']?>"><br>
        Masukan Email : <input class="form-control rounded-lg" type="text" name="email"><br>
        Nomor HP : <input class="form-control rounded-lg" type="text" name="hp"><br>
        semester saat ini :
        <select class="form-control rounded-lg" name="semester" id="">
            <?php
                    for ($i = 1; $i<=8; $i++){
                        ?>
            <option value="<?= $i?>">Semester <?= $i?></option>
            <?php
                    }
                ?>
        </select> <br>
        IPK Terakhir : <input class="form-control rounded-lg" type="text" name="ipk" value="<?= $v[ipk]?>" disabled><br>

        Pilih Beasiswa :
        <select class="form-control rounded-lg" name="beasiswa" id="" <?php if($v['ipk'] < 3){ echo "disabled";}?>>
            <optgroup label="Pilih Beasiswa">
                <?php
                    for ($i = 1; $i<=3; $i++){
                        ?>
                <option value="Beasiswa <?= $i?>">Beasiswa <?=$i?></option>
                <?php
                    }
                ?>
            </optgroup>
        </select><br>
        Upload Berkas : <input class="form-control rounded-lg" type="file" name="berkas"><br>
        <input type="reset" name="reset" value="reset" class="btn btn-warning btn-rounded">
        <input class="btn btn-purple btn-rounded" type="submit" value="simpan" name="simpan"
            <?php if($v['ipk'] < 3){ echo "disabled";}?>>
    </form>

    <?php
    if(isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $semester = $_POST['semester'];
        $beasiswa = $_POST['beasiswa'];

        $berkas = $_FILES['berkas']['name'];
        $location = $_FILES['berkas']['tmp_name'];


        $upload = move_uploaded_file($location, 'assets/' . $berkas);

        if($upload){
            $sql = mysqli_query($conn, "INSERT INTO beasiswa VALUE('$id', '$email', '$hp', '$semester', '$beasiswa', '$berkas', DEFAULT, DEFAULT)");
        }   

        if($sql){
            ?>
    <script>
    alert("data saved");
    window.location.href = "?page=beasiswa"
    </script>
    <?php
        }

    }
    ?>
</body>

</html>