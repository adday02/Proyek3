@extends('perusahaan.template.layout')
@section('title','Perusahaan - Lowongan Pekerjaan' )
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
                        <!-- Button trigger modal -->
                    <h2>Lowongan Pekerjaan</h2>
                    <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Lowongan Pekerjaan</button></div> 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Perusahaan</th>
                          <th>Nama Pekerjaan</th>
                          <th>Lokasi Kerja</th>
                          <th>Gaji</th>
                          <th>Tanggal Info</th>
                          <th>Jenis Kerja</th>
                          <th>Kontak</th> 
                          <th>Status Lowongan</th>
                          <th width="18.5%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($lowongans as $lowongan)
                        <tr>
                          <td>{{++$i}}</td>s
                            <td>{{$lowongan->id_perusahaan}}</td>
                            <td>{{$lowongan->jenis_kerja}}</td>
                            <td>{{$lowongan->deskripsi_kerja}}</td>
                            <td>{{$lowongan->lokasi_kerja}}</td>
                            <td>{{$lowongan->gaji}}</td>
                            <td>{{$lowongan->kontak}}</td>
                            <td>{{$lowongan->status}}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$lowongan->id_lowongan}}" >Edit</button>
                                <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail-data{{$lowongan->id_lowongan}}" >Detail</button>
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
        <!-- /page content -->

        <!-- Modal tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Lowongan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            
            <div class="modal-body">
            
              @if(count($errors) > 0)
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              {{ $error }} <br/>
            @endforeach
          </div>
        @endif
              <form action="{{route('lowongan.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                <input class="form-control" name="jenis_kerja"type="text" placeholder="Jenis Pekerjaan"></br>
                <input class="form-control" name="lokasi_kerja"type="text" placeholder="Lokasi kerja"></br>
                <input class="form-control" name="gaji"type="text" placeholder="Gaji"></br>
                <input class="form-control" name="kontak"type="text" placeholder="Kontak"></br>
                <textarea class="form-control"name="deskripsi_kerja" type="text" placeholder="Deskripsi Pekerjaan"></textarea></br>
                <input hidden="" name="id_perusahaan" value="{{auth()->user()->id_perusahaan}}">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Lowongan</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->

@foreach ($lowongans as $lowongan)
<!-- Modal Ubah Data  -->
<div id="edit{{$lowongan->id_lowongan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Lowongan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('lowongan.update', $lowongan->id_lowongan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            <div class="row form-group">
              <label class="col-sm-4 control-label">Jenis Pekerjaan</label>
              <div class="col-sm-8">        
                  <input type="text" name="jenis_kerja" class="form-control" value="{{ $lowongan->jenis_kerja}}" required>
              </div>
              @error('jenis_pekerjaan')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi Kerja</label>
                    <div class="col-sm-8">
                        <input type="text" name="lokasi_kerja" class="form-control" value="{{ $lowongan->lokasi_kerja }}" required>
                    </div>
                    @error('lokasi_kerja')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Gaji</label>
                    <div class="col-sm-8">
                        <input type="text" name="gaji" class="form-control" value="{{ $lowongan->gaji }}" required>
                    </div>
                    @error('gaji')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontak</label>
                    <div class="col-sm-8">
                        <input type="text" name="kontak" class="form-control" value="{{ $lowongan->kontak }}" required>
                    </div>
                    @error('kontak')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi Pekerjaan</label>
                    <div class="col-sm-8">
                    <input class="form-control"name="deskripsi_kerja" type="text" value="{{$lowongan->deskripsi_kerja}}"></input></br>
                    </div>
                    @error('deskripsi_kerja')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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


foreach ($lowongans as $lowongan)
             <!--modal Detail-->
    <div class="modal fade" id="detail-data{{$lowongan->id_lowongan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Pelatihan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="card">
          <div class="row form-group">
                    <label class="col-sm-4 control-label">ID Lowongan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="id_lowongan" class="form-control" value="{{ $lowongan->id_lowongan}}" readonly>
                    </div>
                </div>

                 <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="id_perusahaan" class="form-control" value="{{ $lowongan->id_perusahaan}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Pekerjaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $lowongan->nama}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Pekerjaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="jenis_kerja" class="form-control" value="{{ $lowongan->jenis_kerja}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi Pekerjaan</label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi_kerja" readonly>{{$lowongan->deskripsi_kerja}}</textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi Kerja</label>
                    <div class="col-sm-8">
                        <input type="text" name="lokasi_kerja" class="form-control" value="{{ $lowongan->lokasi_kerja }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Gaji</label>
                    <div class="col-sm-8">
                        <input type="text" name="gaji" class="form-control" value="{{ $lowongan->gaji }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontak</label>
                    <div class="col-sm-8">
                        <input type="text" name="kontak" class="form-control" value="{{ $lowongan->kontak }}" readonly>
                    </div>
                </div>
              
                <input type="text" name="status" class="form-control" id="status" required="" value="{{ $lowongan->status }}" readonly>
                </div>
               
            <br>
              
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
@endforeach
@endsection