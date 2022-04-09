@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Product list
                        <a onclick="addForm()" class="btn btn-primary pull-right">Add Product</a>
                    </h4>
                </div>
            </div>

            <div class="panel-body">
                <table id="contact-table" class="table table-striped">
                    <thead>
                    <tr>
                        <th width="30">No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Promotion price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th width="30">No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Promotion price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @include('admin.forms.product-form')
@endsection

@section('script')
    <script type="text/javascript">
        var table = $('#contact-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.product') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'productname', name: 'productname'},
                {data: 'categoryname', name: 'categoryname'},
                {data: 'description', name: 'description'},
                {data: 'unitprice', name: 'price'},
                {data: 'promotionprice', name: 'promotionPrice'},
                {data: 'image', name: 'image'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
                console.log(this.api());
                this.api().columns().every(function (index) {
                    var column = this;
                    var select = $('<select id="'+ index +'"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });

                var columnHideIndex = [0,3,4,5,6,7];
                $.each(columnHideIndex, function (index, value) {
                    $('select#'+ value).css('display', 'none');
                })
            },
        });



        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Add product');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{ url('admin/product/update') }}" + '/' + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit product');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#description').val(data.description);
                    $('#category_id').val(data.category_id);
                    $('#unit_price').val(data.unit_price);
                    $('#promotion_price').val(data.promotion_price);
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
                    url : "{{ url('admin/product/delete') }}" + '/' + id ,
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
                    if (save_method == 'add') url = "{{ url('admin/product/create') }}";
                    else url = "{{ url('admin/product/update') }}" + "/" + id;
                    $.ajax({
                        url : url,
                        type : "POST",
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