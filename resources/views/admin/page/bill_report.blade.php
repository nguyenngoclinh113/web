@extends('admin.layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="panel-body">
            	<i class="fa fa-check-square" style="color:#3c8dbc"></i><span style="font-size: 20px;"> Report Order</span> / 
                <span style="color:#3c8dbc;">
                    @if(isset($date))
                        {{date('d.m.Y', strtotime($date))}} 
                    @else
                        Today
                    @endif
                </span><br><br>

                <div class="col-md-12">
                    <div class="col-md-6">
                    <form action="{{url('admin/bill/report/search')}}" method="get">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <label>Choose Date:</label> <input type="date" class="date" name="date" value="{{isset($date) ? $date :''}}">
                            <label>Status</label>
                            <select name="status">
                                <option></option>
                                <option value="1">delivered</option>
                                <option value="0">undelivered</option>
                                <option value="delete">cancelled</option>
                            </select>
                        <input type="submit" class="btn btn-primary" value="Search">
                    </form>
                    </div>
                    <div class="col-md-6">
                    <label>Name:</label><input type="text" name="name" id="name-order">
                    </div>
                </div>
               <br><br>
               <div class="result-table-report-bill">
                    @include('admin.page.table_bill_report')
                
                    
                </div>
            </div>
            
        </div>
    </div>

@endsection
@section('script')
<script>
    $(document).ready(function($) {
        $("#name-order").keyup(function() {
            var key = $(this).val();
            var date =$(this).parent().parent().find("input[name='date']").val();
            console.log(date);
            console.log(key);
                $.ajax({
                type: 'get',
                dataType: 'html', 
                url: '<?php echo url('admin/bill/report/search/ajax/name');?>',
                data: "name=" + key + "& date=" +date,
                success: function (data) {
                    $(".result-table-report-bill").html(data);
                },
                });
        });

    });
</script>
@endsection