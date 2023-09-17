@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">DashBoard</a></li>
                        <li class="breadcrumb-item active">Registrations</li>
                        <li class="breadcrumb-item active">Users</li>
                        <li class="breadcrumb-item active">Users list</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row" style="margin-left: 20px">
        <div class="col-sm-3">
            <input type="text" id="search" placeholder="Search Users..." value="" class="form-control">
        </div>

        <div class="col-sm-1">
            <input type="button" id="searchBtn" class="btn btn-primary" value="Search">
        </div>
    </div>

    <div class="row m-20">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Users List({{ $UsersCount }})</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-bordered table-extra">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>mobile</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Users as $User)
                                @php
                                    $iteration = ($Users->currentPage() - 1) * $Users->perPage() + $loop->index + 1;
                                @endphp
                                <tr>
                                    <td align="center">{{ $iteration }}</td>
                                    <td align="center">{{ $User->firstname }} {{ $User->lastname }}</td>
                                    <td align="center">{{ $User->email }}</td>
                                    <td align="center">{{ $User->mobile }}</td>
                                    <td align="center">
                                        <div class="row">
                                            <div class="col-sm-3" align="right">
                                                <a class="btn btn-sm btn-warning" style="color: white;"
                                                    onclick="UserEdit('{{ $User->id }}','{{ $User->firstname }}','{{ $User->lastname }}','{{ $User->email }}','{{ $User->mobile }}')">
                                                    <i class="fa fa-edit" style="font-size:16px"></i><b>Edit</b>
                                                </a>
                                            </div>
                                            <div class="col-sm-3" align="center">
                                                <a class="btn btn-sm btn-primary" style="color: white;"
                                                    onclick="ChangePassword('{{ $User->id }}')">
                                                    <i class="fa fa-key" style="font-size:16px"></i><b>Change Password</b>
                                                </a>
                                            </div>
                                            <div class="col-sm-3" align="center">
                                                <!-- Add your create profile button/link here -->
                                                <a class="btn btn-sm btn-success" style="color: white;"
                                                    onclick="redirectToProfile('{{ $User->id }}')">
                                                    <i class="fa fa-user" style="font-size:16px"></i><b>Profile</b>
                                                </a>
                                            </div>
                                            <div class="col-sm-3" align="left">
                                                <form action="" method="POST" role="form" id="delform1">
                                                    <input type="hidden" name="">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="UserDelete('{{ $User->id }}')">
                                                        <i class="fa fa-trash" style="font-size:16px"
                                                            aria-hidden="true"></i>
                                                        <b>Delete</b>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix d-flex justify-content-center">
                    {{ $Users->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- Add new Banner link -->
    <a onclick="UserModalShow()">
        <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
    </a>
    </div>
    {{-- modal-user-add --}}
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title" id="bannerHeading">Add New User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group row">
                                <form>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">First Name*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter First Name" id="fname"
                                        type="text">
                                    <span class="fnameerror" style="color:red;font-size:16px"></span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Last Name*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Last Name" id="lname"
                                        type="text">
                                    <span class="lnameerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Email Address*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Email Address" id="email"
                                        type="email">
                                    <span class="emailerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Mobile Number*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Mobile Number" id="mobile"
                                        type="tel">
                                    <span class="mobileerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Password*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Password" id="password"
                                        type="password">

                                    <span class="passworderror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Confirm
                                    Password*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Confirm Password" id="confirmPassword"
                                        type="password">
                                    <span class="confirmPassworderror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary offset-sm-2" type="button" value="Save" onclick="UserSave()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal-user-add-end --}}
    {{-- modal-user-edit --}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title" id="bannerHeading">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group row">
                                <form>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">First Name*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter First Name" id="fname1"
                                        type="text">
                                    <input type="hidden" id="userid">
                                    <span class="fname1error" style="color:red;font-size:16px"></span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Last Name*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Last Name" id="lname1"
                                        type="text">
                                    <span class="lname1error" style="color:red;font-size:16px"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Email Address*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Email Address" id="email1"
                                        type="email">
                                    <span class="email1error" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Mobile Number*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Mobile Number" id="mobile1"
                                        type="tel">
                                    <span class="mobile1error" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary offset-sm-2" type="button" value="Update" onclick="UserUpdate()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal-user-edit-end --}}
    {{-- modal-changepwd --}}
    <div class="modal fade" id="modal-changepwd">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title" id="bannerHeading">Change Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group row">
                                <form>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">New Password*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter New Password" id="newpwd"
                                        type="password">
                                    <span class="newpwderror" style="color:red;font-size:16px"></span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Confirm
                                    Password*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Confirm Password" id="cpwd"
                                        type="password">
                                    <span class="cpwderror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="hidden" id="userid">
                        <input class="btn btn-primary offset-sm-2" type="button" value="Update"
                            onclick="UserChangepwd()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal-changepwd-end --}}
@endsection
@include('admin.layouts.js.user_js')
