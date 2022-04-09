<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">Email</label>
                        <div class="col-md-6">
                            <input type="text" id="email" name="email" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date_order" class="col-md-3 control-label">Address</label>
                        <div class="col-md-6">
                            <input type="text" id="address" name="address" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="total" class="col-md-3 control-label">Message</label>
                        <div class="col-md-6">
                            <input type="text" id="message" name="message" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

