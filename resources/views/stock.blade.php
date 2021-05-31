@extends('layouts/main')

@section('title', 'CatatYuk')
    
@section('container')
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <div class="frame">
    <a href="#">Download to PDF</a><br>
    <div class="summary-item">
      <label for="pwd">Stok Barang</label><br>
        <body>
          <div class="container">
            <div class="card mt-5">
              <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                        <th>Nama Barang</th>
                        <th>Minimum</th>
                        <th>Jumlah Saat Ini</th>
                        <th>Atur Stok</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Sepatu</td>
                          <td>50</td>
                          <td>61</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Sendal</td>
                          <td>50</td>
                          <td>63</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Air Minum</td>
                          <td>100</td>
                          <td>66</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Makanan</td>
                          <td>100</td>
                          <td>22</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Earphone</td>
                          <td>25</td>
                          <td>33</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Handphone</td>
                          <td>25</td>
                          <td>61</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Charger</td>
                          <td>25</td>
                          <td>59</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Gergaji</td>
                          <td>10</td>
                          <td>55</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Tang</td>
                          <td>10</td>
                          <td>39</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Kabel</td>
                          <td>10</td>
                          <td>23</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Kertas</td>
                          <td>75</td>
                          <td>30</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Gunting</td>
                          <td>10</td>
                          <td>22</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Kayu</td>
                          <td>75</td>
                          <td>36</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Kapas</td>
                          <td>75</td>
                          <td>43</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                      <tr>
                          <td>Batu</td>
                          <td>75</td>
                          <td>19</td>
                          <td><button type="button" class="btn btn-secondary">Edit Button</button></td>
                      </tr>
                  </tbody>
          </table>
          <br><br><button type="button" class="btn btn-secondary">Tambah Transaksi</button>
              </div>
            </div>
          </div>
      
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  
          <script>
          $(document).ready(function() {
              var table = $('#example').DataTable( {
              lengthChange: false,
              buttons: ['pdf']
          } );
       
          table.buttons().container()
              .appendTo( '#example_wrapper .col-md-6:eq(0)' );
          } );
          </script>
        </body>
@endsection

