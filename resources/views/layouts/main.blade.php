<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Dicky Ardi, Edric Aldo, and Mas Muhammad Almer Sesunan">
    <meta name="generator" content="">
        
    <!-- CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>@yield('title')</title>
  </head>

  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">CatatYuk</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
          </li>
        </ul>
    </header>
    <!-- Navbar -->
    <div class="container-fluid">
        <div class="row">
          <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">
                    <span data-feather="home"></span>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file"></span>
                    Orders
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="shopping-cart"></span>
                    Products
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Customers
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                  </a>
                </li>
              </ul>
      
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Saved reports</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                  <span data-feather="plus-circle"></span>
                </a>
              </h6>
              <ul class="nav flex-column mb-2">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
    </div>
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNav">
            <div class="container">
                <div class="logo">
                    <a href="https://imgur.com/P1PwqXH"><img src="https://i.imgur.com/P1PwqXHt.png" style="text-indent:-9999px; max-width:100%" /></a>
                </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="summary">Summary <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cashflow">Kas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stock">Stok</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="debt">Hutang/Piutang</a>
                    </li>
                    <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    aria-current="page"
                                    href="#"
                                    id="navbarDropdownMenuLink"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    >Book Name</a
                                >
                                <ul
                                    class="dropdown-menu animate slideDown"
                                    aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="#">+Tambah bisnis baru</a>
                                    </li>
                                </ul>
                            </li>
                    <li class="nav-item alerts">
                        <a class="nav-link" href="#">
                            <i class="fas fa-bell"></i>
                        </a>
                    </li>
                    
                        <li class="nav-item dropdown profile-dropdown"> 
                                <a
                                    class="nav-link dropdown-toggle "
                                    href="#"
                                    id="navbarDropdownMenuLink"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    style="margin-right: 175px"
                                >
                                    My Profile
                                </a>
                                <ul
                                    class="dropdown-menu animate slideDown"
                                    aria-labelledby="navbarDropdownMenuLink"
                                >
                                
                                    <li>
                                        <a class="dropdown-item" href="profile">
                                            <i class="far fa-user pt 1">Profile</i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/">
                                            <i class="fas fa-sign-out-alt">Logout</i>
                                        </a>
                                    </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> --}}
        
    
    <div class="container-fluid">
        <div class="row">
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                @yield('container')
            </div>
          </main>
        </div>
    </div>
    <div class="feedback-area" style="padding: 10px; text-align: right;">
        <a href="feedback"><button type="button" class="btn btn-link btn-sm" >Send us your feedback!</button></a>
    </div>

     <!-- Footer -->

     <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section
                class="
                    d-flex
                    justify-content-center justify-content-lg-between
                    p-4
                    border-bottom
                "
            >
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->
            
                <!-- Right -->
                <div>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->
        
            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>CatatYuk!
                            </h6>
                            <p>
                                Kami ingin membantu menjadikan aktifitas
                                mencatat semua transaksi, membuat laporan
                                keuangan, pencatatan stok barang, dan mencatat &
                                menagih hutang piutang usaha kamu menjadi
                                semakin mudah.
                            </p>
                        </div>
                        <!-- Grid column -->
                    
                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Products
                            </h6>
                            <p>
                                <a href="#!" class="text-reset"
                                    >Syarat & Ketentuan</a
                                >
                            </p>
                            <p>
                                <a href="#!" class="text-reset"
                                    >Kebijakan Privasi</a
                                >
                            </p>
                            <p>
                                <a href="#!" class="text-reset">FAQ</a>
                            </p>
                        </div>
                        <!-- Grid column -->
                    
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Perusahaan
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Tentang Kami</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Karir</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset"
                                    >Blog & Cerita</a
                                >
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Kontak Kami</a>
                            </p>
                        </div>
                        <!-- Grid column -->
                    
                        <!-- Grid column -->
                        <div
                            class="
                                col-md-4 col-lg-3 col-xl-3
                                mx-auto
                                mb-md-0 mb-4
                            "
                        >
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p>
                                <i class="fas fa-home me-3"></i> Jakarta,
                                Jakarta Selatan 12530, Indonesia
                            </p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                CatatYuk@gmail.com
                            </p>
                            <p>
                                <i class="fas fa-phone me-3"></i> + 62 878 8652
                                8278
                            </p>
                            <p>
                                <i class="fas fa-print me-3"></i> + 01 234 567
                                89
                            </p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->
        
            <!-- Copyright -->
            <div
                class="text-center p-4"
                style="background-color: rgba(0, 0, 0, 0.05)"
            >
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="https://CatatYuk.com/"
                    >CatatYuk.com</a
                >
            </div>
            <!-- Copyright -->
        </footer>
                

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>
    
  </body>
</html>