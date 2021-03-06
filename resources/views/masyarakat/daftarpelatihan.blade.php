@extends('masyarakat.template.layout')
@section('title','Masyarakat - Daftar Pelatihan' )
@section('content')
<?php
$tmb=0;
?>
@foreach($pendaftar_pelatihans as $daftar_pelatihan)
  @if(auth()->user()->nik==$daftar_pelatihan->masyarakat->nik)
    @if($daftar_pelatihan->status=="Diterima"||$daftar_pelatihan->status=="Dalam Proses")
  <?php
  $tmb=1;
  ?>
  @endif
  @endif
@endforeach
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              @if($errors->any())
                <div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert"aria-label="close">
                    <span aria-hidden= "true"></span>
                  </button>
                  <div>
                    @foreach ($errors->all() as $error)
                        {{$error}} <br>
                        @endforeach
                  </div>
                </div>
                @endif
                <h3>Pelatihan</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pengajuan Pelatihan</h2>
                    @if($tmb==0)
                    <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah  Pengajuan Pelatihan</button></div> 
                    @endif
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Bidang Kejuruan</th>
                          <th>Status</th>
                          <th width="19%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pendaftar_pelatihans as $daftar_pelatihan)
                        @if(auth()->user()->nik==$daftar_pelatihan->masyarakat->nik)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$daftar_pelatihan->pelatihan->bidang_kejuruan}}</td>
                            <td>{{$daftar_pelatihan->status}}</td>
                            <td>
                            @if($daftar_pelatihan->status=="Dalam Proses")
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$daftar_pelatihan->id_pen_pelatihan}}" >Edit</button>
                            @endif
                            <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$daftar_pelatihan->id_pen_pelatihan}}" >Detail</button>
                            @if($daftar_pelatihan->status=="Dalam Proses"||$daftar_pelatihan->status=="Ditolak")
                                <div style="float:right;">
                                <form action="{{route('daftarpelatihan-masyarakat.destroy', $daftar_pelatihan->id_pen_pelatihan)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                </form>
                                </div>
                              @endif
                            </td>
                          </tr>
                          @endif
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
            @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
              <form action="{{route('daftarpelatihan-masyarakat.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Pelatihan</label>
                    <div class="col-sm-8">        
                        <select class="form-control" type="text" name="id_pelatihan" require>
                          <option disabled="" selected="" value="">--Pilih Pelatihan--</option>
                          @foreach($pelatihans as $pelatihan)
                          <option value="{{$pelatihan->id_pelatihan}} ">{{$pelatihan->bidang_kejuruan}}</option>
                          @endforeach
                          </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">File (.pdf)</label>
                    <div class="col-sm-8">
                        <input type="file" name="file" class="form-control" required>
                        @if ($errors->has('file'))
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                @endif
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
            <form action="{{route('daftarpelatihan-masyarakat.update', $daftar_pelatihan->id_pen_pelatihan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">File</label>
                    <div class="col-sm-8">
                        <input type="file" name="file" class="form-control" required>
                        @if ($errors->has('file'))
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                @endif
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
<div id="detail{{$daftar_pelatihan->id_pen_pelatihan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
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