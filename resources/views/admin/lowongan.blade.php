@extends('admin.template.layout')
@section('title','Lowongan Pekerjaan' )
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
                    <h2>Lowongan Pekerjaan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Perusahaan</th>
                          <th>Pekerjaan</th>
                          <th>Gaji</th>
                          <th>Lokasi</th>
                          <th>Status</th>
                          <th width="19%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($lowongans as $lowongan)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$lowongan->perusahaan->nama}}</td>
                            <td>{{$lowongan->jenis_kerja}}</td>
                            <td>{{$lowongan->gaji}}</td>
                            <td>{{$lowongan->lokasi_kerja}}</td>
                            <td>{{$lowongan->status}}</td>
                            <td>
                                <button type="danger" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$lowongan->id_lowongan}}" >Edit</button>
                                <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$lowongan->id_lowongan}}" >Detail</button>
                                <div style="float:right;">
                                <form action="{{route('lowongan.destroy', $lowongan->id_lowongan)}}" method="POST">
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

@foreach ($lowongans as $lowongan)
<!-- Modal Ubah Data  -->
<div id="edit{{$lowongan->id_lowongan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              Perizinan Lowongan Pekerjaan
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('lowongan.update', $lowongan->id_lowongan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text"  class="form-control" value="{{ $lowongan->perusahaan->nama}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kerja</label>
                    <div class="col-sm-8">        
                        <input type="text"  class="form-control" value="{{ $lowongan->jenis_kerja}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Gaji</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $lowongan->gaji }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $lowongan->lokasi_kerja }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontak </label>
                    <div class="col-sm-8">
                        <input type="text"  class="form-control" value="{{ $lowongan->kontak }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi </label>
                    <div class="col-sm-8">
                    <textarea class="form-control" readonly>{{$lowongan->deskripsi_kerja}}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Perizinan Lowongan</label>
                    <div class="col-sm-8">        
                      <select class="form-control" name="status" required>
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
@foreach ($lowongans as $lowongan)
<!-- Modal Ubah Data  -->
<div id="detail{{$lowongan->id_lowongan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <img  align:center; src="{{URL::to('/')}}/logo/{{$lowongan->perusahaan->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$lowongan->logo}}" >
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('lowongan.update', $lowongan->id_lowongan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $lowongan->perusahaan->nama}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kerja</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $lowongan->jenis_kerja}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Gaji</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $lowongan->gaji }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi</label>
                    <div class="col-sm-8">
                        <input type="text" name="website" class="form-control" value="{{ $lowongan->lokasi_kerja }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontak </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lowongan->kontak }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi </label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" readonly>{{$lowongan->deskripsi_kerja}}</textarea>
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