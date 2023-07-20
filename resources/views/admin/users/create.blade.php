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
                        <label style="font-weight: bold">Name</label>
                        <input type="text" name="name" id="name" placeholder="name" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_name"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Image</label>
                        <input type="hidden" name="image_hidden" id="hidden_image">
                        <input type="file" name="image" id="image" placeholder="image" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_image"></span>

                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">password</label>
                        <input type="text" name="password" id="password" placeholder="password" class="form-control">
                        <span style="color: red; font-weight: bold" class="err_password"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Địa Chỉ</label>
                        <input type="text" name="address" id="address" placeholder="address" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_address"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Email</label>
                        <input type="text" name="email" id="email" placeholder="email" class="form-control">
                        <span style="color: red; font-weight: bold" class="err_email"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="phone" class="form-control">
                        <span style="color: red; font-weight: bold" class="error_phone"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Quyền</label>
                        <select class="form-select" name="role" id="">
                            <option value="1">Nhân Viên</option>
                            <option value="2">users</option>
                            <option value="3">Quản Trị Viên</option>
                        </select>
                        <span style="color: red; font-weight: bold" class="error_email"></span>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold">Trạng Thái</label>
                        <select class="form-select" name="status" id="">
                            <option value="1">MỞ</option>
                            <option value="2">KHóa</option>
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
