@extends('admin.layouts.layouts')
@section('content')
  <!-- Right navbar links -->
  <nav class="main-header navbar ">
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline" action="{{ route('users.search') }}" method="GET">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
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

<table class="table table-dark m-2">
    <thead>
        <th></th>
        <th>ID</th>
        <th>Tên</th>
        <th>Ảnh Người Dùng</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Địa Chỉ</th>
        <th>Quyền</th>
        <th>Trạng Thái</th>
        <th colspan="1">Action</th>
    </thead>
    <tbody>
        <form action="{{ route('users.delete') }}">
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
            @csrf
        @foreach ($users as $item)
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="{{ $item->id }}">

                </td>

                <td>{{ $item->id }}</td>
                <td>{{ $item->name	 }}</td>
                <td><img width="50" src="{{ $item->image }}" alt="">
                    </td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->password }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->address }}</td>
                <td>
                    @if($item->status == 1)
                     Nhân Viên
                     @elseif($item->status == 2)
                    Người Dùng
                     @endif
                     </td>
                <td>
                    @if($item->status == 1)
                     Mở
                     @elseif($item->status == 2)
                    Khóa
                     @endif
                     </td>
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
        {!! $users->links() !!}
    </div>
</table>

</div>
@include('admin.users.create')
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
