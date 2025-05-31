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
            <h3 class="card-title">Form User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="{{route ('index.AddUserAction') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="NamaUser" class="form-control" placeholder="Type nama user">
                </div>
                <div class="form-group">
                <label>Email</label>
                <input type="Email" name="Email" class="form-control" placeholder="Type email">
                </div>
                <div class="form-group">
                <label>Password</label>
                <input type="Password" name="Password" class="form-control" placeholder="Type password">
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
        NamaUser: {
        required: true,
        },
        Email: {
        required: true,
        },
        Password: {
        required: true,
        },
    },
    messages: {
        NamaUser: {
        required: "Please enter user",
        },
        Email: {
        required: "Please enter user",
        },
        Password: {
        required: "Please enter password",
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