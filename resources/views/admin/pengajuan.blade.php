@extends('admin.template.layout')
@section('title','Pengajuan Pelatihan' )
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
                    <h2>Pengajuan Pelatihan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Masyarakat</th>
                          <th>Bidang Kejuruan</th>
                          <th>Status</th>
                          <th width="25%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($pengajuans as $pengajuan)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$pengajuan->masyarakat->nama}}</td>
                            <td>{{$pengajuan->pelatihan->bidang_kejuruan}}</td>
                            <td>{{$pengajuan->status}}</td>
                            <td>
                                <a href="{{URL::to('/')}}/file/{{$pengajuan->file}}"><button type="danger" class="btn btn-dark btn-sm">Unduh</button></a>
                                <button type="danger" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$pengajuan->id_pen_pelatihan}}" >Edit</button>
                                <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$pengajuan->id_pen_pelatihan}}" >Detail</button>
                                <div style="float:right;">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                </form>
                                </div>
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

@foreach ($pengajuans as $pengajuan)
<!-- Modal Ubah Data  -->
<div id="edit{{$pengajuan->id_pen_pelatihan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              Perizinan Pendaftar Pelatihan
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('pengajuan.update', $pengajuan->id_pen_pelatihan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Perizinan Pendaftar Pelatihan</label>
                    <div class="col-sm-8">        
                      <select class="form-control" name="status">
                        <option disabled="" selected="" value="">Pilih Perizinan</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                      </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach  

@foreach ($pengajuans as $pengajuan)
<!-- Modal Ubah Data  -->
<div id="detail{{$pengajuan->id_pen_pelatihan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              Perizinan Pendaftar Pelatihan
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="#" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">        
                        <input class="form-control" value="{{$pengajuan->masyarakat->nama}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Bidang Kejuruan</label>
                    <div class="col-sm-8">        
                        <input class="form-control" value="{{$pengajuan->pelatihan->bidang_kejuruan}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">        
                        <input class="form-control" value="{{$pengajuan->status}}"readonly>
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