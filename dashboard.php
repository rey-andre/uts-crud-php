<!DOCTYPE html>

<!-- <?php

session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  exit;
}


include 'function/connect.php';
?> -->

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SCMIC | Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/dashboard.css" />

    <script type="text/javascript" src="js/fusioncharts.js"></script>
    <script type="text/javascript" src="js/themes/fusioncharts.theme.fint.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-info">
      <div class="container">
        <a class="navbar-brand" href="#">DASHBOARD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="layanan.php">Layanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Galeri</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="berita.php">Berita</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <div class="ps-4 pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
                Admin
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="container">
      <h1 class="text-center py-5">Welcome to Dashboard!</h1>
    </div>

    <!-- Admin -->
    <div class="container d-flex justify-content-center align-items-center">
      <div class="card text-center">
        <div class="py-4 p-2">
          <div>
            <img src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=740&t=st=1665922502~exp=1665923102~hmac=bca347bf159cf6ac708bb992c05322150fdd9da8a2d22686fdc2420f5cc4749e" class="rounded" width="100" />
          </div>
          <div class="mt-3 d-flex flex-row justify-content-center">
            <h5>
              <?php
              $aktif = $_SESSION["username"];
              $data = $conn->query("SELECT * FROM user WHERE username = '$aktif'");
              $tampil = $data->fetch_array();
              echo $tampil["nama"];
              ?>
            </h5>
            <span class="dots"><i class="fa fa-check"></i></span>
          </div>

          <span>
            <?php
            echo $tampil["email"];
            ?>
          </span>

          <div class="mt-3">
            <a href="function/logout.php" class="btn btn-danger">Logout</a>
          </div>
        </div>

        <div>
          <!-- <ul class="list-unstyled list">
            <li>
              <span class="font-weight-bold">Post</span>
              <div>
                <span class="mr-1">5</span>
                <i class="fa fa-angle-right"></i>
              </div>
            </li>

            <li>
              <span class="font-weight-bold">Comments</span>
              <div>
                <span class="mr-1">45</span>
                <i class="fa fa-angle-right"></i>
              </div>
            </li>

            <li>
              <span class="font-weight-bold">Favorites</span>
              <div>
                <span class="mr-1">15</span>
                <i class="fa fa-angle-right"></i>
              </div>
            </li>
          </ul> -->
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
