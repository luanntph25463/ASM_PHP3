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
                        <label style="font-weight: bold">Tên</label>
                        <input type="text" name="name" id="name" placeholder="name" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_name"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Ngày Bắt Đầu</label>
                        <input type="date" name="start_date" id="start_date" placeholder="start_date" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_start_date"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Ngày Kết Thúc</label>
                        <input type="date" name="end_date" id="end_date" placeholder="end_date" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_end_date"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Giảm Giá</label>
                        <input type="text" name="discount" id="discount" placeholder="discount" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_discount"></span>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: bold">Trang Thái</label>
                        <select class="form-select" name="status" id="">
                            <option value="1">Mở </option>
                            <option value="2">Đóng</option>
                        </select>
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
