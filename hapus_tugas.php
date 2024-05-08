<?php
if(isset($_GET['idp'])){ 
    $idp = mysqli_real_escape_string($conn, $_GET['idp']);
    // Ambil nama file gambar untuk dihapus
    $tugas = mysqli_query($conn, "SELECT tugas_image FROM tb_tugas WHERE tugas_id = '$idp'");
    $p = mysqli_fetch_object($tugas); 
    $filename = $p->tugas_image;
    
    // Hapus file gambar dari direktori
    $filepath = './tugas/' . $filename;
    if (file_exists($filepath)) {
        unlink($filepath);
    }

    // Hapus data tugas dari database
    $delete = mysqli_query($conn, "DELETE FROM tb_tugas WHERE tugas_id = '$idp'");
    if($delete){ 
        echo '<script>window.location="tugas.php"</script>';
    } else {
        echo '<script>alert("Gagal menghapus data tugas")</script>';
    }
}
