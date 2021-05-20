@extends('admin.template.layout')
@section('title','Perusahaan' )
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
                <h3>Users</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Perusahaan</h2>
                    <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Perusahaan</button></div> 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th >No</th>
                          <th>Nama Perusahaan</th>
                          <th>email</th>
                          <th>Werbsite</th>
                          <th >logo</th>
                          <th width="18.5%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($perusahaans as $perusahaan)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$perusahaan->nama}}</td>
                            <td>{{$perusahaan->email}}</td>
                            <td>{{$perusahaan->website}}</td>
                            <td><img width="50 px" src="{{URL::to('/')}}/logo/{{$perusahaan->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$perusahaan->logo}}" ></td></td>
                            <td>
                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$perusahaan->id_perusahaan}}" >Edit</button>
                              <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$perusahaan->id_perusahaan}}" >Detail</button>
                              <div style="float:right;">
                                <form form action="{{route('perusahaan.destroy', $perusahaan->id_perusahaan)}}" method="POST">
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
               
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
              <form action="{{route('perusahaan.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                
      
               
                <div class="row form-group">
                    <label class="col-sm-4 control-label">ID Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="id_perusahaan" class="form-control" required pattern="[0-9]{7,12}" title="Format harus berupa angka, min 7 dan max 11">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Masukkan Password dengan huruf besar dan kecil, Min 8 Karakter">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" required pattern="[A-Za-z\s]{,255}" title="Masukkan Nama Perusahaan hanya dengan huruf">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Link Website</label>
                    <div class="col-sm-8">
                        <input type="text" name="website" class="form-control" required pattern=".{,255}" title="Link Website Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" required pattern=".{,255}" title="Alamat Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi </label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" type="text" required pattern=".{,255}" title="Deskripsi Max 255 Karakter"></textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Logo</label>
                    <div class="col-sm-8">        
                        <input type="file" name="logo" class="form-control-file  @error('logo') is-invalid @enderror" value="{{ old('logo') }}" id="inputGroupFile01"   required>
                        @if ($errors->has('logo'))
                                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                                @endif
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Perusahaan</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->

@foreach ($perusahaans as $perusahaan)
<!-- Modal Ubah Data  -->
<div id="edit{{$perusahaan->id_perusahaan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('perusahaan.update', $perusahaan->id_perusahaan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $perusahaan->nama}}" required pattern="[A-Za-z\s]{,255}" title="Masukkan Nama Perusahaan hanya dengan huruf">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $perusahaan->email }}" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Link Website</label>
                    <div class="col-sm-8">
                        <input type="text" name="website" class="form-control" value="{{ $perusahaan->website }}" required pattern=".{,255}" title="Link website Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $perusahaan->alamat }}" required pattern=".{,255}" title="Alamat Max 255 Karakter">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi </label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" type="text" required pattern=".{,255}" title="Deskripsi Max 255 Karakter">{{$perusahaan->deskripsi}}</textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" select="{{$perusahaan->logo}}">
                        @if ($errors->has('logo'))
                                    <span class="text-danger">{{ $errors->first('logo') }}</span>
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

@foreach ($perusahaans as $perusahaan)
<!-- Modal Ubah Data  -->
<div id="detail{{$perusahaan->id_perusahaan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              <img  align:center; src="{{URL::to('/')}}/logo/{{$perusahaan->logo}}" class="fa-image" width="100px" href="URL::to('/')}}/logo/{{$perusahaan->logo}}" >
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('perusahaan.update', $perusahaan->id_perusahaan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">ID Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $perusahaan->id_perusahaan}}" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $perusahaan->nama}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $perusahaan->email }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Link Website</label>
                    <div class="col-sm-8">
                        <input type="text" name="website" class="form-control" value="{{ $perusahaan->website }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $perusahaan->alamat }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi </label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" readonly>{{$perusahaan->deskripsi}}</textarea>
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