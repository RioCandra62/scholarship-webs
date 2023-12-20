<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * from mahasiswa left join beasiswa on mahasiswa.id_mahasiswa = beasiswa.id_beasiswa WHERE id_mahasiswa='$id'");
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
    <form action="" method="post" enctype="multipart/form-data" id="myForm">
        <!-- ID                  : <input type="text" name="id"><br> -->
        Masukan Nama : <input class="form-control rounded-lg" type="text" name="nama" value="<?= $v['nama']?>"><br>
        Masukan Email : <input class="form-control rounded-lg" type="text" name="email" value="<?= $v['email']?>"><br>
        Nomor HP : <input class="form-control rounded-lg" type="text" name="hp" maxlength=12 value="<?= $v['hp']?>"><br>
        semester saat ini :
        <select class="form-control rounded-lg" name="semester" id="">
            <optgroup label="Pilih Semester saat ini">
                <?php
                    for ($i = 1; $i<=8; $i++){
                        ?>
                <option <?php if($v['semester'] == $i){echo "selected";} ?> value="<?= $i?>">Semester <?= $i?>
                </option>
                <?php
                    }
                ?>
            </optgroup>
        </select> <br>
        IPK Terakhir : <input class="form-control rounded-lg" type="text" name="ipk" value="<?= $v[ipk]?>" disabled><br>
        Pilih Beasiswa :
        <select class="form-control rounded-lg" name="beasiswa" id="" <?php if($v['ipk'] < 3){ echo "disabled";}?>>
            <optgroup label="Pilih Beasiswa">
                <?php
                        for ($i = 1; $i<=3; $i++){
                            ?>
                <option <?php if($v['beasiswa'] == "Beasiswa ".$i){echo "selected";}?> value="Beasiswa <?= $i?>">
                    Beasiswa <?=$i?></option>
                <?php
                        }
                    ?>
            </optgroup>
        </select><br>
        Upload Berkas : <input class="form-control rounded-lg" type="file" name="berkas" value="<?= $d['berkas']?>"><br>
        <input class="btn btn-warning btn-rounded" type="submit" value="reset" name="reset">
        <input class="btn btn-purple btn-rounded" type="submit" value="simpan" name="simpan">
    </form>
    <?php
    if(isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $semester = $_POST['semester'];
        $beasiswa = $_POST['beasiswa'];
        // $berkas = $_PST['berkas'];

        $berkas = $_FILES['berkas']['name'];
        $location = $_FILES['berkas']['tmp_name'];


        $upload = move_uploaded_file($location, 'assets/' . $berkas);

        if($berkas == NULL){
            $sql2 = mysqli_query($conn, "UPDATE beasiswa SET email='$email', hp='$hp', semester='$semester', beasiswa='$beasiswa',date=DEFAULT where id_beasiswa='$id'");
        }else{
            $sql = mysqli_query($conn, "UPDATE beasiswa SET email='$email', hp='$hp', semester='$semester', beasiswa='$beasiswa', berkas='$berkas',date=DEFAULT,  where id_beasiswa='$id'");
        }
        if($sql){
            ?>
    <script>
    alert("data saved");
    window.location.href =
        "<?php if($_SESSION['name'] == "admin"){echo "?page=beasiswa";}else{echo "?page=session&sub=beasiswa";}?>"
    </script>
    <?php
        }elseif($sql2){
            ?>
    <script>
    alert("data saved");
    window.location.href =
        "<?php if($_SESSION['name'] == "admin"){echo "?page=beasiswa";}else{echo "?page=session&sub=beasiswa";}?>"
    </script>
    <?php
        }
    }
    ?>
</body>

</html>