@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel-body">

                <table id="contact-table" class="table table-striped">

                    <thead>

                    <tr>
                        <th width="30">No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Date order</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>

                    </tfoot>
                </table>
                <form action="{{url('admin/bill/date')}}" method="get">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label>From Date:</label><input type="Date" name="fromdate">
                        <label>To Date:</label><input type="Date" name="todate">
                        <input type="submit" class="btn btn-danger" value="View"> 
                </form>
                
            </div>
        </div>

    </div>

    @include('admin.forms.bill-form')
@endsection

@section('script')
    <script type="text/javascript">
        var table = $('#contact-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.bill') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'phone', name: 'phone'},
                {data: 'address', name: 'address'},
                {data: 'date_order', name: 'date_order'},
                {data: 'total', name: 'total',},
                {data: 'payment', name: 'payment'},
                {data: 'note', name: 'note'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });



        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Add category');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{ url('admin/bill/update') }}" + '/' + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit bill');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#phone').val(data.phone);
                    $('#address').val(data.address);
                    $('#date_order').val(data.date_order);
                    $('#total').val(data.total);
                    $('#payment').val(data.payment);
                    $('#note').val(data.note);
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
        }

        

        function deleteData(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    url : "{{ url('admin/bill/delete') }}" + '/' + id ,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : function(data) {
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function () {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            });
        }

        $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var id = $('#id').val();
                    url = "{{ url('admin/bill/update') }}" + "/" + id;
                    $.ajax({
                        url : url,
                        type : 'POST',
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },

                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
        });


    </script>
@endsection