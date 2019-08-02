@extends('parent')

@section('content')



<div class="table-responsive">
    <h2 style="text-align: center; color:white;">Laravel Crud Operations</h2>
    <div style="float:right">
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
                <input type="hidden" name="_method" id="method_spoof" value=''>
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
                        <input type='hidden' name='hidden_image' id="hidden_image" class="form-control-file" />
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

<!-- ...........................................modal for delete................................................... -->
<!-- Modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" align="center">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;color:red;">Are you sure you want to remove this record?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="delete_button" id="delete_button">Delete</button>
            </div>
        </div>
    </div>
</div>



<script  type="text/javascript" src="{{asset('js/ajax-backend.js')}}"></script>


       
@endsection