<?php
    session_start();

    if(!isset($_SESSION["login"]))
    {
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }

    require 'functions.php';

    if(isset($_POST['submit']))
    {


        if(edit($_POST)>0)
        {
            echo "
            <script>
                alert('data berhasil diperbaharui');
                document.location.href='index.php';
            </script>

            ";
        }else{
            echo "
            <script>
                alert('data gagal diperbaharui');
                document.location.href='index.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
    $id=$_GET["id"];
    //var_dump($id);

    $mhs=query("SELECT * FROM mahasiswa WHERE id=$id")[0];
    //var_dump($mhs[0]["Nama"]);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update data</title>
</head>
<body>
    <h1>Update Data Mahasiswa </h1>
    <form action="" method="POST">
        <li>
            <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
            <input type="hidden" name="GambarLama" value="<?= $mhs["Gambar"] ?>">
        </li>
        <ul>
            <li>
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama" value="<?= $mhs["Nama"]; ?>">
            </li>
            <li>
                <label for="Nim">Nim :</label>
                <input type="text" name="Nim" id="Nim" required value="<?= $mhs["Nim"]; ?>">
            </li>
            <li>
                <label for="Email">Email :</label>
                <input type="text" name="Email" id="Email" required value="<?= $mhs["Email"]; ?>">
            </li>
            <li>
                <label for="Jurusan">Jurusan :</label>
                <input type="text" name="Jurusan" id="Jurusan" required value="<?= $mhs["Jurusan"]; ?>">
            </li>
            <li>
                <label for="Gambar">Gambar :</label>
                <img src="image/<?= $mhs[Gambar];?>" alt="" height="100" width="100"><br>
                <input type="file" name="Gambar" id="Gambar" >
            </li>
            <li>
                <button type="submit" name="submit">Update</button>
            </li>
    </form>
</body>
</html>