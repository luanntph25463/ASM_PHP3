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
            <form class="form-inline" action="{{ route('teachers.search') }}" method="GET">
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
    Create
</button>

<table class="table table-dark m-2">
    <thead>
        <th></th>
        <th>ID</th>
        <th>Tên</th>
        <th>Ảnh</th>
        <th>Email</th>
        <th>Số Điện Thoại</th>
        <th>Địa Chỉ</th>
        <th>Hành Động</th>
    </thead>
    <tbody>
        <form action="{{ route('teachers.delete') }}">
            <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
            @csrf
        @foreach ($teachers as $item)
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="{{ $item->id }}">

                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name	 }}</td>
                <td><img width="50" src="{{ $item->image }}" alt="">
                    </td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->address }}</td>
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
        {!! $teachers->links() !!}
    </div>
</table>

</div>
@include('admin.teachers.create')
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
                    url: "/admin/teachers/add",
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
                            $('.error_address').html(response.errors.address)
                            $('.error_phone').html(response.errors.phone)
                            $('.err_email').html(response.errors.email)
                            $('.error_specialized').html(response.errors.specialized)
                            $('.err_description').html(response.errors.description)
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
                url: '/admin/teachers/update/' + id,
                type: "GET",
                success: function(response) {

                    $('#name').val(response.data.name)
                    $('#address').val(response.data.address)
                    $('#phone').val(response.data.phone)
                    $('#email').val(response.data.email)
                    $('#description').val(response.data.description)
                    $('#specialized').val(response.data.specialized)
                }
            })
            $('#form-crud').submit(function(e) {
                e.preventDefault()

                $.ajax({
                    url: "/admin/teachers/update/" + id,
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
                            $('.error_address').html(response.errors.address)
                            $('.error_phone').html(response.errors.phone)
                            $('.err_email').html(response.errors.email)
                            $('.error_specialized').html(response.errors.specialized)
                            $('.err_description').html(response.errors.description)
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
