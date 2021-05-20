@extends('admin.template.layout')
@section('title','Masyarakat - Edit Profile' )
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profile Masyarakat</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Profile</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th>No</th>
                          <th>Password</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Nomor Hp</th>
                          <th>Alamat</th>
                          <th>Foto</th>
                          <th>Status</th>
                          <th width="18.5%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($masyarakats as $masyarakat)
                        <tr>
                        <td>{{++$i}}</td>
                            <td>{{$masyarakat->password}}</td>
                            <td>{{$masyarakat->nama}} </td>
                            <td>{{$masyarakat->jk}} </td>
                            <td>{{$masyarakat->no_hp}}</td>
                            <td>{{$masyarakat->alamat}} </td>
                            <td><img width="50 px" src="{{URL::to('/')}}/foto/{{$masyarakat->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$masyarakat->foto}}" ></td></td>
                            <td>{{$masyarakat->status}} </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$masyarakat->nik}}" >Edit</button>
                                
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

      

@foreach ($masyarakats as $masyarakat)
<!-- Modal Ubah Data  -->
<div id="edit{{$masyarakat->nik}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('masyarakat.update', $masyarakat->nik)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="text" name="password" class="form-control" value="{{ $masyarakat->password}}" required pattern="[A-Za-z\s]{,255}" title="Masukkan Password hanya dengan huruf">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" value="{{ $masyarakat->nama }}" required pattern="[A-Za-z\s]{,255}" title="Masukkan Password hanya dengan huruf">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <input type="text" name="jk" class="form-control" value="{{ $masyarakat->jk }}" required pattern=".{,255}" title="Masukkan Jenis hanya dengan huruf">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nomor HP </label>
                    <div class="col-sm-8">
                        <input type="text" name="no_hp" class="form-control" value="{{ $masyarakat->no_hp }}" required pattern=".{,255}" title="Nomor Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Pendidikan Terakhir </label>
                    <div class="col-sm-8">
                        <input type="text" name="pendidikan_terkahir" class="form-control" value="{{ $masyarakat->pendidikan_terakhir }}" required pattern=".{,255}" title="Nomor Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $masyarakat->alamat }}" required pattern=".{,255}" title="Nomor Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" select="{{$masyarakat->foto}}">
                        @if ($errors->has('foto'))
                                    <span class="text-danger">{{ $errors->first('foto') }}</span>
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

       
@endsection