@include('constants/headerAndSide')

<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right">Monthly</span>
                                </div>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">40 886,200</h1>
                                <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                                <small>Total income</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-info float-right">currently</span>
                                </div>
                                <h5>Customers</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{( $count )}}</h1>
                                <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                                <small>Total customers</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-primary float-right">Today</span>
                                </div>
                                <h5>suspended</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">106</h1>
                                <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> -->
                                <small>suspended customers</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-danger float-right">currently</span>
                                </div>
                                <h5>Paid bills</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">70%</h1>
                                <!-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> -->
                                <small>In last month</small>
                            </div>
                        </div>
                    </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Consuption Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" style="display: block; width: 133px; height: 60px;" width="133" height="60" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- donut Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <!-- <div class="chart-donut pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div> -->
                  {!! $chart1->render() !!}
                  <!-- </div> -->
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

              <!-- Color System -->
              <div class="row">
               
              </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw →</a>
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
              </div>

            </div>
          </div>

        </div>


</body>
</html>

<script src="{{url('js/plugins/chartJs/create-charts.js')}}"></script>

<script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Responsive Admin Theme', 'Welcome to MORUWASA billing Dashboard');

            }, 1300);


        //     var data1 = [
        //         [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
        //     ];
        //     var data2 = [
        //         [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
        //     ];
        //     $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
        //         data1, data2
        //     ],
        //             {
        //                 series: {
        //                     lines: {
        //                         show: false,
        //                         fill: true
        //                     },
        //                     splines: {
        //                         show: true,
        //                         tension: 0.4,
        //                         lineWidth: 1,
        //                         fill: 0.4
        //                     },
        //                     points: {
        //                         radius: 0,
        //                         show: true
        //                     },
        //                     shadowSize: 2
        //                 },
        //                 grid: {
        //                     hoverable: true,
        //                     clickable: true,
        //                     tickColor: "#d5d5d5",
        //                     borderWidth: 1,
        //                     color: '#d5d5d5'
        //                 },
        //                 colors: ["#1ab394", "#1C84C6"],
        //                 xaxis:{
        //                 },
        //                 yaxis: {
        //                     ticks: 4
        //                 },
        //                 tooltip: false
        //             }
        //     );

        //     var doughnutData = {
        //         labels: ["App","Software","Laptop" ],
        //         datasets: [{
        //             data: [300,50,100],
        //             backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
        //         }]
        //     } ;


        //     var doughnutOptions = {
        //         responsive: false,
        //         legend: {
        //             display: false
        //         }
        //     };


        //     var ctx4 = document.getElementById("doughnutChart").getContext("2d");
        //     new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        //     var doughnutData = {
        //         labels: ["App","Software","Laptop" ],
        //         datasets: [{
        //             data: [70,27,85],
        //             backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
        //         }]
        //     } ;


        //     var doughnutOptions = {
        //         responsive: false,
        //         legend: {
        //             display: false
        //         }
        //     };


        //     var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
        //     new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});
        
    
    $('#dws').addClass('myClass2');

        });
    </script> 

