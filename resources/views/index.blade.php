@extends('parent')
@section('content')


<div class="table-responsive">
    <h2 style="text-align: center; color:white;">Laravel Crud Operations</h2>
    <div style="float:right;">
        <button type="button" id="create_record" class="btn btn-success btn-sm btn-default px-5 fa fa-plus" style="radius:50%; padding:5px 30px; margin-bottom:10px"></button>
    </div>
    <table class="table table-hover table-dark table-striped " id="user_table" style="background-color:white">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="title" align="center">Add New Record</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin:0px 20px">
                <span id="form_result"></span>
                <form action="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contact</label>
                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department</label>
                        <input type="text" class="form-control" name="department" id="department" placeholder="Department">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Choose Profile Picture</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                        <span id="store_image"></span>
                        <input type='hidden' name='hidden_image' id="hidden_image" class="form-control-file"/>
                    </div>
                    <input type="hidden" class="form-control-file" name="hidden" id="hidden_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" id="add" class="btn btn-primary" value="Add"></button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {

        $('#user_table').DataTable({ //initliaze datatable plugin

            processing: true,
            processing: true,
            ajax: {
                url: "{{url('api/getStudents')}}",
                type: 'GET',
                datatype: 'JSON',
                dataSrc: function(json) {
                    console.log(json);
                    return json;
                }
            },
            columns: [{
                    data: 'id',
                },
                {
                    data: 'image',
                    render: function(data, type, full, meta) {
                        return "<img src={{URL::to('/')}}/images/" + data +
                            " width= '70' class='img-thumbnail'/>";
                    }
                },
                {
                    data: 'name',
                },
                {
                    data: 'phone',
                },
                {
                    data: 'email',
                },
                {
                    data: 'address',
                },
                {
                    data: 'department',
                },
                {
                    data: 'id',
                    render: function(data, type, full, meta) {
                        // var url = '{{ url("/admin/user/edit", "id") }}';
                        // url = url.replace('id', full.id);
                        return '<div class="d-flex">' +
                            '<span class="text-primary mr-45 fa fa-edit mt-1 edit" id="' + data + '" > </span>' +
                            '<a href="JavaScript:Void(0);" id="' + data + '" class="text-danger delete-button ml-15"><i class="fa fa-trash"><i></a>' +
                            '</div>';
                    }
                },

            ]

        });
        //form modal working
        $('#create_record').click(function() {

            $('#formModal').modal('show');
        });

        //.....on modal form submir execute this
        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#add').val() == 'Add') {


                $.ajax({
                    url: '{{url("api/addStudents")}}',
                    method: "POST",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#user_table').DataTable().ajax.reload();

                        }
                        $('#form_result').html(html);
                    }


                })
            }

        });

        //...................edit...................................
        $(document).on('click', '.edit', function() {
            $('#formModal').modal('show');
            var id = $(this).attr('id');

            var url = '{{url("api/editStudent/id/edit")}}';
            url = url.replace('id', id);
            $('#form_result').html('');
            $.ajax({
                url: url,
                dataType: 'json',
                success: function(data) {
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#contact').val(data.phone);
                    $('#address').val(data.address);
                    $('#department').val(data.department);
                    $('#hidden_id').val(data.id);
                    $('#hidden_image').val(data.image);
                    $('#store_image').html("<img src={{URL::to('/')}}/images/" + data.image + " width='70' height='70' class='img-thumbnail'>");
                    $('#title').text('UPDATE RECORD');
                    $('#add').val('Edit');

                }
            })

        });

        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#add').val() == 'Edit') {
                var id = $("#hidden_id").val();
                console.log(id);
                var url = '{{url("api/updateStudent/id")}}';
                url = url.replace('id', id);
                $.ajax({
                    url: url,
                    method: "POST",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#store_image').html('');
                            $('#user_table').DataTable().ajax.reload();

                        }
                        $('#form_result').html(html);
                    }


                })
            }

        });

    });
</script>
@endsection