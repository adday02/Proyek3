@extends('perusahaan.template.layout')
@section('title','Perusahaan - Lamaran Pekerjaan' )
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
                         
                          <th>Jenis Pekerjaan</th>
                          <th>Status</th>
                          <th width="25%">Aksi</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($lamarans as $lamaran)
                        @if(auth()->user()->id_perusahaan == $lamaran->lowongan->perusahaan->id_perusahaan)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$lamaran->masyarakat->nama}}</td>
                            
                            <td>{{$lamaran->lowongan->jenis_kerja}}</td>
                            <td>{{$lamaran->status}}</td>
                            <td>
                                <button type="danger" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$lamaran->id_lamaran}}" >Edit</button>
                                <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail-data{{$lamaran->id_lamaran}}" >Detail</button>
                                <a href="{{URL::to('/')}}/file/{{$lamaran->file}}"><button type="danger" class="btn btn-dark btn-sm">Unduh</button></a>
                                <div style="float:right;">
                                <form action="{{route('lamaran.destroy', $lamaran->id_lamaran)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                </form>
                                </div>
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
@foreach ($lamarans as $lamaran)
<!-- Modal Ubah Data  -->
<div id="edit{{$lamaran->id_lamaran}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Lamaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('lamaran-perusahaan.update', $lamaran->id_lamaran)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Masyarakat</label>
                    <div class="col-sm-8">        
                        <input type="text"  class="form-control" value="{{ $lamaran->masyarakat->nama}}" required="required" readonly>
                    </div>
                    @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-8">
                    <input class="form-control" type="text" value="{{$lamaran->lowongan->perusahaan->nama}}" readonly></input>
                    </div>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Pekerjaan</label>
                    <div class="col-sm-8">
                        <input type="text"  class="form-control" value="{{ $lamaran->lowongan->jenis_kerja }}" required="required" readonly>
                    </div>
                    @error('jenis_kerja')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">        
                    <select class="form-control"  type="text" name="status" required>
                            <option disabled="" selected="" value="">--Pilih Jenis Status--</option>
                            <option value="Tahap Medical Checkup">Tahap Medical Checkup</option>
                            <option value="Tahap Interview">Tahap Interview</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
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
<!-- Modal Edit -->
@endforeach

@foreach ($lamarans as $lamaran)
<!-- Modal Detail Data  -->
<div id="detail-data{{$lamaran->id_lamaran}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <img  align:center; src="{{URL::to('/')}}/logo/{{$lamaran->lowongan->perusahaan->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$lamaran->logo}}" >
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form  class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Masyarakat</label>
                    <div class="col-sm-8">        
                        <input type="text"  class="form-control" value="{{ $lamaran->masyarakat->nama}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text"  class="form-control" value="{{ $lamaran->lowongan->perusahaan->nama}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kerja</label>
                    <div class="col-sm-8">        
                        <input type="text" class="form-control" value="{{ $lamaran->lowongan->jenis_kerja}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Gaji</label>
                    <div class="col-sm-8">
                        <input type="text"  class="form-control" value="{{ $lamaran->lowongan->gaji }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi</label>
                    <div class="col-sm-8">
                        <input type="text"  class="form-control" value="{{ $lamaran->lowongan->lokasi_kerja }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontak </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $lamaran->lowongan->kontak }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi </label>
                    <div class="col-sm-8">
                    <textarea class="form-control" readonly>{{ $lamaran->lowongan->deskripsi_kerja }}</textarea>
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