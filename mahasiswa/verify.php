<?php
$id = $_GET['id'];

$sql = mysqli_query($conn, "SELECT * FROM beasiswa WHERE id_beasiswa='$id'");
$d = $sql->fetch_assoc();

if($d['status'] == 0){
    $sql =  mysqli_query($conn, "UPDATE beasiswa SET status=1 where id_beasiswa='$id'");
    if($sql){
        ?> 
        <script>
            alert("Verified");
            window.location.href = "<?php if($_SESSION['name'] == "admin"){echo "?page=mahasiswa";}else{echo "?page=session&sub=mahasiswa";}?>"
        </script>
        <?php
    }
}else{
    $sql =  mysqli_query($conn, "UPDATE beasiswa SET status=0 where id_beasiswa='$id'");
    if($sql){
        ?> 
        <script>
            alert("Revoked");
            window.location.href = "<?php if($_SESSION['name'] == "admin"){echo "?page=mahasiswa";}else{echo "?page=session&sub=mahasiswa";}?>"
        </script>
        <?php
    }
}


?>