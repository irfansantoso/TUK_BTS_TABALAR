@extends('template')
@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-body" style="text-align: center">
          <!-- Small boxes (Stat box) -->
          <div class="row">            
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-pink">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('BCT','002'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('BCT','002'); }} &#13221;</p>                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#barChartModal" data-lok="002" class="small-box-footer">TPN</a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-teal">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('BCT','601'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('BCT','601'); }} &#13221;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#barChartModal2" data-lok="601" class="small-box-footer">TPK 57</a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('BCT','710'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('BCT','710'); }} &#13221;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#barChartModal3" data-lok="710" class="small-box-footer">LOGPOND SANGAI DRT</a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('BCT','711'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('BCT','711'); }} &#13221;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#barChartModal4" data-lok="711" class="small-box-footer">LOGPOND SANGAI AIR</a>
              </div>
            </div>            
          </div>
          <!-- /.row -->

          <div class="row">            
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-cyan">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('BCT','720'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('BCT','720'); }} &#13221;</p>                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#barChartModal5" data-lok="720" class="small-box-footer">LOGPOND TANJUNG</a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('BCT','730'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('BCT','730'); }} &#13221;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#barChartModal6" data-lok="730" class="small-box-footer">LOGPOND KABUAU DRT</a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('BCT','731'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('BCT','731'); }} &#13221;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#barChartModal7" data-lok="730" class="small-box-footer">LOGPOND KABUAU AIR</a>              
              </div>
            </div>
            <div class="col-lg-3 col-6">    
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('BCT','740'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('BCT','740'); }} &#13221;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#barChartModal8" data-lok="740" class="small-box-footer">LOGPOND HANJALIPAN</a>                
              </div>
            </div>            
          </div>
          <!-- /.row -->

          
        </div>
        <!-- /.card-body -->

    </div>
      <!-- /.card -->
    <!-- The Modal -->
    <div class="modal fade" id="barChartModal" tabindex="-1" role="dialog" aria-labelledby="barChartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="barChartModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="myChart" height="180px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="barChartModal2" tabindex="-1" role="dialog" aria-labelledby="barChartModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="barChartModalLabel2"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="myChart2" height="180px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="barChartModal3" tabindex="-1" role="dialog" aria-labelledby="barChartModalLabel3" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="barChartModalLabel3"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="myChart3" height="180px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="barChartModal4" tabindex="-1" role="dialog" aria-labelledby="barChartModalLabel4" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="barChartModalLabel4"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="myChart4" height="180px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="barChartModal5" tabindex="-1" role="dialog" aria-labelledby="barChartModalLabel5" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="barChartModalLabel5"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="myChart5" height="180px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="barChartModal6" tabindex="-1" role="dialog" aria-labelledby="barChartModalLabel6" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="barChartModalLabel6"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="myChart6" height="180px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="barChartModal7" tabindex="-1" role="dialog" aria-labelledby="barChartModalLabel7" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="barChartModalLabel7"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="myChart7" height="180px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="barChartModal8" tabindex="-1" role="dialog" aria-labelledby="barChartModalLabel8" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="barChartModalLabel8"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="myChart8" height="180px"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection