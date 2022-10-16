<!doctype html>
<?php

session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  exit;
}

include 'function/connect.php';
$id = '';
$judul = '';
$ringkasan = '';
if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $query = "SELECT * FROM berita WHERE id='$id'";
  $sql = mysqli_query($conn,$query);
  $data = mysqli_fetch_array($sql);
  $judul = $data['judul'];
  $gambar = $data['gambar'];
  $ringkasan = $data['ringkasan'];
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- Navbar -->
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
              <a class="nav-link" href="berita.php">Berita</a>
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
    <!-- AKhir navbar -->

    <!-- Form -->
    <div class="container">
        <h1 class="pt-3 pb-3">Form Tambah Berita</h1>
        <form action="function/proses.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id; ?>">

          <div class="mb-3">
              <label class="form-label">Judul</label>
              <input type="text" class="form-control" name="judul" placeholder="Judul" value="<?php echo $judul; ?>">
          </div>
          <div class="mb-3">
              <label class="form-label">Gambar</label>
              <input type="file" class="form-control" name="gambar" placeholder="gambar" >
          </div>
          <div class="mb-3">
              <label class="form-label">Ringkasan</label>
              <input type="text" value="<?php echo $ringkasan; ?>" class="form-control" placeholder="Ringkasan. . ." name="ringkasan" rows="3" ></input>
          </div>
          <div class="mb-3">
            <?php
            if (isset($_GET["edit"])){
              echo "<button type='submit' name='btnProses' value='simpan' class='btn btn-primary'>Simpan Perubahan</button>";
            } else {
              echo "<button type='submit' name='btnProses' value='tambah' class='btn btn-primary'>Tambah Data</button>";
            }

            ?>
          </div>
          
          </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>