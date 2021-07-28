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
        <style>
          @media print{
            .footer{
              display: none;
            }
            .feedback-area{
              display: none;
              align-self: center;
              align-content: center;
            }
          }
        </style>
        <link href="/manifest.json" rel="manifest">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/dashboard.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>@yield('title')</title>
    </head>

    <body>
        {{-- Navbar --}}
        <header class="p-3 mb-3 border-bottom">
            <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                  <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>
                @if (session('success'))
                  <div class="alert alert-success" style="align-self: center;padding: 4px;margin: 0px;width: 100px;text-align: center;">
                    {{ session('success') }}
                  </div>
                 @endif
                  {{-- {{-- <div class="btn-group col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Current Book
                    </button>
                    <ul class="dropdown-menu">
                      @foreach ($book as $book)
                      <li><a class="dropdown-item" href="#">{{$book->book_name}}</a></li>
                      @endforeach
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#tambahbook">+ Add New Book</a></li>
                    </ul>
                  </div> --}}

                  {{-- Modal New Book --}}
                  {{-- <div class="modal fade" id="tambahbook" tabindex="-1" aria-labelledby="tambahbook" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalTambahBook">Add New Book</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form method="post" action="book/add">
                          @csrf
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label" for="book_name">Name</label>
                              <input type="text" name="book_name" placeholder="Masukan Nama Buku" class="form-control @error('book_name') is-invalid @enderror" id="book_name">
                              @error('book_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div> --}}

                <div class="dropdown text-end" style="align-items: flex-end; left: 1400px;">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="https://github.com/mdo.png" alt="user" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                      <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                      <li><a class="dropdown-item" href="{{ url('/changepw') }}">Change Password</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{ url('/signout') }}">Sign out</a></li>
                    </ul>
                </div>
              </div>
            </div>
        </header>

        {{-- Sidebar --}}
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="padding:0px">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 100%;height: 100%;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">CatatYuk</span>
                </a>
                <hr>
                <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-white" aria-current="page" href="{{ url('/dashboard') }}">
                        <span data-feather="bar-chart-2"></span>
                        Dashboard
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="{{ url('/cashflow') }}">
                        <span data-feather="file"></span>
                        Cashflow
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="{{ url('/stock') }}">
                        <span data-feather="box"></span>
                        Stock
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="{{ url('/lending') }}">
                        <span data-feather="users"></span>
                        Lending
                      </a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Main Content --}}
        <div class="container-fluid">
            <div class="row">
              <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    @yield('container')
                </div>
                <div class="feedback-area" style="padding: 10px; text-align: right;">
                    <a href="feedback"><button type="button" class="btn btn-link btn-sm" >Send us your feedback!</button></a>
                </div>
              </main>
            </div>
        </div>

        {{-- Footer --}}
        <div class="footer container-fluid">
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

        {{-- JS --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 
        {{-- <script src="/js/bootstrap.bundle.min.js"></script> --}}
        <script src="/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function(){
              $('.alert-success').fadeIn().delay(5000).fadeOut();
            });
        </script>
    </body>
</html>