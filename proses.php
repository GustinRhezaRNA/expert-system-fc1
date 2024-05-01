


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Personal - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100 bg-light">
        <main class="flex-shrink-0">

            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">RiceGuard</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="form.php">Diagnose</a></li>
                            <li class="nav-item"><a class="nav-link" href="solution.php">Solution</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

           
            <!-- Page Content-->
            
            
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Disease</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
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
                                        echo"<h1 class='display-5 fw-bolder mb-0 text-center'><span class='text-gradient d-inline '>Penyakit yang sesuai dengan gejala yang dipilih:
                                        <br>
                                        <br>
                                         $nama_penyakit</span></h1>";
                                       
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

                    <div>

                    <br>
                    
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-center mb-3">
                                    <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="solution.php">Check Solution</a>
                    </div>
                </div>
            </div>
            


        </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0">Copyright &copy; Your Website 2023</div></div>
                    <div class="col-auto">
                        <a class="small" href="#!">Privacy</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Terms</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        
    </body>
</html>
