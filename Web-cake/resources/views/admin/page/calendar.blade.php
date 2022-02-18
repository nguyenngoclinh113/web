@extends('admin.layouts.master')
@section('content')
	<div class="container">
		@if(Session::has('messege'))
					<div class="alert alert-success">{{Session::get('messege')}}</div>
		@endif
		<div class="panel panel-primary">

			<div class="panel-heading"><h2>Add Event Calendar</h2></div>
				
				<div class="panel-body" style="font-size:15px; margin-left:160px">
					<form class="form-inline" role="form" method="post" action="{{url('admin/calendar/add')}}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
					    <label for="email2" class="mb-2 mr-sm-2">Name:</label>
					    <input type="text" class="form-control mb-2 mr-sm-2" id="email2" placeholder="Name event" name="name" style="font-size:13px;" value="{{old('name')}}">
					    @if($errors->has('name'))
    						<p class="text-danger">{{$errors->first('name')}}</p>
 						@endif
 						</div>
 						<div class="form-group">
					    <label for="pwd2" class="mb-2 mr-sm-2">Start Date:</label>
					    <input type="date" class="form-control mb-2 mr-sm-2" id="pwd2" placeholder="Start date" name="start_date" style="font-size:13px;" value="{{old('start_date')}}">
					    @if($errors->has('start_date'))
    						<p class="text-danger">{{$errors->first('start_date')}}</p>
 						@endif
 						</div>
 						<div class="form-group">
					     <label for="pwd2" class="mb-2 mr-sm-2">End Date:</label>
					    <input type="date" class="form-control mb-2 mr-sm-2" id="pwd2" placeholder="End date" name="end_date" style="font-size:13px;" value="{{old('end_date')}}">
					    @if($errors->has('end_date'))
    						<p class="text-danger">{{$errors->first('end_date')}}</p>
 						@endif
 					</div>
					      
					  <button type="submit" class="btn btn-primary mb-2" style="font-size:13px;">Submit</button>
				  </form>
				</div>

			<div class="panel panel-primary">
			<div class="panel-heading"><h1>Event Calendar</h1></div>
			<div class="panel-body">
				{!! $calendar_details->calendar() !!}
			</div>
		
		</div>
		</div>
@endsection