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
                    <h2>Kontak</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Lengkap</th>
                          <th>email</th>
                          <th>Tujuan</th>
                          <th>Pesan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($kontaks as $kontak)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$kontak->nama}}</td>
                            <td>{{$kontak->email}}</td>
                            <td>{{$kontak->tujuan}}</td>
                            <td>{{$kontak->pesan}}</td>
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
@endsection