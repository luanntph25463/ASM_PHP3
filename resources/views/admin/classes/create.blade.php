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
                        <label style="font-weight: bold">Số Lượng Học Sinh</label>
                        <input type="text" name="quantity_member" id="quantity_member" placeholder="quantity_member" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_quantity_member"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Ca Học</label>
                        <select class="form-select" name="ca_hoc" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <span style="color: red; font-weight: bold" class="error_email"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Trang Thái</label>
                        <select class="form-select" name="status" id="">
                            <option value="1">Mở </option>
                            <option value="2">Đóng</option>
                        </select>
                        <span style="color: red; font-weight: bold" class="error_status"></span>
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
