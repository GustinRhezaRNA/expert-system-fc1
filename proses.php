<?php
include "koneksi.php";

// Array korespondensi antara ID penyakit dan nama penyakit
$penyakit_array = array(
    'P01' => 'Penyakit 01',
    'P02' => 'Penyakit 02',
    'P03' => 'Penyakit 03',
    'P04' => 'Penyakit 04',
    'P05' => 'Penyakit 05',
    'P06' => 'Penyakit 06',
    'P07' => 'Penyakit 07',
    'P08' => 'Penyakit 08'
);

// Definisikan array gejala yang telah dipilih
$gejala_terpilih = $_POST['gejala'];

// Tentukan aturan-aturan
$rules = array(
    'Rule 1' => array('G1', 'G2', 'G3', 'G4', 'G5', 'G6', 'G7'),
    'Rule 2' => array('G2', 'G8', 'G9', 'G10', 'G11', 'G12', 'G13'),
    'Rule 3' => array('G1', 'G14', 'G15', 'G16'),
    'Rule 4' => array('G2', 'G13', 'G17', 'G23', 'G24'),
    'Rule 5' => array('G9', 'G17', 'G18', 'G24'),
    'Rule 6' => array('G25', 'G26', 'G27', 'G28', 'G29', 'G30', 'G31', 'G32'),
    'Rule 7' => array('G21', 'G22', 'G23', 'G25', 'G32', 'G33', 'G34'),
    'Rule 8' => array('G19', 'G20', 'G24', 'G35', 'G36', 'G37', 'G38')
);

// Tentukan mapping antara aturan dan id_penyakit
$rules_to_penyakit = array(
    'Rule 1' => 'P01',
    'Rule 2' => 'P02',
    'Rule 3' => 'P03',
    'Rule 4' => 'P04',
    'Rule 5' => 'P05',
    'Rule 6' => 'P06',
    'Rule 7' => 'P07',
    'Rule 8' => 'P08'
);

// Cek setiap aturan
$penyakit_ditemukan = false;
foreach ($rules as $rule => $gejala_rule) {
    // Periksa apakah semua gejala pada aturan tersebut ada dalam gejala_terpilih
    $is_rule_matched = true;
    foreach ($gejala_rule as $gejala) {
        if (!in_array($gejala, $gejala_terpilih)) {
            $is_rule_matched = false;
            break;
        }
    }

    // Jika aturan cocok, kembalikan id_penyakit
    if ($is_rule_matched) {
        $id_penyakit = $rules_to_penyakit[$rule];

        // Gunakan SQL SELECT untuk mencari nama penyakit
        $query_nama_penyakit = "SELECT nama_penyakit FROM penyakit WHERE id_penyakit = '$id_penyakit'";
        $result_nama_penyakit = mysqli_query($koneksi, $query_nama_penyakit);

        // Ambil nama penyakit dari hasil pencarian
        if ($row = mysqli_fetch_assoc($result_nama_penyakit)) {
            $nama_penyakit = $row['nama_penyakit'];
            echo "Penyakit yang sesuai dengan gejala yang dipilih: $nama_penyakit";
            $penyakit_ditemukan = true;
            break;
        }
    }
}

// Jika tidak ada aturan yang cocok, berikan pesan
if (!$penyakit_ditemukan) {
    echo "Tidak ada penyakit yang cocok dengan gejala yang dipilih.";
}
?>
