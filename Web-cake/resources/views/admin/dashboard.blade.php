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
      </div>
      <!-- /.row -->
@endsection