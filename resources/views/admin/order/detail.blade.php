@extends('admin.layouts.layouts')
@section('content')
<nav class="main-header navbar ">
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline" action="{{ route('order.search') }}" method="GET">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar input-control" name="search" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
      </ul>
</nav>
<select id="my-select">
    <option value="asc">Sắp Xếp Lớn Đến Bé</option>
    <option value="desc">Sắp Xếp Bé Đến Lớn</option>
</select>
<div class="col-md-12">
    <!-- Button to Open the Modal -->
<button type="button" id="create" class="btn btn-primary px-5 py-2 m-3" data-toggle="modal" data-target="#myModal">
    Create
</button>

<table class="table table-dark m-2">
    <thead>
        <th>ID</th>
        <th>Tên Khóa Học</th>
        <th>Giá</th>
        <th>ngày bắt đầu</th>
        <th>ngày kết thúc</th>
        <th>Tên Giáo Viên</th>
        <th>Tên Lớp</th>
        <th>Sĩ Số</th>
        <th>Ca Học</th>
    </thead>
    <tbody>
        <form action="{{ route('order.delete') }}">
            <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
            @csrf
        @foreach ($order as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>{{ $item->tenGiaoVien }}</td>
                <td>{{ $item->tenLop }}</td>
                <td>{{ $item->SiSo }}</td>
                <td>{{ $item->ca_hoc }}</td>
            </tr>
        @endforeach
    </form>
    </tbody>
</table>

</div>
{{-- @include('admin.order.create') --}}
@endsection
@section('script')
<script>
    $(document).ready(function() {

        //create
        $('#create').click(function() {
            $('.modal-title').text('Create Courses')

            $('#form-crud').submit(function(e) {
                e.preventDefault()
                $.ajax({
                    url: "/admin/order/add",
                    type: "POST",
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.code == 0) {
                            $('.error_orderdate').html(response.errors.order_date)
                            $('.error_total_amount').html(response.errors.total_amount)
                        } else if (response.code == 1) {
                        console.log(response);
                            $('.modal').hide()
                            location.reload()
                            alert('create user successfullly !')
                        }
                    }
                })
            })
        })


        //upddate
        $(document).on('click', '#edit', function() {
            $('.modal-title').text('Update User')
            var id = $(this).attr('data')
            console.log(id)
            $.ajax({
                url: '/admin/order/update/' + id,
                type: "GET",
                success: function(response) {
                    $('#id_courses').val(response.data.course)
                    $('#order_date').val(response.data.order_date)
                    $('#status').val(response.data.status)
                    $('#total_amount').val(response.data.total_amount)
                }
            })

            $('#form-crud').submit(function(e) {
                e.preventDefault()

                $.ajax({
                    url: "/admin/order/update/" + id,
                    type: "POST",
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.code == 0) {
                            $('.error_orderdate').html(response.errors.order_date)

                            $('.error_total_amount').html(response.errors.total_amount)
                        } else if (response.code == 1) {
                            $('.modal').hide()
                            location.reload()
                            alert('update user successfullly !')
                        }
                    }
                })
            })
        })

        $(document).on('click', '#delete', function() {
            var id = $(this).attr('data')
            $.ajax({
                url: '/delete/' + id,
                type: "get",
                success: function(response) {
                    location.reload()
                    alert('delete user successfullly !')
                }
            })

        })
    })
</script>
@endsection
