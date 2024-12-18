@extends('layouts.app')
@section('title', 'User List')
@section('style')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">') }} ">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <a name="" id="" class="btn btn-primary float-right" href="{{ route('admin.user.create') }}" role="button">Add New</a>

        </div>

        <div class="card-body">
   
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                
        </div>

    </div>
</div>
@endsection
@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js ')}}"></script>
    <script src="{{ asset('/plugins/jszip/jszip.min.js ')}}"></script>
    <script src="{{ asset('/plugins/pdfmake/pdfmake.min.js ')}}"></script>
    <script src="{{ asset('/plugins/pdfmake/vfs_fonts.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.html5.min.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.print.min.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.colVis.min.js ')}}"></script>
    <script>
         $(function() {
            $("#example1").DataTable({
                "bSort": true,
                processing: true,
                serverSide: true,    
                orderable: true, 
                ajax: "{{ route('admin.user.index') }}",      
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'username', name: 'username'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'images', name: 'images'},
                    {data: 'role_id', name: 'role_id'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},      ]
                
            });

        });
    </script>
    @if(session('success'))
        <script>
           Swal.fire(
  'Good job!',
  '{{ session('success') }}',
  'success'
)
        </script>
        
    @endif
@endsection