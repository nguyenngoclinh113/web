@extends('admin.layouts.master')
@section('content')
	   <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$users}}</h3>

              <p>USERS</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$categories}}<sup style="font-size: 20px"></sup></h3>

              <p>CATEGORIES</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-align-justify"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$products}}</h3>

              <p>PRODUCTS</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-asterisk"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$bills}}</h3>

              <p>BILL TOTAL</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-edit"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$billsDate}}<sup style="font-size: 20px"></sup></h3>

              <p>BILL TODAY</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-share"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$comments}}</h3>

              <p>COMMENTS</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-comment"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
        <div class="col-lg-12 col-xs-6">
        <div id="curve_chart" style="width: 100%; height: 500px"></div>
        </div>
      </div>
      <!-- /.row -->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        $.ajax({
          url: "/admin/bill/get/bill", 
          success: function(res){
            console.log(res);
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
              var arrReve = [];
              for ( var i = 0; i <= res.length; i++ ){
                if( i == 0 ){
                  arrReve[i] = new Array('Time', 'Total');
                }else{
                  arrReve[i] = new Array(res[i-1]['date_order'], res[i-1]['total']);
                }
              }
              console.log(arrReve);
                var data = google.visualization.arrayToDataTable(arrReve);
                // var data = google.visualization.arrayToDataTable([
                //   ['Year', 'Sales', 'Expenses'],
                //   ['2004',  1000,      400],
                //   ['2005',  1170,      460],
                //   ['2006',  660,       1120],
                //   ['2007',  1030,      540]
                // ]);

                var options = {
                  title: 'Revenue Analysis',
                  curveType: 'function',
                  legend: { position: 'bottom' }
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);

            }
          }
        });
      </script>
@endsection