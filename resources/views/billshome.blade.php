@include('constants/headerAndSide')
<script src="{{ url('js/waypoints/4.0.1/jquery.waypoints.js') }}"></script>
<script src="{{ url('js/Counter-Up/1.0.0/jquery.counterup.js') }}"></script>
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
                                  <span class="label label-success float-right">Last Month</span>
                              </div>
                              <h5>Income</h5>
                          </div>
                          <div class="ibox-content">
                              <h1 class="no-margins num">{{( $amount )}}</h1>
                              <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                              <small>Total income in <?php echo date('M-Y', strtotime("-1 month")) ?></small>
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
                              <h1 class="no-margins num">{{( $count )}}</h1>
                              <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                              <small>Total customers</small>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3">
                      <div class="ibox ">
                          <div class="ibox-title">
                              <div class="ibox-tools">
                                  <span class="label label-primary float-right">currently</span>
                              </div>
                              <h5>suspended</h5>
                          </div>
                          <div class="ibox-content">
                              <h1 class="no-margins num">106</h1>
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
            <div class="card card-primary card-outline mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold text-primary">Consumption Overview in all months</h4>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <canvas id="myAreaChart"  style="height: 300px; padding: 0px; position: relative;"></canvas>                  
              </div>
            </div>
          </div>

          <!-- donut Chart -->
          <div class="col-xl-4 col-lg-5">
            <div class="card card-primary card-outline mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold text-primary">Total customers in each category</h4>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                  <canvas id="myChart1"  style="height: 300px; padding: 0px; position: relative;"></canvas>                  
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Content Column -->
          <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card card-primary card-outline mb-4">
              <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Monthly consumption in each customer's categories</h4>
              </div>
              <div class="card-body">
                <canvas id="myChart"  style="height: 300px; padding: 0px; position: relative;"></canvas>                  
              </div>
            </div>

            <!-- Color System -->
            <div class="row">
              
            </div>

          </div>

          <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card card-primary card-outline mb-4">
              <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Meter Information</h4>
              </div>
              <div class="card-body">
                <p class="lead text-break">The total registered meters are <b>{{( $count_meter )}}</b>, and the free meters available to be assigned to the new customers are <b>{{( $free_meter )}}</b> meters!</p>
                <a target="_blank" rel="nofollow" href="{{ url('/meter') }}">More information about meters are found here →</a>
              </div>
            </div>

            <!-- Approach -->
            <div class="card card-primary card-outline mb-4">
              <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Bill payment information</h4>
              </div>
              <div class="card-body">
                <p>This part is not yet implemented</p>
                <p class="lead mb-0">When its done, the crucial information about bills payments will be displayed here!.</p>
              </div>
            </div>

          </div>
        </div>

        <!-- The interactive chart -->
      <div class="pb-3">  
        <div class="row">
          <div class="col-md-12">
              <div class="card card-primary card-outline">
                  <div class="card-header">
                      <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                        Each day connsumptions
                      </h3>

                      <div class="card-tools">
                          <h3><?php echo date('D,d-M,Y'); ?></h3>
                      </div>
                  </div>

                  <div class="card-body">
                      <div class="row" style="height: 50vh">
                          <div class="col-md-12 h-100">
                          <canvas id="myLiveChart"  style="height: 0px; padding: 0px; position: relative;"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>

</div>
<div>

</div>

</body>
</html>

<script src="{{url('js/plugins/chartJs/create-charts.js')}}"></script>
<script src="{{url('js/plugins/chartJs/create-charts1.js')}}"></script>
<script src="{{url('js/plugins/chartJs/create-charts2.js')}}"></script>

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

<!-- Interactive chart script -->
<script>
  var ctx = document.getElementById("myLiveChart");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'Units',
        data: [],
        borderWidth: 1,
        lineTension: 0.3,
        backgroundColor: "rgba(2,117,216,0.5)",
        
      }]
    },
    options: {
      scales: {
        xAxes: [],
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      },
    }
  });
  var updateChart = function() {
    $.ajax({
      url: "{{ route('units.show') }}",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        myChart.data.labels = data.time;
        myChart.data.datasets[0].data = data.units;
        myChart.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }
  
  updateChart();
  setInterval(() => {
    updateChart();
  }, 1000);
</script>

<script>

// script for generating bills
var timer = setTimeout(function() { 
 $.ajax({ 
 type:'GET', 
 url : 'generate', 
 success: function(html) { 
      //  alert("Success"); 
     } 
   }); 
 }, 5000); // 5 seconds

</script>

<!-- script and style for count-up -->
<script type="text/javascript">
    $(".num").counterUp({delay:10,time:1000});
  </script>

<style>
.num {
    font-size: 40px;
    margin: 20px 0;
    color: gold;
    font-family: "montserrat", sans-serif;
}
</style>
