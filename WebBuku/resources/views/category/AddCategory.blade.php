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
            <h3 class="card-title">Form Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="{{route ('index.AddCategoryAction') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="form-group">
                <label>Nama Category</label>
                <input type="text" name="NamaCategory" class="form-control" placeholder="Type category name">
                </div>
                <div class="form-group">
                <label>Description</label>
                <input type="text" name="Description" class="form-control" placeholder="Type description">
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