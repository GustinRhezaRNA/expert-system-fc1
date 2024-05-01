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
        <style>
            .form-check-input {
        display: none;
    }
        </style>
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
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                    <?php
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
                        <h3 class="text-center mb-3">Gejala pada pertumbuhan:</h3>
                            <div class="row justify-content-center">
                                <?php while ($row = mysqli_fetch_assoc($result_gejala_pertumbuhan)) : ?>
                                    <div class="col-lg-3 mb-3">
                                        <div class="card shadow border-0 rounded-4">
                                            <div class="card-body p-3">
                                                <input type='checkbox' class="form-check-input" name='gejala[]' value='<?= $row['id_gejala'] ?>'>
                                                <label class="form-check-label"><?= $row['nama_gejala'] ?></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>

                        
                        <br>

                        <!-- Generate CheckBox untuk gejala pada daun dan malai -->
                        <h3 class="text-center mb-3">Gejala pada Daun dan Malai:</h3>
                        <div class="row justify-content-center">
                            <?php mysqli_data_seek($result_gejala_daun_malai, 0); ?>
                            <?php while ($row = mysqli_fetch_assoc($result_gejala_daun_malai)) : ?>
                                <div class="col-lg-3 mb-3">
                                    <div class="card shadow border-0 rounded-4">
                                        <div class="card-body p-3">
                                            <input type='checkbox' class="form-check-input" name='gejala[]' value='<?= $row['id_gejala'] ?>'>
                                            <label class="form-check-label"><?= $row['nama_gejala'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>

                        
                        <br>

                        <!-- Generate CheckBox untuk gejala pada batang -->
                        <h3 class="text-center mb-3">Gejala pada Batang:</h3>
                        <div class="row justify-content-center">
                            <?php mysqli_data_seek($result_gejala_batang, 0); ?>
                            <?php while ($row = mysqli_fetch_assoc($result_gejala_batang)) : ?>
                                <div class="col-lg-3 mb-3">
                                    <div class="card shadow border-0 rounded-4">
                                        <div class="card-body p-3">
                                            <input type='checkbox' class="form-check-input" name='gejala[]' value='<?= $row['id_gejala'] ?>'>
                                            <label class="form-check-label"><?= $row['nama_gejala'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                     </form>                
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
        <!-- Core theme JS-->
        <script src="js/script.js"></script>
    </body>

</html>
