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
                <div class="modal-body">
                    <div class="form-group">
                        <label style="font-weight: bold">Số Lượng</label>
                        <input type="text" name="quantity" id="quantity" placeholder="quantity" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_quantity"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Tổng Số Tiền</label>
                        <input type="text" name="total_amount" id="total_amount" placeholder="total_amount" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_total_amount"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Ngày Đặt</label>
                        <input type="date" name="order_date" id="order_date" placeholder="order_date" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_orderdate"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Khóa Học</label>
                        <select class="form-select" name="id_courses" id="">
                            @foreach ($courses as $item)
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

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
