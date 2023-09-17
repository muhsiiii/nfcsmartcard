@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">DashBoard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body" style="padding:4px 20px;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1"
                                        style="    height: 50px;">
                                        Total Users</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                       {{$UsersCount}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-users  fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body" style="padding:4px 20px;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-success text-uppercase mb-1"
                                        style="    height: 50px;">
                                        Total Campanies</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        {{ $CampanyCount }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-user  fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body" style="padding:4px 20px;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-warning text-uppercase mb-1"
                                        style="    height: 50px;">
                                        Total Products</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        15
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-boxes  fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body" style="padding:4px 20px;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-md font-weight-bold text-info text-uppercase mb-1"
                                        style="    height: 50px;">
                                        Available Products</div>
                                    <div class="h4 mb-0 font-weight-bold text-gray-800">
                                        14
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-box  fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-widget widget-user-2 shadow-sm">
                                <div class="widget-user-header bg-primary" style="padding: 8px 24px;">
                                    <h5 style="margin: 0px;">Orders</h5>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link text-danger font-weight-bold">
                                                New
                                                <span class="float-right badge bg-danger"
                                                    style="width: 40px; font-size: 15px;">100
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link text-warning font-weight-bold">
                                                Accepted
                                                <span class="float-right badge bg-warning"
                                                    style="width: 40px; font-size: 15px;">
                                                    4
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link text-primary font-weight-bold">
                                                Processing
                                                <span class="float-right badge bg-primary"
                                                    style="width: 40px; font-size: 15px;">
                                                    3
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link text-info font-weight-bold">
                                                Cancelled
                                                <span class="float-right badge bg-info"
                                                    style="width: 40px; font-size: 15px;">
                                                    14
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link text-success font-weight-bold">
                                                Delivered
                                                <span class="float-right badge bg-success"
                                                    style="width: 40px; font-size: 15px;">
                                                    4
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
