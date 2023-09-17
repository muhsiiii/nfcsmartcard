@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">DashBoard</a></li>
                        <li class="breadcrumb-item active">Registrations</li>
                        <li class="breadcrumb-item active">Users</li>
                        <li class="breadcrumb-item active">Users list</li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="row m-20">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-bordered table-extra">
                        <input type="hidden" id="userid" value="{{ $UserID }}">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Profile Type</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                                <tr>
                                    <td align="center">{{ $loop->iteration }}</td>
                                    @if ($profile->profile_type == 1)
                                        <td align="center">User Profile</td>
                                    @else
                                        <td align="center">Business profile</td>
                                    @endif

                                    @if ($profile->profile_type == 1)
                                        <td align="center">{{ $profile->user_name }}</td>
                                    @else
                                        <td align="center">{{ $profile->business_name }}</td>
                                    @endif

                                    <td align="center">
                                        <div class="col-sm-3" align="center">
                                            <!-- Updated code for the create profile button/link -->
                                            <a class="btn btn-sm btn-success" target="_blank" style="color: white;"
                                                href="{{ route('profilepreviw', $profile->id) }}">
                                                <i class="fa fa-eye" style="font-size:16px"></i><b
                                                    style="margin-left: 3px;">Preview</b>
                                            </a>
                                            <a class="btn btn-sm btn-primary" target="" style="color: white;"
                                                href="{{ route('profiledit', ['id' => $profile->id, 'user_id' => $profile->user_id]) }}">
                                                <i class="fa fa-pencil" style="font-size: 16px;"></i><b
                                                    style="margin-left: 3px;">Edit</b>
                                            </a>

                                            <a class="btn btn-sm btn-danger" style="color: white;"
                                                onclick="profileDelete('{{ $profile->id }}')">
                                                <i class="fa fa-trash" style="font-size: 16px;"></i><b
                                                    style="margin-left: 3px;">Delete</b>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix d-flex justify-content-center">
                    {{ $profiles->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- Add new Banner link -->
    <a onclick="ProfileChooseShow()">
        <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
    </a>
    </div>
    {{-- modal-user-add --}}
    {{-- <div class="modal fade" id="modal-add">
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
                                    <input class="form-control" placeholder="Enter Last Name" id="lname" type="text">
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
                                <label for="name" class="col-sm-3 col-form-label text-right">Password*:</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Password" id="password" type="password">

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
    </div> --}}
    {{-- modal-user-add-end --}}
    {{-- modal-user-edit --}}
    {{-- <div class="modal fade" id="modal-edit">
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
    </div> --}}
    {{-- modal-user-edit-end --}}
    {{-- modal-changepwd --}}
    {{-- <div class="modal fade" id="modal-changepwd">
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
    </div> --}}
    {{-- modal-changepwd-end --}}
@endsection
@include('admin.layouts.js.user_profile_js')
<script>
    function profileDelete(pid) {
        data = new FormData();
        data.append('pid', pid);
        data.append('_token', '{{ csrf_token() }}');

        Swal.fire({
            title: 'Do You Want To Delete..??',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "/profile-delete",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data['success']) {
                            toastr.success('Deleted successfully', '', {
                                timeOut: 1000,
                            });

                            // Refresh the page after displaying Toastr notification
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000); // Change the delay as needed
                        } else {
                            toastr.error('Something Went Wrong');
                        }
                    }
                });
            }
        });
    }
</script>
