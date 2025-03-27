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
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('MIM','002'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('MIM','002'); }} &#13221;</p>                 
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
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('MIM','601'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('MIM','601'); }} &#13221;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#barChartModal2" data-lok="601" class="small-box-footer">TPK</a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>{{ App\Http\Controllers\UserController::getQtyKayuAllHome('MIM','730'); }}<sup style="font-size: 20px"></sup></h3>
                  <p>{{ App\Http\Controllers\UserController::getVolKayuAllHome('MIM','730'); }} &#13221;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#barChartModal3" data-lok="730" class="small-box-footer">LOGPOND</a>
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

    

@endsection