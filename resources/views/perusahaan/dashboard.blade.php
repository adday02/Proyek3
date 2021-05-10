@extends('perusahaan.template.layout')
@section('title','Perusahaan - Dashboard' )
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Lowongan Pekerjaan</span>
              <div class="count">{{$lowongan}}</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Lamaran Pekerjaan</span>
              <div class="count">{{$lamaran}}</div>
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
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Top Campaign Performance</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    
                    <div>
                      <p>Lowongan Pekerjaan</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 50%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="7"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    
                    <div>
                      <p>Lamaran Pekerjaan</p>
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
@endsection