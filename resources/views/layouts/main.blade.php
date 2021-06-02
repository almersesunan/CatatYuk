<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
            integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S"
            crossorigin="anonymous"
        />
        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
            crossorigin="anonymous"
        />
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/home.css">

    <title>@yield('title')</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="asd.png" alt="" />
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav w-100">
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
                                aria-labelledby="navbarDropdownMenuLink"
                            >
                                <li>
                                    <a class="dropdown-item" href="#"
                                        >Tambah Bisnis Baru</a
                                    >
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
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdownMenuLink"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                My Profile
                            </a>
                            <ul
                                class="dropdown-menu animate slideDown"
                                aria-labelledby="navbarDropdownMenuLink"
                            >
                                <li>
                                    <a class="dropdown-item" href="#"
                                        >Profile</a
                                    >
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"
        ></script>

       
      
    @yield('container')

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

    @yield('footer')

     <!-- Footer -->
     
  </body>
</html>