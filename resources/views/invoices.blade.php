
    <!-- Button to Open the Modal -->

<table class="" width='100%' class="table table-dark m-2">
    <thead>
        <th width='10%'>ID</th>
        <th width='10%'>Name</th>
        <th width='10%'>mã Người Dùng</th>
        <th width='10%'>Mã Khóa Học</th>
        <th width='10%'>Số Lượng</th>
        <th width='10%'>Tổng Số Tiền</th>
        <th width='10%'>Ngày Đặt</th>
        <th width='10%'>Trạng Thái</th>
    </thead>
    <tbody>
            <tr>
                <td width='10%'>{{ $item->id }}</td>
                <td width='10%'>{{ $item->name	 }}</td>
                <td width='10%'>{{ $item->id_user }}</td>
                <td width='10%'>{{ $item->id_course }}</td>
                <td width='10%'>{{ $item->quantity }}</td>
                <td width='10%'>{{ $item->total_amount }}</td>
                <td width='10%'>{{ $item->order_date }}</td>
                <td width='10%'>
                    @if($item->status == 1)
                     Mở
                     @elseif($item->status == 2)
                    Khóa
                     @endif
                     </td>
            </tr>
    </tbody>
</table>
