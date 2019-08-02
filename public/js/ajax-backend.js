$(document).ready(function() {

    $('#user_table').DataTable({ //initliaze datatable plugin

        processing: true,
        processing: true,
        ajax: {
            url: 'api/getStudents',
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
                    return "<img src=/images/" + data +
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
                        '<h3><span class="text-primary mr-45 fa fa-edit mt-1 edit" id="' + data + '" > </span> <span></span>' +
                        '<span id="' + data + '" class="text-danger delete ml-15"><i class="fa fa-trash"><i></span></h3>' +
                        '</div>';
                }
            },

        ]

    });
    //form modal working
    $('#create_record').click(function() {
        $('#sample_form')[0].reset();
        $('#store_image').html('');
        $('#form_result').html('');
        $('#title').text('ADD NEW RECORD');
        $('#add').val('Add');
        $('#method_spoof').val('');
        $('#formModal').modal('show');

    });

    //.....on modal form submir execute this
    $('#sample_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#add').val() == 'Add') {


            $.ajax({
                url: 'api/addStudents',
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
        $('#title').text('UPDATE RECORD');
        $('#add').val('Edit');
        $('#formModal').modal('show');
        var id = $(this).attr('id');

        var url = 'api/editStudent/id/edit';
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
                $('#store_image').html("<img src=/images/" + data.image + " width='70' height='70' class='img-thumbnail'>");
               

            }
        })

    });

    $('#sample_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#add').val() == 'Edit') {
            var id = $("#hidden_id").val();
            $('#method_spoof').val('PUT');
            console.log(id);
            var url = 'api/updateStudent/id';
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

    $(document).on('click', '.delete', function() {
        $('#delete_modal').modal('show');
        var id = $(this).attr('id');
        var url = 'api/deleteStudent/id';
        url = url.replace('id', id);
        $('#delete_button').click(function() {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    '_method': 'DELETE'
                },
                beforeSend: function() {
                    $('#delete_button').text('Deleting...');
                },
                success: function(data) {
                    setTimeout(function() {
                        $('#delete_modal').modal('hide');
                        $('#user_table').DataTable().ajax.reload();
                    }, 2000);
                   
                }
            });


        });
        $('#delete_button').text('Delete');
    });

});