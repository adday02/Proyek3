@extends('masyarakat.template.layout')
@section('title','Masyarakat - Daftar Pelatihan' )
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
                    <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah  Pengajuan Pelatihan</button></div> 
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
                        @foreach($pendaftar_pelatihans as $daftar_pelatihan)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$daftar_pelatihan->masyarakat->nama}}</td>
                            <td>{{$daftar_pelatihan->pelatihan->bidang_kejuruan}}</td>
                            <td>{{$daftar_pelatihan->status}}</td>
                            <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$daftar_pelatihan->id_pen_pelatihan}}" >Edit</button>
                            <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$daftar_pelatihan->id_pen_pelatihan}}" >Detail</button>
                                <div style="float:right;">
                                <form action="{{route('daftarpelatihan.destroy', $daftar_pelatihan->id_pen_pelatihan)}}" method="POST">
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
              <form action="{{route('daftarpelatihan.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Pelatihan</label>
                    <div class="col-sm-8">        
                        <select class="input100" type="text" name="id_pelatihan" require>
                          <option disabled="" selected="" value="">--Pilih Pelatihan--</option>
                          @foreach($pelatihans as $pelatihan)
                          <option value="{{$pelatihan->id_pelatihan}} ">{{$pelatihan->bidang_kejuruan}}</option>
                          @endforeach
                          </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">File</label>
                    <div class="col-sm-8">
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                 <input type="hidden" name="nik" value="{{auth()->user()->nik}}">

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Pelatihan</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->

@foreach ($pendaftar_pelatihans as $daftar_pelatihan)
<!-- Modal Ubah Data  -->
<div id="edit{{$daftar_pelatihan->id_pen_pelatihan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit daftarpelatihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('daftarpelatihan.update', $daftar_pelatihan->id_pen_pelatihan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">File</label>
                    <div class="col-sm-8">
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach

        @foreach ($pendaftar_pelatihans as $daftar_pelatihan)
<!-- Modal detail Data  -->
<div id="detail{{$daftar_pelatihan->id_penPelatihan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <img  align:center; src="{{URL::to('/')}}/logo/{{$daftar_pelatihan->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$daftar_pelatihan->logo}}" >
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap </label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $daftar_pelatihan->masyarakat->nama}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Bidang Kejuruan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="bidang_kejuruan" class="form-control" value="{{ $daftar_pelatihan->pelatihan->bidang_kejuruan}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi</label>
                    <div class="col-sm-8">
                        <input type="text" name="deskripsi" class="form-control" value="{{ $daftar_pelatihan->pelatihan->deskripsi }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                        <input type="text" name="status" class="form-control" value="{{ $daftar_pelatihan->status }}" readonly>
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