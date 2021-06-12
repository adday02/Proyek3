@extends('admin.template.layout')
@section('title','Lamaran Pekerjaan' )
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pekerjaan</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lamaran Pekerjaan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Masyarakat</th>
                          <th>Nama Perusahaan</th>
                          <th>Nama Pekerjaan</th>
                          <th>Status</th>
                          <th width="14%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($lamarans as $lamaran)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$lamaran->masyarakat->nama}}</td>
                            <td>{{$lamaran->lowongan->perusahaan->nama}}</td>
                            <td>{{$lamaran->lowongan->jenis_kerja}}</td>
                            <td>{{$lamaran->status}}</td>
                            <td>
                                <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$lamaran->id_lamaran}}" >Detail</button>
                                <a href="{{URL::to('/')}}/file/{{$lamaran->file}}"><button type="danger" class="btn btn-dark btn-sm">Unduh</button></a>
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
@foreach ($lamarans as $lamaran)
<!-- Modal Detail Data  -->
<div id="detail{{$lamaran->id_lamaran}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <img  align:center; src="{{URL::to('/')}}/logo/{{$lamaran->lowongan->perusahaan->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$lamaran->logo}}" >
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('lamaran.update', $lamaran->id_lamaran)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Masyarakat</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $lamaran->masyarakat->nama}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $lamaran->Lowongan->perusahaan->nama}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kerja</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $lamaran->lowongan->jenis_kerja}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Gaji</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $lamaran->lowongan->gaji }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi</label>
                    <div class="col-sm-8">
                        <input type="text" name="website" class="form-control" value="{{ $lamaran->lowongan->lokasi_kerja }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontak </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lamaran->lowongan->kontak }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi </label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" readonly>{{$lamaran->deskripsi_kerja}}</textarea>
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