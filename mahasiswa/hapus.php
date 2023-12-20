<?php
$id = $_GET['id'];
$sql1 = mysqli_query($conn, "DELETE FROM mahasiswa where id_mahasiswa='$id'");
$sql2 = mysqli_query($conn, "DELETE FROM beasiswa where id_beasiswa='$id'");

$sql = $sql1; $sql2;

if($sql){
    ?>
    <script>
        alert("Data Deleted");
        window.location.href = "<?php if($_SESSION['name'] == "admin"){echo "?page=mahasiswa";}else{echo "?page=session&sub=mahasiswa";}?>"
    </script>
    <?php
}
?>