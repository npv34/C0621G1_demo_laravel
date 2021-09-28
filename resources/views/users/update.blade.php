@extends('layouts.app')
@section('title', 'Chỉnh sửa thông tin người dùng')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chỉnh sửa thông tin người dùng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="" class="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <lable>Tên</lable>
                                    <input type="text" value="{{ $user->name }}" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <lable>Email</lable>
                                    <input type="email" value="{{ $user->email }}" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <lable>Role</lable>
                                    <strong class="text-danger">*</strong>
                                    @foreach($roles as $role)
                                        <div class="form-check">
                                            <input
                                                @if($user->checkRole($role->id))
                                                    checked
                                                @endif
                                                name="role[{{$role->id}}]" class="form-check-input" type="checkbox"
                                                value="{{ $role->id }}" id="role-{{$role->id}}">
                                            <label class="form-check-label" for="role-{{$role->id}}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
