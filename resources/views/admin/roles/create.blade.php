@extends('layouts.app')
@section('title', 'Role Create')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">New Role Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <div class="row">
            <div class="col-xl">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Add new role</h5>
                </div>
                <div class="card-body">                  
                  <form method="POST" action="{{ route('admin.roles.store') }}" >
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Role Name</label>
                      <input 
                         value="{{ old('name') }}" 
                         type="text" 
                         class="form-control" 
                         name="name" 
                         placeholder="Role Name" 
                         required>
                    </div>              
                    <label for="permissions" class="form-label">Assign Permissions</label>
      
                  <table class="table table-striped">
                      <thead>
                          <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                          <th scope="col" width="20%">Name</th>
                          <th scope="col" width="1%">Guard</th> 
                      </thead>
      
                      @foreach($permissions as $permission)
                          <tr>
                              <td>
                                  <input type="checkbox" 
                                  name="permission[{{ $permission->name }}]"
                                  value="{{ $permission->name }}"
                                  class='permission'>
                              </td>
                              <td>{{ $permission->name }}</td>
                              <td>{{ $permission->guard_name }}</td>
                          </tr>
                      @endforeach
                  </table>
                  <br>
                  <button type="submit" class="btn btn-primary">Save Role</button>
                  <a href="{{ route('admin.roles.index') }}" class="btn btn-default">Back</a>
                  </form>
                </div>
              </div>
            </div>
      
          </div> 
     </div> 
    
@endsection
@section('script')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}')
        </script>
    @endforeach
    
@endif
@endsection