@extends('masyarakat.template.layout')
@section('title','Lamaran Pekerjaan' )
@section('content')
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
                <h3>Pekerjaan</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lamaran Pekerjaan</h2>
                     <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Lamaran Pekerjaan</button></div> 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pekerjaan</th>
                          <th>Nama Perusahaan</th>
                          <th>Jenis Pekerjaan</th>
                          <th>Status</th>
                          <th width="19%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($lamarans as $lamaran)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$lamaran->lowongan->nama}}</td>
                            <td>{{$lamaran->lowongan->perusahaan->nama}}</td>
                            <td>{{$lamaran->lowongan->jenis_kerja}}</td>
                            <td>{{$lamaran->status}}</td>
                            <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$lamaran->id_lamaran}}" >Edit</button>
                            <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$lamaran->id_lamaran}}" >Detail</button>
                            <div style="float:right;">
                                <form form action="{{route('lamaran-masyarakat.destroy', $lamaran->id_lamaran)}}" method="POST">
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
                <h5 class="modal-title" id="mediumModalLabel">Tambah Lamaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
              <form action="{{route('lamaran-masyarakat.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Lowongan</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_lowongan" require>
                          <option disabled="" selected="" value="">--Pilih Lowongan--</option>
                          @foreach($lowongans as $lowongan)
                          <option value="{{$lowongan->id_lowongan}} ">{{$lowongan->jenis_kerja}} Pada {{$lowongan->perusahaan->nama}}</option>
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
                  <button type="submit" class="btn btn-primary">Tambah Lamaran</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->

@foreach ($lamarans as $lamaran)
<!-- Modal Ubah Data  -->
<div id="edit{{$lamaran->id_lamaran}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit lamaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('lamaran-masyarakat.update', $lamaran->id_lamaran)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">File (.pdf)</label>
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

@foreach ($lamarans as $lamaran)
<!-- Modal Ubah Data  -->
<div id="detail{{$lamaran->id_lamaran}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <img  align:center; src="{{URL::to('/')}}/logo/{{$lamaran->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$lamaran->logo}}" >
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('lamaran.update', $lamaran->id_lamaran)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $lamaran->lowongan->perusahaan->nama}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Email Pengusahaan</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $lamaran->lowongan->perusahaan->email }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Link Website Perusahaan</label>
                    <div class="col-sm-8">
                        <input type="text" name="website" class="form-control" value="{{ $lamaran->lowongan->perusahaan->website }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lamaran->lowongan->perusahaan->alamat }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kerja </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lamaran->lowongan->jenis_kerja }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi Kerja </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lamaran->lowongan->lokasi_kerja }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Gaji </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lamaran->lowongan->gaji }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontak </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lamaran->lowongan->kontak }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi Kerja </label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" readonly>{{$lamaran->lowongan->deskripsi_kerja}}</textarea>
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