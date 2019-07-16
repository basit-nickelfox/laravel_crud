@extends('parent')
@section('content')


<div class="table-responsive" >
    <h2 style="text-align: center; color:white;">Laravel Crud Operations</h2>
    <table class="table table-hover table-dark table-striped" id="user_table" style="background-color:white">
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
<script type="text/javascript">
  
    $(document).ready(function() {

        $('#user_table').DataTable({ //initliaze datatable plugin

            processing: true,
            processing: true,
            ajax: {
                url: "{{url('api/getUsers')}}",
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
                        return "<img src={{URL::to('/')}}/images/" + 'profile.png' +
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
                        var url = '{{ url("/admin/user/edit", "id") }}';
                        url = url.replace('id', full.id);
                        return '<div class="d-flex">' +
                            '<a href="' + url + '" class="text-primary mr-45 fa fa-edit mt-1 "></a>' + '<span>   </span>'+
                            '<a href="JavaScript:Void(0);" id="' +data+ '" class="text-danger delete-button ml-15"><i class="fa fa-trash"><i></a>' +
                            '</div>';
                    }
                },

            ]

        });
        $(document).on("click",'.delete-button',function(){
        //    console.log('hello');
         console.log(this.id);
       });
       
    });
   
</script>
@endsection