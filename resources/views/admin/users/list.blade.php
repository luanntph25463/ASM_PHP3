@extends('admin.layouts.layouts')
@section('content')
<div class="col-md-12">
    <!-- Button to Open the Modal -->
<button type="button" id="create" class="btn btn-primary px-5 py-2 m-3" data-toggle="modal" data-target="#myModal">
    Create
</button>

<table class="table table-dark m-2">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name	 }}</td>
                <td><img width="50" src="{{ $item->image }}" alt="">
                    </td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->password }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->role }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <button type="button" data="{{ $item->id }}" id="edit" class="btn btn-warning"
                        data-toggle="modal" data-target="#myModal">
                        Update
                    </button>
                </td>
                <td>
                    <button type="button" data="{{ $item->id }}" id="delete" class="btn btn-danger">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
@include('admin.category_courses.create')
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
