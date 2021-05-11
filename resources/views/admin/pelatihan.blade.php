@extends('admin.template.layout')
@section('title','Admin - List Pelatihan' )
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
                    <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah List Pelatihan</button></div> 
                    <div class="clearfix"></div>
                  </div>
                
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th>No</th>
                          <th>Bidang Kejuruan</th>
                          <th>Kuota</th>
                          <th>Waktu</th>
                          <th width="18.5%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($pelatihans as $pelatihan)
                        <tr>
                        <td>{{++$i}}</td>
                            <td>{{$pelatihan->bidang_kejuruan}}</td>
                            <td>{{$pelatihan->kuota}} Orang</td>
                            <td>{{$pelatihan->waktu}} Bulan</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$pelatihan->id_pelatihan}}" >Edit</button>
                                <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail-data{{$pelatihan->id_pelatihan}}" >Detail</button>
                                <div style="float:right;">
                                <form action="{{route('pelatihan.destroy', $pelatihan->id_pelatihan)}}" method="POST">
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
                <h5 class="modal-title" id="mediumModalLabel">Tambah Pelatihan</h5>
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
              <form action="{{route('pelatihan.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
               
                <input class="form-control" name="bidang_kejuruan"type="text" placeholder="Bidang Kejuruan" pattern="[A-Za-z\s]{3,255}" title="Masukkan Bidang kejuruan hanya dengan huruf, Min 3 dan Max 255"></br>
                <input class="form-control" name="waktu"type="text" placeholder="Waktu" pattern="[0-9]{,2}" title="Masukkan Waktu dengan angka, Max karakter"></br>
                <input class="form-control" name="kuota"type="text" placeholder="Kuota" pattern="[0-9]{,2}" title="Masukkan Kuota dengan angka, Max 2 karakter"></br>
                <textarea class="form-control"name="deskripsi" type="text" placeholder="Deskripsi Pelatihan" required pattern=".{,255}" title="Deskripsi Max 255 Karakter"></textarea></br>
                <textarea class="form-control"name="persyaratan" type="text" placeholder="Persayratan Pelatihan" required pattern=".{,255}" title="Persayratan Max 255 Karakter"></textarea></br>

                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Pelatihan</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->

@foreach ($pelatihans as $pelatihan)
<!-- Modal Ubah Data  -->
<div id="edit{{$pelatihan->id_pelatihan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Pelatihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('pelatihan.update', $pelatihan->id_pelatihan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Bidang Kejuruan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="bidang_kejuruan" class="form-control" value="{{ $pelatihan->bidang_kejuruan}}" required title="Masukkan Bidang kejuruan hanya dengan huruf, Min 3 dan Max 255">
                    </div>
                    @error('bidang_kejuruan')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kuota</label>
                    <div class="col-sm-8">
                        <input type="text" name="kuota" class="form-control" value="{{ $pelatihan->kuota }}" required pattern="[0-9]{,2}" title="Masukkan Kuota dengan angka, Max 2 karakter">
                    </div>
                    @error('kuota')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Waktu</label>
                    <div class="col-sm-8">
                        <input type="text" name="waktu" class="form-control" value="{{ $pelatihan->waktu }}" required pattern="[0-9]{,2}" title="Masukkan Waktu dengan angka, Max 2 karakter">
                    </div>
                    @error('waktu')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Persyaratan</label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" type="text" required pattern=".{,255}" title="Deskripsi Max 255 Karakter">{{ $pelatihan->persyaratan }}</textarea>
                    </div>
                    @error('persyaratan')
            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi Pelatihan</label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" type="text" required pattern=".{,255}" title="Deskripsi Max 255 Karakter">{{ $pelatihan->deskripsi }}</textarea>
                    </div>
                    @error('deskripsi')
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

foreach ($pelatihans as $pelatihan)
             <!--modal Detail-->
    <div class="modal fade" id="detail-data{{$pelatihan->id_pelatihan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <label class="col-sm-4 control-label">ID Pelatihan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="id_pelatihan" class="form-control" value="{{ $pelatihan->id_pelatihan}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Bidang Kejuruan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="bidang_kejuruan" class="form-control" value="{{ $pelatihan->bidang_kejuruan}}" readonly>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kuota</label>
                    <div class="col-sm-8">
                        <input type="text" name="kuota" class="form-control" value="{{ $pelatihan->kuota }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">waktu</label>
                    <div class="col-sm-8">
                        <input type="text" name="waktu" class="form-control" value="{{ $pelatihan->waktu }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi Pelatihan</label>
                    <div class="col-sm-8">
                    <textarea class="form-control">{{ $pelatihan->deskripsi }}</textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Persyaratan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control">{{ $pelatihan->persyaratan }}</textarea>
                    </div>
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
