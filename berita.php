<!DOCTYPE html>

<?php

session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  exit;
}


include 'function/connect.php';
?>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SCMIC | Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-info">
      <div class="container">
        <a class="navbar-brand" href="dashboard.php">DASHBOARD</a>
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
              <a class="nav-link active" href="#">Berita</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a class="btn btn-danger" href="function/logout.php">Logout</a>
            </li>
          <li class="nav-item">
            <div class="ps-4 pt-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg> Admin
            </div>
          </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="container pt-3">
      <a href="form.php" type="button" class="btn btn-primary start">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
      </svg>Tambah
      </a>
    </div>


    <section class="wrapper">
      <div class="container-fostrap">
        <div>
          <h1 class="heading">Berita</h1>
        </div>
        <div class="content">
          <div class="container">
            <div class="row">
              <?php
                $query = 'SELECT * FROM berita';
                $sql = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($sql)){
              ?>
              <div class="col-xs-12 col-sm-4">
                <div class="card">
                  <a class="img-card" href="http://www.fostrap.com/2016/03/5-button-hover-animation-effects-css3.html">
                    <img src="assets/<?php echo $data['gambar']; ?>" />
                  </a>
                  <div class="card-content">
                    <h4 class="card-title">
                      <a href="http://www.fostrap.com/2016/02/awesome-material-design-responsive-menu.html"> <?php echo $data['judul']; ?> </a>
                    </h4>
                    <p class=""> <?php echo $data['ringkasan']; ?> </p>
                  </div>
                  <a href="form.php?edit=<?php echo $data['id']; ?>" type="button" class="btn btn-warning mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>Edit
                  </a>
                  <a href="function/proses.php?hapus=<?php echo $data['id']; ?>" type="button" class="btn btn-danger mb-3" onclick="return confirm('Yakin ingin menghapus data ini?')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>Delete
                    
                  </a>
                  <div class="card-read-more">
                    <a href="https://codepen.io/wisnust10/full/ZWERZK/" class="btn btn-link btn-block"> Read More </a>
                  </div>
                </div>
              </div>
              <?php
                } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
