<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Edric Aldo, Dicky Ardi, and Mas Muhammad Almer Sesunan">
  <meta name="generator" content="">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="/css/style.css">
  {{-- CSS --}}
  <style>
    @media print{
      footer{
        display: none;
      }
      .cd-main-header{
        display: none;
      }
      .cd-side-nav{
        display: none;
      }
    }
  </style>
  <link href="/manifest.json" rel="manifest">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/dashboard.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <title>@yield('title')</title>
</head>
<body>
  <header class="cd-main-header js-cd-main-header">
    <div class="cd-logo-wrapper">
      <span class="fs-4 text-white">CatatYuk</span>
    </div>
    
    @if (session('success'))
     <div class="alert alert-success" style="align-self: center;padding: 4px;margin: 0px;width: 100px;text-align: center;">
       {{ session('success') }}
     </div>
    @endif

    <div class="cd-search js-cd-search">
      {{-- <form>
        <input class="reset" type="search" placeholder="Search...">
      </form> --}}
    </div>
  
    <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
  
    <?php
      use App\Models\Stock;
      use App\Models\Payable;
      use App\Models\Receivable;
      use Illuminate\Support\Facades\DB;
      // $stock = DB::select("select * from stocks inner join users on user_id = id where available < minimum"); //tanpa sesuain user_id
      // $payable = DB::select("select * from payables inner join users on user_id = id where CURRENT_TIMESTAMP <= due_date and day(CURRENT_TIMESTAMP)+3 = day(due_date) order by due_date asc limit 1");
      // $receivable = DB::select("select * from receivables inner join users on user_id = id where CURRENT_TIMESTAMP <= rc_due_date and day(CURRENT_TIMESTAMP)+3 = day(rc_due_date) order by rc_due_date asc limit 1");
      $stock = Stock::select('st_id','item_name')->whereColumn('available','<','minimum')->where('user_id', Auth::user()->id)->get();
      $payable = Payable::select('py_name','due_date')->where('user_id', Auth::user()->id)->whereRaw('month(CURRENT_TIMESTAMP) = month(due_date) and day(CURRENT_TIMESTAMP)+3 = day(due_date) or day(CURRENT_TIMESTAMP)+1 = day(due_date)')->where('user_id', Auth::user()->id)->get(); //gatau kenapa musti where user_id 2x, kalo cuma sekali dia ngambil data dari user_id lain
      $receivable = Receivable::select('rc_name','rc_due_date')->where('user_id', Auth::user()->id)->whereRaw('month(CURRENT_TIMESTAMP) = month(rc_due_date) and day(CURRENT_TIMESTAMP)+3 = day(rc_due_date) or day(CURRENT_TIMESTAMP)+1 = day(rc_due_date)')->where('user_id', Auth::user()->id)->get(); //gatau kenapa musti where user_id 2x, kalo cuma sekali dia ngambil data dari user_id lain
      //dd($receivable);
    ?>

    <ul class="cd-nav__list js-cd-nav__list">
      {{-- <li class="cd-nav__item"><a href="#0">Tour</a></li> --}}
      <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
        <a href="#0">
          <i class="fa fa-bell"></i>
          <span class="label label-warning" style="color: red">{{ count($stock) + count($payable) + count($receivable) }}</span>
        </a>

        <ul class="cd-nav__sub-list">
          @if ($stock==null && $payable==null && $receivable==null)
          <div class="header dropdown-item" style="text-align: center;background: rgb(216, 216, 216)">
            There is no new message
          </div>
          @else
          <div class="header dropdown-item" style="text-align: center;background: rgb(216, 216, 216)">
            You have new message
          </div>
          @endif
          @foreach ($payable as $payable)
          <li class="cd-nav__sub-item">
            <a href="{{ url('/lending') }}">
              <i class="fa fa-warning text-yellow"></i> {{ $payable->py_name }} Payable near due date!
            </a>
          </li>
          @endforeach
          @foreach ($receivable as $receivable)
          <li class="cd-nav__sub-item">
            <a href="{{ url('/lending') }}">
              <i class="fa fa-warning text-yellow"></i> {{ $receivable->rc_name }} Receivable near due date!
            </a>
          </li>
          @endforeach
          <li><hr class="dropdown-divider"></li>
          @foreach ($stock as $stock)
          <li class="cd-nav__sub-item">
            <a href="/stock/{{ $stock->st_id }}">
              <i class="fa fa-warning text-yellow"></i> {{ $stock->item_name }} Stocks are low!
            </a>
          </li>
          @endforeach
          <li class="cd-nav__sub-item"><a href="{{ url('/stock') }}" style="text-align: center">View All Stock</a></li>
        </ul>

      </li>
      <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
        <a href="#0">
          <img src="https://github.com/mdo.png" alt="user" width="32" height="32" class="rounded-circle">
          <span class="font-weight-bold">Hi, {{ Auth::user()->name }} !</span>
        </a>
    
        <ul class="cd-nav__sub-list">
          <li class="cd-nav__sub-item"><a href="{{ url('/profile') }}">Profile</a></li>
          <li class="cd-nav__sub-item"><a href="{{ url('/changepw') }}">Change Password</a></li>
          <li><hr class="dropdown-divider"></li>
          <li class="cd-nav__sub-item"><a href="{{ url('/signout') }}">Logout</a></li>
        </ul>
      </li>
    </ul>
  </header> <!-- .cd-main-header -->
  
  <main class="cd-main-content">
    <nav class="cd-side-nav js-cd-side-nav">
      <ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__label"><span>Menu</span></li>
        <li class="cd-side__item cd-side__item--overview cd-side__item--selected">
          <a href="{{ url('/dashboard') }}">Dashboard</a>
          
          {{-- <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="#0">All Data</a></li>
            <li class="cd-side__sub-item"><a href="#0">Category 1</a></li>
            <li class="cd-side__sub-item"><a href="#0">Category 2</a></li>
          </ul> --}}
        </li>

        <li class="cd-side__item cd-side__item--notifications cd-side__item--selected">
          <a href="{{ url('/cashflow') }}">Cashflow</a>
          
          {{-- <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a aria-current="page" href="#0">All Notifications</a></li>
            <li class="cd-side__sub-item"><a href="#0">Friends</a></li>
            <li class="cd-side__sub-item"><a href="#0">Other</a></li>
          </ul> --}}
        </li>
    
        <li class="cd-side__item cd-side__item--comments cd-side__item--selected">
          <a href="{{ url('/stock') }}">Stock</a>
          
          {{-- <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="#0">All Comments</a></li>
            <li class="cd-side__sub-item"><a href="#0">Edit Comment</a></li>
            <li class="cd-side__sub-item"><a href="#0">Delete Comment</a></li>
          </ul> --}}
        </li>

        <li class="cd-side__item cd-side__item--comments cd-side__item--selected">
          <a href="{{ url('/lending') }}">Lending</a>
        </li>
      </ul>
    
      {{-- <ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__label"><span>Secondary</span></li>
        <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
          <a href="#0">Bookmarks</a>
          
          <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="#0">All Bookmarks</a></li>
            <li class="cd-side__sub-item"><a href="#0">Edit Bookmark</a></li>
            <li class="cd-side__sub-item"><a href="#0">Import Bookmark</a></li>
          </ul>
        </li>

        <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
          <a href="#0">Images</a>
          
          <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="#0">All Images</a></li>
            <li class="cd-side__sub-item"><a href="#0">Edit Image</a></li>
          </ul>
        </li>
    
        <li class="cd-side__item cd-side__item--has-children cd-side__item--users js-cd-item--has-children">
          <a href="#0">Users</a>
          
          <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="#0">All Users</a></li>
            <li class="cd-side__sub-item"><a href="#0">Edit User</a></li>
            <li class="cd-side__sub-item"><a href="#0">Add User</a></li>
          </ul>
        </li>
      </ul> --}}
    
      {{-- <ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__label"><span>Action</span></li>
        <li class="cd-side__btn"><button class="reset" href="#0">+ Button</button></li>
      </ul> --}}
    </nav>
  
    <div class="cd-content-wrapper">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @yield('container')
      </div>
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  
{{-- Footer --}}
  <footer class="text-center text-lg-start text-white" style="background-color: hsl(210, 10%, 27%);">
         <!-- Section: Social media -->
         <section
             class="
                 d-flex
                 justify-content-center justify-content-lg-between
                 p-4
                 border-bottom
             "
         >
             {{-- <!-- Left -->
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
             <!-- Right --> --}}
         </section>
         <!-- Section: Social media -->
     
         <!-- Section: Links  -->
         <section class="">
             <div class="container text-center text-md-start mt-5">
                 <!-- Grid row -->
                 <div class="row mt-3">
                     <!-- Grid column -->
                     <div class="col-md-3 col-lg-4 col-xl-5 mx-auto mb-4">
                         <!-- Content -->
                         <h6 class="text-uppercase fw-bold mb-4">
                             <i class="fas fa-gem me-3"></i>CatatYuk!
                         </h6>
                         <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CatatYuk wants to help you to record your transactions, 
                            such as incomes and expenses, making financial reports, recording stock of goods or inventory, 
                            and bookkeeping your payables and receivables getting easier.
                         </p>
                     </div>
                     <!-- Grid column -->
                 
                     <!-- Grid column -->
                     {{-- <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
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
                     <!-- Grid column --> --}}
                 
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
             <a class="text-reset fw-bold" href="https://catatyuk.com/"
                 >catatyuk.com</a
             >
         </div>
         <!-- Copyright -->
  </footer>
  <script src="/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="/js/menu-aim.js"></script>
  <script src="/js/main-dashboard.js"></script>
  {{-- JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 
  {{-- <script src="/js/bootstrap.bundle.min.js"></script> --}}
  <script src="/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>
  <script>
    // Success Flash FadeOut
      $(document).ready(function(){
        $('.alert-success').fadeIn().delay(5000).fadeOut();
      });
  </script>
</body>
</html>