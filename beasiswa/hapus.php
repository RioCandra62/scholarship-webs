<?php
$id =  $_GET['id'];
$get = mysqli_query($conn, "SELECT * FROM beasiswa WHERE id_beasiswa='$id'");
$sql = mysqli_query($conn, "DELETE FROM beasiswa where id_beasiswa='$id'");
$img = $get->fetch_assoc();

if(is_file("assets/".$img['berkas'])){
    unlink("assets/".$img['berkas']);
}

if($sql){
    ?>
    <script>
        alert("Data Deleted!");
        window.location.href = "<?php if($_SESSION['name'] == "admin"){echo "?page=mahasiswa";}else{echo "?page=session&sub=mahasiswa";}?>"
    </script>
    <?php
    // unlink("assets/".$img['berkas']);
}
?>