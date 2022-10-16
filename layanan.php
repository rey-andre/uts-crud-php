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

    <script type="text/javascript" src="fussionchart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="fussionchart/js/themes/fusioncharts.theme.fint.js"></script>
    <script type="text/javascript">
      FusionCharts.ready(function () {
        var revenueChart = new FusionCharts({
          type: 'column2d',
          renderAt: 'posisix',
          width: '500',
          height: '300',
          dataFormat: 'jsonurl',
          dataSource: 'fussionchart/db2json.php',
        });
        revenueChart.render();
      });
    </script>


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
              <a class="nav-link active" href="#">Layanan</a>
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
    <!-- Akhir Navbar -->

    <!-- Layanan -->
    <section class="container">
        <br /><br /><br />
        <h1 class="heading pb-3">Layanan Masyarakat</h1>
  
  
        <!-- Smart Health -->
        <div class="container kesehatan shadow">
          <h1 class="pt-3 ms-3">Smart Health</h1>
          <div class="row justify-content-start pb-3">
            <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="50">
              <div class="card kartu shadow m-md-3">
                <img src="https://albertramadhanvanwijk.github.io/Indonesia-Cerdas.github.io/images/layanan/vaccine.png" class="card-img-top mt-3" alt="Vaksinasi & Imunisasi" />
                <div class="card-body">
                  <p class="text-center mt-3">Vaksinasi & Imunisasi</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="150">
              <div class="card kartu shadow m-md-3">
                <img src="https://albertramadhanvanwijk.github.io/Indonesia-Cerdas.github.io/images/layanan/hospital.png" class="card-img-top mt-3" alt="RSUD" />
                <div class="card-body">
                  <p class="text-center mt-3">Informasi RSUD</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="250">      
                <div class="card kartu shadow m-md-3">
                  <img src="https://albertramadhanvanwijk.github.io/Indonesia-Cerdas.github.io/images/layanan/covid.png" class="card-img-top mt-3" alt="Covid" />
                  <div class="card-body">
                    <!-- <p class="text-center mt-3" style="text-decoration: none;">Informasi Covid-19</p> -->
                    <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Data Covid
                    </button>
                    <button class="btn btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#importExcell">
                     Import Data Covid
                    </button>
                  </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Kasus Covid-19</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body m-auto">
                          <div id="posisix"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Import excel -->
                  <div class="modal fade" id="importExcell" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Import File Excell</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body m-auto">
                        <form action="function/proses.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                <input type="file" class="form-control" name="gambar" placeholder="gambar" >
                            </div>
                            <div class="mb-3">
                              <button class="btn btn-primary" type="submit">Upload</button>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="350">
              <div class="card kartu shadow m-md-3">
                <img src="https://albertramadhanvanwijk.github.io/Indonesia-Cerdas.github.io/images/layanan/doctor.png" class="card-img-top mt-3" alt="teledoctor" />
                <div class="card-body">
                  <p class="text-center mt-5">Teledokter</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="450">
              <div class="card kartu shadow m-md-3">
                <img src="https://albertramadhanvanwijk.github.io/Indonesia-Cerdas.github.io/images/layanan/bpjs.png" class="card-img-top mt-3" alt="bpjs" />
                <div class="card-body">
                  <p class="text-center mt-5">BPJS</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="550">
              <div class="card kartu shadow m-md-3">
                <img src="https://albertramadhanvanwijk.github.io/Indonesia-Cerdas.github.io/images/layanan/puskesmas.png" class="card-img-top mt-3" alt="e-puskesmas" />
                <div class="card-body">
                  <p class="text-center mt-5">E-Puskesmas</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  
  
      <br><br><br>
      <!-- Smart Education -->
      <div class="container kesehatan shadow">
          <h1 class="pt-3 ms-3">Smart Education</h1>
          <div class="row justify-content-start pb-3">
            <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="50">
              <div class="card kartu shadow m-md-3">
                <img src="https://albertramadhanvanwijk.github.io/Indonesia-Cerdas.github.io/images/layanan/scholarship.png" class="card-img-top mt-3" alt="scholarship" />
                <div class="card-body">
                  <p class="text-center mt-5">Beasiswa</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="150">
              <div class="card kartu shadow m-md-3">
                <img src="https://albertramadhanvanwijk.github.io/Indonesia-Cerdas.github.io/images/layanan/mbkm.jpg" class="card-img-top mt-5 mb-1" alt="MBKM" />
                <div class="card-body">
                  <p class="text-center mt-4 p-1">Kampus Merdeka</p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
