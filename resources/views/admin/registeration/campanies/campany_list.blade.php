@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Campanies</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">DashBoard</a></li>
                        <li class="breadcrumb-item active">Registrations</li>
                        <li class="breadcrumb-item active">Campanies</li>
                        <li class="breadcrumb-item active">Campany list</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row" style="margin-left: 20px">
        <div class="col-sm-3">
            <input type="text" id="search" placeholder="Search Campany..." value="" class="form-control">
        </div>

        <div class="col-sm-1">
            <input type="button" id="searchBtn" class="btn btn-primary" value="Search">
        </div>
    </div>

    <div class="row m-20">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Campany List({{ $Campanies->total() }})</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-bordered table-extra">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Campanies as $Campany)
                                @php
                                    $iteration = ($Campanies->currentPage() - 1) * $Campanies->perPage() + $loop->index + 1;
                                @endphp
                                <tr>
                                    <td align="center">{{ $iteration }}</td>
                                    <td align="center">{{ $Campany->name }}</td>
                                    <td align="center">{{ $Campany->email }}</td>
                                    <td align="center">{{ $Campany->mobile }}</td>
                                    <td align="center">
                                        <div class="row">
                                            <div class="col-sm-4" align="right">
                                                <a class="btn btn-sm btn-warning" style="color: white;" onclick="CampanyEdit('{{ $Campany->id }}','{{ $Campany->name }}','{{ $Campany->email }}','{{ $Campany->mobile }}')">
                                                    <i class="fa fa-edit" style="font-size:16px"></i> <b>Edit</b>
                                                </a>
                                            </div>
                                            <div class="col-sm-4" align="center">
                                                <!-- Add your change password button/link here -->
                                                <a class="btn btn-sm btn-primary" style="color: white;" onclick="CampanyChangepwd('{{ $Campany->id }}')">
                                                    <i class="fa fa-key" style="font-size:16px"></i> <b>Change Password</b>
                                                </a>
                                            </div>
                                            <div class="col-sm-4" align="left">
                                                <form action="" method="POST" role="form" id="delform1">
                                                    <input type="hidden" name="">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="CampanyDelete('{{ $Campany->id }}')">
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
                    {{ $Campanies->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- Add new Banner link -->
    <a onclick="CmpnyAdd()">
        <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
    </a>
    </div>
    {{-- modal-Campany-add --}}
    <div class="modal fade" id="campany-add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title" id="bannerHeading">Add New Campany</h4>
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
                                <label for="name" class="col-sm-3 col-form-label text-right">Campany Name*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Campany Name" id="cname"
                                        type="text">
                                    <span class="cnameerror" style="color:red;font-size:16px"></span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Email Address*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Email Address" id="cemail"
                                        type="cemail">
                                    <span class="cemailerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Contact Number*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Contact Number" id="ccontact"
                                        type="tel">
                                    <span class="ccontacterror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Password*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Password" id="cpassword"
                                        type="password">

                                    <span class="cpassworderror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Confirm
                                    Password*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Confirm Password"
                                        id="cconfirmPassword" type="password">
                                    <span class="cconfirmpassworderror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary offset-sm-2" type="button" value="Save"
                            onclick="CampanySave()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal-Campany-add-end --}}
    {{-- modal-Campany-edit --}}
    <div class="modal fade" id="campany-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title" id="bannerHeading">Edit Campany</h4>
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
                                <label for="name" class="col-sm-3 col-form-label text-right">Campany Name*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Campany Name" id="cname1"
                                        type="text">
                                    <span class="cnameerror1" style="color:red;font-size:16px"></span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Email Address*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Email Address" id="cemail1"
                                        type="cemail">
                                    <span class="cemailerror1" style="color:red;font-size:16px"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Contact Number*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Contact Number" id="ccontact1" type="tel">
                                    <input type="hidden" id="cid">
                                    <span class="ccontacterror1" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary offset-sm-2" type="button" value="Update" onclick="CampanyUpdate()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal-Campany-edit-end --}}
    {{-- modal-Campany-changepwd --}}
    <div class="modal fade" id="campany-changepwd">
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
                                    <input class="form-control" placeholder="Enter Confirm Password" id="cpwd" type="password">
                                    <input type="hidden" id="cid">
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
    {{-- modal-Campany-changepwd-end --}}
@endsection
@include('admin.layouts.js.campany_js')
