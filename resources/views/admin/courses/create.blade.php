<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <form id="form-crud" method="post">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label style="font-weight: bold">Name</label>
                        <input type="text" name="name" id="name" placeholder="name" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_name"></span>
                    </div>

         <div class="form-group">
                        <label style="font-weight: bold">Description</label>
                        <input type="text" name="description" id="description" placeholder="description" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_desc"></span>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <div class="col-md-9 col-sm-8">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <img name="mat_truoc_preview" id="mat_truoc_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label style="font-weight: bold">Image</label>
                        <input type="hidden" name="hidden_image" id="hidden_image">
                        <input type="file" name="image" accept="image/*"
                        class="form-control @error('image') is-invalid @enderror" id="cmt_truoc">
                 <label for="cmt_truoc">Mặt trước</label><br/>
                 <span style="color: red; font-weight: bold" class="error_image"></span>
                 </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Giá</label>
                        <input type="text" name="price" id="price" placeholder="price" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_price"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Danh Mục</label>
                        <select class="form-select" name="id_category" id="">
                            @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <span style="color: red; font-weight: bold" class="error_email"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Lớp</label>
                        <select class="form-select" name="id_class" id="">
                            @foreach ($classes as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <span style="color: red; font-weight: bold" class="error_email"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Trạng Thái</label>
                        <select class="form-select" name="status" id="">
                            <option value="1">Mở</option>
                            <option value="2">Khóa</option>
                        </select>
                        <span style="color: red; font-weight: bold" class="error_email"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Mã Giảm Giá</label>
                        <select class="form-select" name="id_promotions" id="">
                            @foreach ($promotions as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <span style="color: red; font-weight: bold" class="error_email"></span>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
