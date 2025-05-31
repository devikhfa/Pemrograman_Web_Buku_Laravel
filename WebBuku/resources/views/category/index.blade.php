@extends('layout.sidebar') @section('css')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> @endsection @section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Kategori</h3>
        <div class="">
            <a href="{{ route ('index.AddCategory') }}" class="btn btn-primary float-right">Add Category</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>Nama Kategori</td>
                    <td>Deskripsi</td>
                    <td width="10%" class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $c)
                <tr>
                    <td>{{$c->NamaCategory}}</td>
                    <td>{{$c->Description}}</td>
                    <td width="10%" class="text-center">
                        <form id="delete-form-{{ $c->id }}" action="{{route('index.DeleteCategoryAction', $c->id) }}" method="POST" style="display: none;">
                            @csrf 
                            @method('DELETE')
                        </form>
                        <a href="{{route('index.EditCategory', $c->id)}}" class="btn btn-icon btn-success"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-icon btn-danger" type="button" onclick="confirmDelete({{ $c->id }})"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection @section('js')
<!-- DataTables  & Plugins -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
                $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
            function confirmDelete(id) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>
@endsection