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
                        <label style="font-weight: bold">Image</label>
                        <input type="file" name="image" id="image" placeholder="image" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_email"></span>
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
