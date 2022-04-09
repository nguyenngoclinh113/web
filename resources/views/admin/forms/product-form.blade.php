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
                        <label for="category_id" class="col-md-3 control-label">Category</label>
                        <div class="col-md-6">
                            <select id="category_id" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-md-3 control-label">Description</label>
                        <div class="col-md-6">
                            <textarea rows="4" cols="50" type="text" id="description" name="description" class="form-control"  required>
                            </textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit_price" class="col-md-3 control-label">Price</label>
                        <div class="col-md-6">
                            <input type="unit_price" id="unit_price" name="unit_price" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="promotion_price" class="col-md-3 control-label">Price promo</label>
                        <div class="col-md-6">
                            <input type="promotion_price" id="promotion_price" name="promotion_price" class="form-control"  required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-md-3 control-label">Image</label>
                        <div class="col-md-6">
                            <input type="file" id="image" name="image" class="form-control">
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
