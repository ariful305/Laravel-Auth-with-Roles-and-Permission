@extends('layouts.app')
@section('title', 'User Edit')
@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Edit</h1>
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
        <form method="POST" action="{{ route('admin.user.update',$user->id) }}">
            @method('PUT')
            @csrf
            <div class="form-row">
              <div class="col">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Userame" value="{{ $user->username }}" readonly>
              </div>
              <div class="col">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
              </div>
            </div>
            <div class="form-row mt-3">
              <div class="col">
                 <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}" readonly>
              </div>
              <div class="col">
                 <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" 
                    name="role" required>
                    <option value="">Select role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"
                            {{ in_array($role->name, $userRole) 
                                ? 'selected'
                                : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('role'))
                    <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                @endif
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