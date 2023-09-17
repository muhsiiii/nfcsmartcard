@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Change Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                        <li class="breadcrumb-item active">
                            <a href="https://thalirnaturalsolutions.com/admin/products">Settings</a>
                        </li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row m-10">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <!-- form start -->
                <form action="">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label text-right">Old Password:</label>
                            <div class="col-sm-6">
                                <input type="password" id="oldpwd" class="form-control" placeholder="Enter Old Password">
                                <div class="fnameerror" style="color:red;font-size:15px"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label text-right">New Password:</label>
                            <div class="col-sm-6">
                                <input type="password" id="newpwd" class="form-control" placeholder="Enter New Password">
                                <div class="lnameerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label text-right">Confirm Pasword:</label>
                            <div class="col-sm-6">
                                <input type="password" id="cpwd" class="form-control" placeholder="Enter Confirm Pasword">
                                <div class="emailerror" style="color:red;font-size:16px"></div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" onclick="ChangePWdSave()"> Save </button>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    </div>

@endsection
@include('admin.layouts.js.user_js')
