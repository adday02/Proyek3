@extends('masyarakat.template.layout')
@section('title','Info Pelatihan' )
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pelatihan</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List Pelatihan</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Bidang Kejuruan</th>
                          <th>Persyaratan</th>
                          <th>Kuota</th>
                          <th width="18.5%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pelatihans as $pelatihan)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$pelatihan->bidang_kejuruan}}</td>
                            <td>{{$pelatihan->persyaratan}}</td>
                            <td>{{$pelatihan->kuota}}</td>
                            <td>
                            <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$pelatihan->id_pelatihan}}" >Detail</button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        @foreach ($pelatihans as $pelatihan)
<!-- Modal Ubah Data  -->
<div id="detail{{$pelatihan->id_pelatihan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <img  align:center; src="{{URL::to('/')}}/logo/{{$pelatihan->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$pelatihan->logo}}" >
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Bidang Kejuruan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="bidang_kejuruan" class="form-control" value="{{ $pelatihan->bidang_kejuruan}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi</label>
                    <div class="col-sm-8">
                        <input type="text" name="deskripsi" class="form-control" value="{{ $pelatihan->deskripsi }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Persyaratan</label>
                    <div class="col-sm-8">
                        <input type="text" name="persyaratan" class="form-control" value="{{ $pelatihan->persyaratan }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kuota </label>
                    <div class="col-sm-8">
                        <input type="text" name="kuota" class="form-control" value="{{ $pelatihan->kuota }}" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach
@endsection