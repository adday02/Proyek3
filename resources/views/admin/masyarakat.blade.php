@extends('admin.template.layout')
@section('title','masyarakat' )
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Masyarakat</h2>
                    <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Masyarakat</button></div> 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Jenis kelamain</th>
                          <th>No HP</th>
                          <th>Pendidikan Terakhir</th>
                          <th>Foto</th>
                          <th width="18.5%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($masyarakats as $masyarakat)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$masyarakat->nama}}</td>
                            <td>{{$masyarakat->jk}}</td>
                            <td>{{$masyarakat->no_hp}}</td>
                            <td>{{{$masyarakat->pendidikan_terakhir}}}</td>
                            <td><img width="30 px" src="{{URL::to('/')}}/foto/{{$masyarakat->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$masyarakat->foto}}" ></td></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$masyarakat->nik}}" " >Edit</button>
                                <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#" >Detail</button>
                                <div style="float:right;">
                                <form action="{{route('masyarakat.destroy', $masyarakat->nik)}}" method="POST">
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
  

<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
              <form action="{{route('masyarakat.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <label class="col-sm-4 control-label">NIK</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">        
                      <select class="form-control" name="jk" required>
                        <option disabled="" selected="" value="">Pilih Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>
                </div>
                

                <div class="row form-group">
                    <label class="col-sm-4 control-label">No HP</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Pendidikan Terakhir</label>
                    <div class="col-sm-8">        
                      <select class="form-control" name="pendidikan_terakhir" required>
                        <option disabled="" selected="" value="">Pilih Pendidikan Terakhir</option>
                        <option>SD/MI/Sederajat</option>
                        <option>SMP/MTs/Sederajat</option>
                        <option>SMA/SMK/MA/Sederajat</option>
                        <option>D1</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>D4</option>
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
                      </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" id="inputGroupFile01">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah masyarakat</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /Modal tambah -->

@foreach ($masyarakats as $masyarakat)
<!-- Modal Ubah Data  -->
<div id="edit{{$masyarakat->nik}}" class="modal fade" role="dialog">
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
            <form action="{{route('masyarakat.update', $masyarakat->nik)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">NIK</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nik" class="form-control" value ="{{$masyarakat->nik}}" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" value ="{{$masyarakat->password}}" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value ="{{$masyarakat->nama}}" required>
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">        
                      <select class="form-control" name="jk">
                        <option disabled="" selected="" value="">Pilih Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>
                </div>
                

                <div class="row form-group">
                    <label class="col-sm-4 control-label">No HP</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_hp" class="form-control" value ="{{$masyarakat->no_hp}}" required>
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Pendidikan Terakhir</label>
                    <div class="col-sm-8">        
                      <select class="form-control" name="pendidikan_terakhir">
                        <option disabled="" selected="" value="" >Pilih Pendidikan Terakhir</option>
                        <option>SD/MI/Sederajat</option>
                        <option>SMP/MTs/Sederajat</option>
                        <option>SMA/SMK/MA/Sederajat</option>
                        <option>D1</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>D4</option>
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
                      </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value ="{{$masyarakat->alamat}}" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" id="inputGroupFile01">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Edit masyarakat</button>
                </div>   
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach
@endsection