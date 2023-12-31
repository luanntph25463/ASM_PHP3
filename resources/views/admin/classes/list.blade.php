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
            <form class="form-inline" action="{{ route('classes.search') }}" method="GET">
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
        <th>Tên Lớp</th>
        <th>Ngày Bắt Đầu</th>
        <th>Ngày Kết Thúc</th>
        <th>Số Lượng Học Sinh</th>
        <th>Ca Học</th>
        <th>Trạng Thái</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <form action="{{ route('classes.delete') }}">
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
            @csrf
        @foreach ($classes as $item)
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="{{ $item->id }}">
                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>{{ $item->quantity_member }}</td>
                <td>{{ $item->ca_hoc }}</td>
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
        {!! $classes->links() !!}
    </div>
</table>

</div>
@include('admin.classes.create')
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
                    url: "/admin/classes/add",
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
                            $('.error_start_date').html(response.errors.start_date)
                            $('.error_end_date').html(response.errors.end_date)
                            $('.error_quantity_member').html(response.errors.quantity_member)
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
                url: '/admin/classes/update/' + id,
                type: "GET",
                success: function(response) {
                    $('#name').val(response.data.name)
                    $('#start_date').val(response.data.start_date)
                    $('#end_date').val(response.data.end_date)
                    $('#quantity_member').val(response.data.quantity_member)
                    $('#ca_hoc').val(response.data.id_category)
                    $('#status').val(response.data.status)
                }
            })

            $('#form-crud').submit(function(e) {
                e.preventDefault()

                $.ajax({
                    url: "/admin/classes/update/" + id,
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
                            $('.error_start_date').html(response.errors.start_date)
                            $('.error_end_date').html(response.errors.end_date)
                            $('.error_quantity_member').html(response.errors.quantity_member)
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
