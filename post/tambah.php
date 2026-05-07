<?php
include '../koneksi/koneksi.php';

if(isset($_POST['submit'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn, "
        INSERT INTO posts(title, content)
        VALUES('$title', '$content')
    ");

    header("Location: index.php");
}
?>

<h1>Tambah Post</h1>

<form method="POST">

    <input 
        type="text" 
        name="title"
        placeholder="Judul"
    >

    <br><br>

    <textarea 
        name="content"
        placeholder="Isi konten"
    ></textarea>

    <br><br>

    <button type="submit" name="submit">
        Simpan
    </button>

</form>