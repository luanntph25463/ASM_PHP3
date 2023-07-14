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
            <form class="form-inline" action="{{ route('courses.search') }}" method="GET">
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
<div class="col-md-12">
    <!-- Button to Open the Modal -->
<button type="button" id="create" class="btn btn-primary px-5 py-2 m-3" data-toggle="modal" data-target="#myModal">
    <i class="fa-sharp fa-solid fa-plus"></i>
    Create
</button>
<a class="btn btn-success" href="{{ route('courses.excel') }}" >
    <i class="fa-sharp fa-solid fa-file-excel"></i>
    Tải Xuống Định Dạng Excel
</a>

<table class="table table-dark m-2">
    <thead>
        <th></th>
        <th>ID</th>
        <th>Tên Khóa Học</th>
        <th>Ảnh</th>
        <th>Mô tả Khoá Học</th>
        <th>Giá</th>
        <th>id_danh Mục</th>
        <th>id_Khuyến Mãi</th>
        <th>Trạng Thái</th>
        <th>id_Lớp Học</th>
        <th colspan="2">Hành Động</th>
    </thead>
    <tbody>
        <form action="{{ route('courses.delete') }}">

            <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
            @csrf
        @foreach ($courses as $item)
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="{{ $item->id }}">
                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name	 }}</td>
 <td><img width="100" src="{{ $item->image }}" alt=""></td>
                <td>{{ $item->description	 }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->id_category }}</td>
                <td>{{ $item->id_promotions }}</td>
                <td>
                    @if($item->status == 1)
                     Mở
                     @elseif($item->status == 2)
                    Khóa
                     @endif
                     </td>
                <td>{{ $item->id_class }}</td>

                <td>
                    <button type="button" data="{{ $item->id }}" id="edit" class="btn btn-warning"
                        data-toggle="modal" data-target="#myModal">
                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </form>
    </tbody>
    <div class="w-100 m-3">
        {!! $courses->links() !!}
    </div>
</table>

</div>
@include('admin.courses.create')
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            //create
            $('#create').click(function() {
                $('.modal-title').text('Create User')

                $('#form-crud').submit(function(e) {
                    e.preventDefault()

                    $.ajax({
                        url: "/add",
                        type: "POST",
                        data: new FormData(this),
                        cache: false,
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            if (response.code == 0) {
                                $('.error_name').html(response.errors.name)
                                $('.error_email').html(response.errors.email)
                                $('.error_image').html(response.errors.image)
                            } else if (response.code == 1) {
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

                $.ajax({
                    url: '/category/edit/' + id,
                    type: "get",
                    success: function(response) {
                        $('#name').val(response.data.name)
                        $('#description').val(response.data.description)

                    }
                })

                $('#form-crud').submit(function(e) {
                    e.preventDefault()

                    $.ajax({
                        url: "/update/" + id,
                        type: "POST",
                        data: new FormData(this),
                        cache: false,
                        processData: false,
                        dataType: 'json',
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            if (response.code == 0) {
                                $('.error_name').html(response.errors.name)
                                $('.error_email').html(response.errors.email)
                                $('.error_image').html(response.errors.image)
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
