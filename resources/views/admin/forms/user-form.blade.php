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
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" id="email" name="email" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" id="password" name="password" class="form-control" >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="col-md-3 control-label">Gender</label>
                        <div class="col-md-6">
                            <select id="gender" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="col-md-3 control-label">Address</label>
                        <div class="col-md-6">
                            <input type="text" id="address" name="address" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">Phone</label>
                        <div class="col-md-6">
                            <input type="text" id="phone" name="phone" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role" class="col-md-3 control-label">Role</label>
                        <div class="col-md-6">
                            <select id="role" name="is_admin">
                                <option value="0">User</option>
                                <option value="1">Mod</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-md-3 control-label">Status</label>
                        <div class="col-md-6">
                            <select id="status" name="status">
                                <option value="Active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
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
