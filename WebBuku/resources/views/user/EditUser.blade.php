@extends('layout.sidebar')

@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Form Edit User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="{{route ('index.EditUserAction', $id->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method ('put')
            <div class="card-body">
                <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="NamaUser" class="form-control" placeholder="Type Nama User" value="{{$id->name}}">
                </div>
                <div class="form-group">
                <label>Email</label>
                <input type="Email" name="Email" class="form-control" placeholder="Type Email" value="{{$id->email}}">
                </div>
                <label>Password</label>
                <input type="password" name="Password" class="form-control" placeholder="Type Password" value="{{$id->password}}">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
        <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('js')
<!-- jquery-validation -->
<script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>

<script>
$(function() {
    $.validator.setDefaults({
    submitHandler: function() {
        $("#quickForm").submit();
        alert("Form successful submitted!");
    }
    });
    $('#quickForm').validate({
    rules: {
        NamaCategory: {
        required: true,
        },
        Description: {
        required: true,
        },
    },
    messages: {
        email: {
        required: "Please enter category",
        },
        password: {
        required: "Please provide a description",
        },
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
    });
});
</script>
@endsection