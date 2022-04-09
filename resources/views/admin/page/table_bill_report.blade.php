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
                        <th class="sorting">Status</th>
                        <th class="sorting">Process</th>
                        <th class="sorting">Export PDF</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        
                    	@foreach($bills as $bill)
                    	<tr>
                    		<td><a href="{{url('admin/bill/details/'.$bill->id)}}" title="View details">{{$bill->id}}</a></td>
                    		<td>{{$bill->name}}</td>
                    		<td>{{$bill->phone}}</td>
                    		<td>{{$bill->address}}</td>
                    		<td>{{date('d.m.Y H:i:s', strtotime($bill->created_at))}}</td>
                            <td>{{$bill->total}}</td>
                            <td>{{$bill->payment}}</td>  
                            <td>{{$bill->note}}</td>
                            <td>@if($bill->deleted_at != "")
                                    <span style="color:red">cancelled</span>
                                @elseif($bill->status ==1)
                                    <span style="color:green">delivered</span>
                                @else
                                    <span style="color:blue">undelivered</span>
                                @endif
                             </td>  
                            <td>
                                @if($bill->status == 1) 
                                <i class="glyphicon glyphicon-ok" style="color:green; margin-left:25px;"></i>
                            @elseif ($bill->deleted_at != "")
                               <i class="glyphicon glyphicon-remove" style="color:red; margin-left:25px;"></i>
                            @else
                                <a href="{{url('admin/bill/process/'.$bill->id)}}" class="btn btn-danger"><i class="fa fa-trash-o" style="color:white;"></i> &nbsp;Process</a>
                              @endif</td>
                            <td> <a href="{{url('admin/bill/export/pdf/'.$bill->id)}}" class="btn btn-primary"> Export</a> </td> 
                    	</tr>
                    	@endforeach
                     
                    </tbody>
                    <tfoot>
                    </tfoot>

                </table>
    <h4>Have : <span style="color:#3c8dbc"> {{$bills->total()}}</span> order</h4>
    @if(isset($billsDelivered) && isset($billsUndelivered) && isset($billsCancelled)) 
    <i class="fa fa-arrow-circle-right"></i> <span style="color:#fe4c50">{{$billsDelivered}}</span> : Delivered &nbsp;
    <i class="fa fa-arrow-circle-right"></i> <span style="color:#fe4c50">{{$billsUndelivered}}</span> : Undelivered &nbsp;
    <i class="fa fa-arrow-circle-right"></i> <span style="color:#fe4c50">{{$billsCancelled}}</span> :   
    Cancelled
    @endif