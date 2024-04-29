<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
<body>
    <?php
    // Hubungkan ke database
    include "koneksi.php";

    // Query untuk mengambil gejala pada pertumbuhan
    $query_gejala_pertumbuhan = "SELECT id_gejala, nama_gejala FROM gejala_pertumbuhan";
    $result_gejala_pertumbuhan = mysqli_query($koneksi, $query_gejala_pertumbuhan);

    // Query untuk mengambil gejala pada daun dan malai
    $query_gejala_daun_malai = "SELECT id_gejala, nama_gejala FROM gejala_daun_malai";
    $result_gejala_daun_malai = mysqli_query($koneksi, $query_gejala_daun_malai);

    // Query untuk mengambil gejala pada batang
    $query_gejala_batang = "SELECT id_gejala, nama_gejala FROM gejala_batang";
    $result_gejala_batang = mysqli_query($koneksi, $query_gejala_batang);
    ?>

    <form method='post' action='proses.php'>
        <!-- Generate CheckBox untuk gejala pada pertumbuhan -->
        <h3>Gejala pada pertumbuhan:</h3>
        <?php while ($row = mysqli_fetch_assoc($result_gejala_pertumbuhan)) : ?>
            <input type='checkbox' name='gejala[]' value='<?= $row['id_gejala'] ?>'><?= $row['nama_gejala'] ?><br>
        <?php endwhile; ?>

        <!-- Generate CheckBox untuk gejala pada daun dan malai -->
        <h3>Gejala pada Daun dan Malai:</h3>
        <?php while ($row = mysqli_fetch_assoc($result_gejala_daun_malai)) : ?>
            <input type='checkbox' name='gejala[]' value='<?= $row['id_gejala'] ?>'><?= $row['nama_gejala'] ?><br>
        <?php endwhile; ?>

        <!-- Generate CheckBox untuk gejala pada batang -->
        <h3>Gejala pada Batang:</h3>
        <?php while ($row = mysqli_fetch_assoc($result_gejala_batang)) : ?>
            <input type='checkbox' name='gejala[]' value='<?= $row['id_gejala'] ?>'><?= $row['nama_gejala'] ?><br>
        <?php endwhile; ?>

        <br>
        <input type='submit' value='Submit'>
    </form>
</body>
</html>
