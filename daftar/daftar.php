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
    <form action="" method="post">
        <!-- ID                  : <input type="text" name="id"><br> -->
        Masukan Nama :
        <select class="form-control rounded-lg">
            <optgroup label="pilih nama">

                <?php
                    $sql = mysqli_query($conn, "SELECT * from mahasiswa left join beasiswa on mahasiswa.id_mahasiswa = beasiswa.id_beasiswa where ipk > 3 ");
                    while($o = $sql->fetch_assoc()){
                        ?>
                <option value=""><?=  $o['nama'] ?></option>
                <?php
                    }
                    ?>
            </optgroup>
        </select><br>
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
        IPK Terakhir : <input class="form-control rounded-lg" type="text" name="ipk" id="ipk" disabled><br>

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
        <input type="submit" value="simpan" name="simpan" <?php if($v['ipk'] < 3){ echo "disabled";}?>>
    </form>

    <?php
    if(isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $semester = $_POST['semester'];
        $beasiswa = $_POST['beasiswa'];
        // $berkas = $_POST['berkas'];

        $sql = mysqli_query($conn, "INSERT INTO beasiswa VALUE('$id', '$email', '$hp', '$semester', '$beasiswa', 'sementara')");

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
    <script>
    function showIpk(str) {
        if (str == "") {
            document.getElementById("ipk").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getuser.php?q=" + str, true);
            xmlhttp.send();
        }
    }
    </script>
    <?php
    $q = intval($_GET['q']);
    $sql="SELECT * FROM user WHERE id = '".$q."'";
    $result = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($result)) {
        ?>
    <?= $row['ipk']?>
    <?php
      }
    ?>
</body>

</html>