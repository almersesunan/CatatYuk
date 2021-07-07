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
    {{-- <header class="navbar sticky-top flex-md-nowrap p-2" style="background-color: wheat">
        <a class="navbar-brand me-0 px-3" href="#">CatatYuk</a>
        <a class="navbar-brand me-0 px-3" href="#">New Book</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ url('signout') }}">Sign out</a>
          </li>
        </ul>
    </header> --}}
    <header class="navbar sticky-top flex-md-nowrap p-2 mb-3 border-bottom" style="background-color: darksalmon">
       
          
            <a href="#" class="nav-link px-2 link-dark fs-5">CatatYuk</a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="#" class="nav-link px-2 link-dark">New Book</a></li>
              
            </ul>
    
            
    
            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
              </ul>
            </div>
          
        
      </header>
    <!-- Navbar -->
    <div class="container-fluid">
        <div class="row" >
          <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color: whitesmoke">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{ url('/dashboard') }}">
                    <span data-feather="bar-chart-2"></span>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/cashflow') }}">
                    <span data-feather="file"></span>
                    Cashflow
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/stock') }}">
                    <span data-feather="box"></span>
                    Stock
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/lending') }}">
                    <span data-feather="users"></span>
                    Lending
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="book"></span>
                    New Book
                  </a>
                </li> --}}
              </ul>
      
              {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Settings</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                  <span data-feather="plus-circle"></span>
                </a>
              </h6>
              <ul class="nav flex-column mb-2">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/profile') }}">
                    <span data-feather="user"></span>
                    Profile
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/changepassword') }}">
                    <span data-feather="file-text"></span>
                    Change Password
                  </a>
                </li>
              </ul> --}}
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
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
                                           Kami ingin membantu dalam aktifitas
                                           pencatatan semua transaksi, seperti membuat laporan
                                           keuangan, pencatatan stok barang, hingga mencatat &
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
                                           <i class="fas fa-home me-3"></i>Jl. Anggrek Cakra, Palmerah,
                                            Jakarta
                                       </p>
                                       <p>
                                           <i class="fas fa-envelope me-3"></i>
                                           CatatYuk@gmail.com
                                       </p>
                                       <p>
                                           <i class="fas fa-phone me-3"></i> +62 878 8652
                                           8278
                                       </p>
                                       <p>
                                           <i class="fas fa-print me-3"></i> +01 234 567
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
            </main>
        </div>
    </div> 

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  </body>
</html>