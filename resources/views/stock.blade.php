@extends('layouts/main')

@section('title', 'CatatYuk')


@section('container')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 
    <!--css ini bikin ngerusak tampilan, gatau kenapa-->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    
              <div class="card-body">
                <h1 class="h2">Manage Stock</h1>
                <table id="table" class="table table-striped table-bordered" style="width:100%">
                  <a href="#" style="float: right">Download to PDF</a>
                  <label for="pwd">Stok Barang</label><br>
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
                          <td align="center">
                            <button id="edit_brg" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                      </tr>
                      <tr>
                          <td>Sendal</td>
                          <td>50</td>
                          <td>63</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Air Minum</td>
                          <td>100</td>
                          <td>66</td>
                          <td align="center">
                            <button id="edit_brg" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Makanan</td>
                          <td>100</td>
                          <td>22</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Earphone</td>
                          <td>25</td>
                          <td>33</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Handphone</td>
                          <td>25</td>
                          <td>61</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Charger</td>
                          <td>25</td>
                          <td>59</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Gergaji</td>
                          <td>10</td>
                          <td>55</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Tang</td>
                          <td>10</td>
                          <td>39</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Kabel</td>
                          <td>10</td>
                          <td>23</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Kertas</td>
                          <td>75</td>
                          <td>30</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                        </tr>
                      <tr>
                          <td>Gunting</td>
                          <td>10</td>
                          <td>22</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Kayu</td>
                          <td>75</td>
                          <td>36</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Kapas</td>
                          <td>75</td>
                          <td>43</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                      <tr>
                          <td>Batu</td>
                          <td>75</td>
                          <td>19</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                  </tbody>
                </table>
                <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Barang</button>
              </div>
            


<!-- Modal Edit -->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editbarang" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalEdit">Edit Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="nm_brg">Nama Barang</label>
            <input type="text" class="form-control" id="nm_brng" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="mini_brg">Minimum</label>
            <input type="text" class="form-control" id="mini_brng" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="stok_brg">Stok Saat Ini</label>
            <input type="text" class="form-control" id="stok_brng" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah -->
  <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahbarang" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTambah">Tambah Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label" for="nm_brg1">Nama Barang</label>
                <input type="text" class="form-control" id="nm_brng1" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="mini_brg1">Minimum</label>
                <input type="text" class="form-control" id="mini_brng1" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="stok_brg1">Stok Saat Ini</label>
                <input type="text" class="form-control" id="stok_brng1" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
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
              var table = $('#table').DataTable( {
              lengthChange: false,
              buttons: ['pdf']
          } );
       
          table.buttons().container()
              .appendTo( '#table_wrapper .col-md-6:eq(0)' );
          } );
          </script>
@endsection