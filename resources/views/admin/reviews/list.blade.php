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
            <form class="form-inline" action="{{ route('reviews.search') }}" method="GET">
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
    Create
</button>

<table class="table table-dark m-2">
    <thead>
        <th></th>
        <th>ID</th>
        <th>Mã Khóa Học</th>
        <th>Mã Người Dùng</th>
        <th>Vote</th>
        <th>Tên Người Dùng</th>
        <th>Nội Dung</th>
        <th>Ngày Đánh Giá</th>
        <th>Hành Động</th>
    </thead>
    <tbody>
        <form action="{{ route('reviews.delete') }}">
            <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
            @csrf
        @foreach ($reviews as $item)
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="{{ $item->id }}">
                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->course_id	 }}</td>
                <td>{{ $item->id_user }}</td>
                <td>{{ $item->rating }}</td>
                <td>{{ $item->user_name }}</td>
                <td>{{ $item->content }}</td>
                <td>{{ $item->created_at }}</td>
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
        {!! $reviews->links() !!}
    </div>
</table>

</div>
@include('admin.reviews.create')
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
                    url: "/admin/reviews/add",
                    type: "POST",
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.code == 0) {
                            $('.error_content').html(response.errors.content)
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
            console.log(id)
            $.ajax({
                url: '/admin/reviews/update/' + id,
                type: "GET",
                success: function(response) {
                    $('#content').val(response.data.content)
                }
            })
            $('#form-crud').submit(function(e) {
                e.preventDefault()

                $.ajax({
                    url: "/admin/reviews/update/" + id,
                    type: "POST",
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.code == 0) {
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
