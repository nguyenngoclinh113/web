@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel-body">
            	<i class="fa fa-check-square" style="color:#3c8dbc"></i><span style="font-size: 20px;"> Order Details</span>
                <table id="contact-table" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="sorting">Unit</th>
                        <th class="sorting">Price</th>
                        <th class="sorting">Quantity</th>
                        <th class="sorting">Total</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach($billDetails as $details)
                    	<tr>
                    		
                    		<td>{{$details->product->name}}</td>
                    		<td>{{$details->product->unit}}</td>
                    		<td>{{$details->unit_price}}</td>
                    		<td>{{$details->quantity}}</td>
                    		<td>{{$details->quantity*$details->unit_price}}</td>	
                    	</tr>
                    	@endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>

                </table>
                <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-warning"> Back Page</a>
            </div>
        </div>
    </div>

@endsection