@extends('layouts.app')
@section('title', 'User Create')
@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">New User Create</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
<div class="card">

    <div class="card-body">
        <form method="POST" action="{{ route('admin.user.store')}}">
            @csrf
            <div class="form-row">
              <div class="col">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Userame" value="{{ old('username') }}" >
              </div>
              <div class="col">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name')  }}">
              </div>
            </div>
            <div class="form-row mt-3">
              <div class="col">
                 <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email')  }}" >
              </div>
              <div class="col">
                 <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
            </div>
            <div class="form-row mt-3">
              <div class="col">
                    <label for="inputState">Role</label>
                    <select id="inputState" class="form-control" name="role">
                     @foreach ($role as $item)
                         <option value="{{ $item->id }}" >{{ $item->name }}</option>
                     @endforeach
                    </select>
                 
              </div>
              <div class="col">
                
              </div>
            </div>
            <button type="submit" class="btn btn-primary float-right mt-3">Update</button>

        </form>
      
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