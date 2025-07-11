@extends('layout.sidebar') @section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> @endsection @section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Buku</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{route ('index.EditBukuAction', $Buku[0]->id) }}" method="post" enctype="multipart/form-data">
                        @csrf @method ('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="IdCategory">
                                    @foreach($category as $c)
                                        <option value="{{ $c->id }}" {{ $c->id == $Buku[0]->IdCategory ? 'selected' : '' }}>
                                            {{ $c->NamaCategory }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="Judul" class="form-control" placeholder="Type Judul" value="{{$Buku[0]->Judul}}">
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" name="Penerbit" class="form-control" placeholder="Type Penerbit" value="{{$Buku[0]->Penerbit}}">
                            </div>
                            <div class="form-group">
                                <label>Tahun Penerbit</label>
                                <input type="date" name="TahunTerbit" class="form-control" placeholder="Type TahunTerbit" value="{{$Buku[0]->TahunTerbit}}">
                            </div>
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input type="text" name="Pengarang" class="form-control" placeholder="Type Pengarang" value="{{$Buku[0]->Pengarang}}">
                            </div>
                            <div class="form-group">
                                <label>Sampul</label>
                                <input type="file" name="Sampul" class="form-control" placeholder="Type Sampul" value="{{$Buku[0]->Sampul}}">
                                {{-- @if(!empty($Buku[0]->Sampul))
                                <img src="{{url('sampul')}}/{{$Buku[0]->Sampul}}" alt=""class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                @endif --}}
                                @if(isset($Buku[0]->Sampul) && !empty($Buku[0]->Sampul))
                                    <img src="{{ url('sampul/' . $Buku[0]->Sampul) }}" alt="Foto Produk" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                @else
                                    <img src="{{ url('sampul/nophoto.jpg') }}" alt="No Foto" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                @endif
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
    </div>
    <!-- /.container-fluid -->
</section>
@endsection @section('js')
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- jquery-validation -->
<script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $(function() {
        $.validator.setDefaults({
        submitHandler: function() {
            $("#quickForm").submit();
            alert("Form successful submitted!");
        }
        });
        $('#quickForm').validate({
        rules: {
            IdCategory: {
            required: true,
            },
            Judul: {
            required: true,
            },
             Penerbit: {
            required: true,
            },
             TahunTerbit: {
            required: true,
            },
             Pengarang: {
            required: true,
            },
        },
        messages: {
            IdCategory: {
            required: "Please enter IdCategory",
            },
            Judul: {
            required: "Please enter a Judul",
            },
            Penerbit: {
            required: "Please enter a Penerbit",
            },
            TahunTerbit: {
            required: "Please enter a TahunTerbit",
            },
            Pengarang: {
            required: "Please enter a Pengarang",
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