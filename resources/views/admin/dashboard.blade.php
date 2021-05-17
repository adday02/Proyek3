@extends('admin.template.layout')
@section('title','Dashboard' )
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Masyarakat</span>
              <div class="count">{{$masyarakats}}</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Perusahaan</span>
              <div class="count">{{$perusahaans}}</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Lowoganan Pekerjaan</span>
              <div class="count">{{$lowongans}}</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Lamaran Pekerjaan</span>
              <div class="count">{{$lamarans}}</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Jenis Pelatihan</span>
              <div class="count">{{$pelatihans}}</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Pengajuan Pelatihan</span>
              <div class="count">{{$pen_pelatihans}}</div>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Lowongan Pekerjaan</h3>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div id="graph_bar" class="demo-placeholder"></div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Top Campaign Performance</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Perusahaan 1 (2 Lowongan)</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 50%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="2"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Perusahaan 2 (7 Lowongan)</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 50%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="7"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Perusahaan 3 (1 Lowongan)</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 50%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="1"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Perusahaan 4 (6 Lowongan)</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 50%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="6"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection