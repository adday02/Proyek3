@extends('admin.template.layout')
@section('title','Perusahaan' )
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Perusahaan</h2>
                    <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Perusahaan</button></div> 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Perusahaan</th>
                          <th>email</th>
                          <th>Werbsite</th>
                          <th>logo</th>
                          <th width="18.5%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>1</td>
                            <td>PT Mencari Cinta Sejati</td>
                            <td>mcs@gmail.com</td>
                            <td>www.mcs.com</td>
                            <td><img width="50px" src="{{URL::to('/')}}/images/mcs.jpg"></td></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#" >Edit</button>
                                <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#" >Detail</button>
                                <div style="float:right;">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                </form>
                                </div>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<!-- Modal tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
              <input class="form-control" type="text" placeholder="ID Perusahaan"></br>
              <input class="form-control" type="password" placeholder="Password"></br>
              <input class="form-control" type="text" placeholder="Nama Perusahaan"></br>
              <input class="form-control" type="text" placeholder="Email"></br>
              <input class="form-control" type="text" placeholder="Link Website"></br>
              <input class="form-control" type="text" placeholder="Alamat"></br>
              <textarea class="form-control" type="text" placeholder="Deskripsi Perusahaan"></textarea></br>
              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01"> Logo</label>
                <input type="file" class="form-control" id="inputGroupFile01">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Tambah Perusahaan</button>
              </div>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->
@endsection