@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel-body">
            	<i class="fa fa-check-square" style="color:#3c8dbc"></i><span style="font-size: 20px;"> Order From Date To Date</span>
                <table id="contact-table" class="table table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th class="sorting">Name</th>
                        <th class="sorting">Phone</th>
                        <th class="sorting">Address</th>
                        <th class="sorting">Date order</th>
                        <th class="sorting">Total</th>
                        <th class="sorting">Payment</th>
                        <th class="sorting">Note</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @if($bills->isEmpty())
                            <span style="color:red; font-style: italic;">/ Not Data</span>
                        @else
                            <span style="color:#3c8dbc; font-style: italic;">: {{$fromDate}} -> {{$toDate}} / Have: {{$bills->count()}} Bills / Total money: {{number_format($bills->sum('total'))}}</span>
                    	@foreach($bills as $bill)
                    	<tr>
                    		<td><a href="{{url('admin/bill/details/'.$bill->id)}}" title="Details bill">{{$bill->id}}</a></td>
                    		<td>{{$bill->name}}</td>
                    		<td>{{$bill->phone}}</td>
                    		<td>{{$bill->address}}</td>
                    		<td>{{$bill->date_order}}</td>
                            <td>{{$bill->total}}</td>
                            <td>{{$bill->payment}}</td>  
                            <td>{{$bill->note}}</td>  	
                    	</tr>
                    	@endforeach
                        @endif
                    </tbody>
                    <tfoot>
                    </tfoot>

                </table>
                

                <form action="{{url('admin/bill/export/excel')}}" method="get">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" value="{{$fromDate}}" name="fromDate">
                    <input type="hidden" value="{{$toDate}}" name="toDate">
                    <input type="submit" class="btn btn-info" value="Export Excel  "> 
                </form>
                <br>
                <a href="{{url('admin/bill')}}" class="btn btn-warning"> Back Page Bill </a>
                
            </div>
            <div class="row">{{$bills->appends(request()->query())->links()}}</div>
        </div>
    </div>

@endsection