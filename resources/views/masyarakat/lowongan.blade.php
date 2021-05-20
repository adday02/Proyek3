@extends('masyarakat.template.layout')
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
                          <th>Nama lowongan</th>
                          <th>Pekerjaan</th>
                          <th>Gaji</th>
                          <th>Persayaratan</th>
                          <th width="14%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($lowongans as $lowongan)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$lowongan->perusahaan->nama}}</td>
                            <td>{{$lowongan->jenis_kerja}}</td>
                            <td>{{$lowongan->gaji}}</td>
                            <td>1. Minimal Pendidikan SMA, 2. KTP, 3. dll.</td>
                            <td>
                            <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$lowongan->id_lowongan}}" >Detail</button>
                            <button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail{{$lowongan->id_lowongan}}" >Lamar</button>
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
        @foreach ($lowongans as $lowongan)
<!-- Modal Ubah Data  -->
<div id="detail{{$lowongan->id_lowongan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
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
                    <label class="col-sm-4 control-label">Email Pengusahaan</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $lowongan->perusahaan->email }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Link Website Perusahaan</label>
                    <div class="col-sm-8">
                        <input type="text" name="website" class="form-control" value="{{ $lowongan->perusahaan->website }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lowongan->perusahaan->alamat }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kerja </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lowongan->jenis_kerja }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Lokasi Kerja </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lowongan->lokasi_kerja }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Gaji </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lowongan->gaji }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontak </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $lowongan->kontak }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi Kerja </label>
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