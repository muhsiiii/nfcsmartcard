@extends('admin.layouts.master')

@section('content')
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>








    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">DashBoard</a></li>
                        <li class="breadcrumb-item active">
                            <a href="">Profile</a>
                        </li>
                        <li class="breadcrumb-item active">Add Profile</li>
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
                    <h3 class="card-title">Add Profile</h3>
                    <input type="hidden" id="userid" value="{{ $UserID }}">
                </div>
                <!-- form start -->

                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="shopid" class="col-sm-3 col-form-label text-right">Profile Type:</label>
                            <div class="col-sm-6">
                                <select class="form-control" style="width: 100%;" id="ptype"
                                    onchange="ChangeProfile(this.value)">
                                    {{-- <option value="" selected disabled>Select</option> --}}
                                    <option value="1" selected> User Profile</option>
                                    <option value="2"> Business Profile</option>
                                </select>
                                <span class="ptypeerror" style="color:red;font-size:16px"></span>

                            </div>
                        </div>
                    </form>



                    {{-- form 1 --}}
                    <form>
                        <div id="form1">
                            <h3 class="d-flex justify-content-center mt-1"
                                style="font-family: 'Arial', sans-serif; font-size: 28px; font-weight: bold; text-align: center; text-transform: uppercase; color: #151449;">
                                user profile
                            </h3>

                            <div class="form-group row">
                                <label for="shopid" class="col-sm-3 col-form-label text-right">theme:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" style="width: 100%;" id="user_theme">
                                        <option value="" selected disabled>Select</option>
                                        <option value="theme1_user"> theme1</option>
                                        <option value="theme2_user"> theme2</option>
                                    </select>
                                    <span class="themeerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image4" class="col-sm-3 col-form-label text-right">Profile Pic :</label>
                                <div class="col-sm-6 col-10">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input class="custom-file-input image" type="file" id="uimageee"
                                                name="image" onchange="profileimage()">

                                            <label class="custom-file-label" for="image4">Choose file</label>
                                        </div>
                                    </div>
                                </div>



                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                    aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel">crop a image</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="img-container">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <img id="image"
                                                                src="https://avatars0.githubusercontent.com/u/3456749">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="preview"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="image_name" id="image_name">



                                <div class="col-sm-1 col-2">
                                    <button type="button" class="btn btn-secondary btn-tooltip float-left"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Product in Aspect Ratio of 4:5 Required. ie Image with Resolution 200 x 250px, 300 x 375px etc.">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <span class="uimageerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Name:</label>
                                <div class="col-sm-6">
                                    <input type="text" id="uname" class="form-control"
                                        placeholder="Enter Your Name">
                                    <span class="unameerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Email:</label>
                                <div class="col-sm-6">
                                    <input type="email" id="uemail" class="form-control"
                                        placeholder="Enter Your Email">
                                    <span class="uemailerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Phone:</label>
                                <div class="col-sm-6">
                                    <input type="tel" id="uphone" class="form-control"
                                        placeholder="Enter Your Phone Number">
                                    <span class="uphoneerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Date of Birth:</label>
                                <div class="col-sm-6">
                                    <input type="date" id="udob" class="form-control"
                                        placeholder="Enter Your DOB">
                                    <span class="udoberror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="disclaimer" class="col-sm-3 col-form-label text-right">Address :</label>
                                <div class="col-sm-6">
                                    <textarea id="uaddress" class="form-control"></textarea>
                                </div>
                                <span class="uaddresserror" style="color:red;font-size:16px"></span>
                            </div>

                            <div class="form-group row">
                                <label for="disclaimer" class="col-sm-3 col-form-label text-right">Bio :</label>
                                <div class="col-sm-6">
                                    <textarea id="uBio" class="ckeditor form-control"></textarea>
                                </div>
                                <span class="uBioerror" style="color:red;font-size:16px"></span>
                            </div>

                            <div class="form-group row mb-0">
                                <label for="name" class="col-sm-3 col-form-label text-right">Social Media
                                    Profiles:</label>
                                <div class="col-sm-6">
                                    <input type="url" id="uinstagram" class="form-control"
                                        placeholder="Instagram Profile"><br>
                                    <input type="url" id="utwitter" class="form-control"
                                        placeholder="Twitter Profile"><br>
                                    <input type="url" id="ulinkedin" class="form-control"
                                        placeholder="LinkedIn Profile">
                                </div>
                            </div>

                            <h3 class="d-flex justify-content-center mt-1"
                                style="font-family: 'Arial', sans-serif; font-size: 28px; font-weight: bold; text-align: center; text-transform: uppercase; color: #333;">
                                Medical Details
                            </h3>


                            <div class="form-group row mb-4">
                                <label for="name" class="col-sm-3 col-form-label text-right">Emergency
                                    Contact:</label>
                                <div class="col-sm-6">
                                    <input type="text" id="fullname" class="form-control"
                                        placeholder="Full Name"><br>
                                    <input type="text" id="relationship" class="form-control"
                                        placeholder="Relationship to User"><br>
                                    <input type="tel" id="contact" class="form-control"
                                        placeholder="Contact Information">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shopid" class="col-sm-3 col-form-label text-right">Chronic medical
                                    conditions:</label>
                                <div class="col-sm-6" id="conditionhtml">
                                    <select class="form-control" style="width: 100%;" id="dropdown">
                                        @foreach ($dropdownDatas as $dropdownData)
                                            <option value="{{ $dropdownData->condition }}">{{ $dropdownData->condition }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <a onclick="conditionModal()"><i class="fa-solid fa-circle-plus"
                                            style="color: #1f6ff9;position: absolute;right:-25px;top:5px;font-size:27px;"></i></a>
                                    {{-- <input type="text" id="newItem" placeholder="type another condition here"
                                        class="form-control mt-1 col-sm-8">
                                    <button onclick="addNewItem(event)" class="btn btn-primary mt-1">Add</button> --}}
                                    {{-- <a onclick="UserModalShow()">
                                        <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
                                    </a> --}}
                                    <span class="ptypeerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>


                            <div class="modal fade" id="modal-condition">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="bannerHeading">Chronic medical conditions</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <form>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="name"
                                                            class="col-sm-3 col-form-label text-right">Enter New
                                                            Condition*:</label>
                                                        <div class="col-sm-7">
                                                            <input class="form-control" placeholder="enter new condition"
                                                                id="newcondition" type="text">
                                                            <span class="newconditionerror"
                                                                style="color:red;font-size:16px"></span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <input type="hidden" id="userid">
                                                <input class="btn btn-primary offset-sm-2" type="button" value="Save"
                                                    onclick="conditionModalSave()">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="shopid" class="col-sm-3 col-form-label text-right">Allergies:</label>
                                <div class="col-sm-6" style="position: relative">
                                    <select class="form-control" style="width: 100%;" id="allergy">
                                        @foreach ($dropdownallergyDatas as $dropdownallergyData)
                                            <option value="{{ $dropdownallergyData->allergy }}">
                                                {{ $dropdownallergyData->allergy }}</option>
                                        @endforeach
                                    </select><a onclick="AllergiModal()"><i class="fa-solid fa-circle-plus"
                                            style="color: #1f6ff9;position: absolute;right:-25px;top:5px;font-size:27px;"></i></a>
                                    {{-- <input type="text" id="newallergy" placeholder="type another allergies here"
                                        class="form-control mt-1 col-sm-8">
                                    <button onclick="addNewAllergy(event)" class="btn btn-primary mt-1">Add</button> --}}
                                    {{-- <a onclick="UserModalShow()">
                                        <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
                                    </a> --}}
                                    <span class="ptypeerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="modal fade" id="modal-allergy">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="bannerHeading">Allergies</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <form>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="name"
                                                            class="col-sm-3 col-form-label text-right">Enter New
                                                            Allergy*:</label>
                                                        <div class="col-sm-7">
                                                            <input class="form-control" placeholder="enter new allergy"
                                                                id="newallergy" type="text">
                                                            <span class="newallergyerror"
                                                                style="color:red;font-size:16px"></span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <input type="hidden" id="userid">
                                                <input class="btn btn-primary offset-sm-2" type="button" value="Save"
                                                    onclick="allergyModalSave()">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shopid" class="col-sm-3 col-form-label text-right">Blood Type:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" style="width: 100%;" id="blood"
                                        onchange="aaa(this.value)">
                                        <option value="" selected disabled>Select</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    <span class="ptypeerror" style="color:red;font-size:16px"></span>

                                </div>
                            </div>

                            <div class="card-footer">
                                <a class="btn btn-default offset-sm-3"
                                    href="{{ route('userprofile', $UserID) }}">Back</a>&emsp;
                                <button type="button" id="addBtn" class="btn btn-primary" onclick="UserSave()"> Save
                                </button>
                            </div>


                        </div>
                    </form>
                    {{-- form 1-end --}}
                    {{-- form 2 --}}
                    <form>
                        <div id="form2">
                            <h3 class="d-flex justify-content-center mt-1"
                                style="font-family: 'Arial', sans-serif; font-size: 28px; font-weight: bold; text-align: center; text-transform: uppercase; color: #151449;">
                                business profile
                            </h3>


                            <div class="form-group row">
                                <label for="shopid" class="col-sm-3 col-form-label text-right">theme:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" style="width: 100%;" id="business_theme">
                                        <option value="" selected disabled>Select</option>
                                        <option value="theme1_bus"> theme1</option>
                                        <option value="theme2_bus"> theme2</option>
                                    </select>
                                    <span class="themeerror" style="color:red;font-size:16px"></span>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Business Name:</label>
                                <div class="col-sm-6">
                                    <input type="text" id="bbusinessName" class="form-control"
                                        placeholder="Enter Business Name">
                                    <span class="bbusinessNameerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image4" class="col-sm-3 col-form-label text-right">Logo :</label>
                                <div class="col-sm-6 col-10">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="blogo" type="file"
                                                onchange="logoImage()">
                                            <label class="custom-file-label" for="image4">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="error span-extra hide text-danger" id="helpimage4"></span>
                                </div>
                                <div class="col-sm-1 col-2">
                                    <button type="button" class="btn btn-secondary btn-tooltip float-left"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Product in Aspect Ratio of 4:5 Required. ie Image with Resolution 200 x 250px, 300 x 375px etc.">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <span class="blogoerror" style="color:red;font-size:16px"></span>
                            </div>





                            <div class="modal fade" id="modal-logo" tabindex="-1" role="dialog"
                                aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">crop a image</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="img-container">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <img id="blogoimage"
                                                            src="https://avatars0.githubusercontent.com/u/3456749">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="preview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" id="logocrop">Crop</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="logo_name" id="logo_name">

                            <div class="form-group row">
                                <label for="shopid" class="col-sm-3 col-form-label text-right">Industry:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" style="width: 100%;" id="bindustry">
                                        @foreach ($dropdownindustries as $dropdownindustry)
                                            <option value="{{ $dropdownindustry->industry }}">
                                                {{ $dropdownindustry->industry }}</option>
                                        @endforeach
                                    </select>
                                    <a onclick="industryModal()"><i class="fa-solid fa-circle-plus"
                                            style="color: #1f6ff9;position: absolute;right:-25px;top:5px;font-size:27px;"></i></a>
                                </div>
                                <span class="bindustryerror" style="color:red;font-size:16px"></span>
                            </div>

                            <div class="modal fade" id="modal-industry">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="bannerHeading">Industries</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <form>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="name"
                                                            class="col-sm-3 col-form-label text-right">Enter New
                                                            industry*:</label>
                                                        <div class="col-sm-7">
                                                            <input class="form-control" placeholder="enter new industry"
                                                                id="industry" type="text">
                                                            <span class="industryerror"
                                                                style="color:red;font-size:16px"></span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <input type="hidden" id="userid">
                                                <input class="btn btn-primary offset-sm-2" type="button" value="Save"
                                                    onclick="IndustrySave()">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="disclaimer" class="col-sm-3 col-form-label text-right">Address :</label>
                                <div class="col-sm-6">
                                    <textarea id="baddress" class="form-control"></textarea>
                                    <span class="baddresserror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Phone:</label>
                                <div class="col-sm-6">
                                    <input type="tel" id="bphone" class="form-control"
                                        placeholder="Enter Your Phone Number">
                                    <span class="bphoneerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Website:</label>
                                <div class="col-sm-6">
                                    <input type="url" id="bwebsite" class="form-control"
                                        placeholder="Enter Your Website Url">
                                    <span class="bwebsiteerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="desc" class="col-sm-3 col-form-label text-right">Description :</label>
                                <div class="col-sm-6">
                                    <textarea id="bdescription" class="ckeditor form-control"></textarea>
                                    <span class="bdescriptionerror" style="color:red;font-size:16px"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label text-right">Social Media
                                    Profiles:</label>
                                <div class="col-sm-6">
                                    <input type="url" id="binstagram" class="form-control"
                                        placeholder="Instagram Profile"><br>
                                    <input type="url" id="btwitter" class="form-control"
                                        placeholder="Twitter Profile"><br>
                                    <input type="url" id="blinkedin" class="form-control"
                                        placeholder="LinkedIn Profile"><br>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a class="btn btn-default offset-sm-3"
                                    href="{{ route('userprofile', $UserID) }}">Back</a>&emsp;
                                <button type="button" id="addBtn" class="btn btn-primary" onclick="BusinessSave()">
                                    Save </button>
                            </div>


                        </div>
                    </form>
                    {{-- form 2-end --}}
                    <!-- /.card-body -->

                </div>

            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
<script>
    function conditionModal() {

        $('#modal-condition').modal('show');
    }

    function conditionModalSave() {

        var newCondition = $('#newcondition').val();

        if (newCondition == '') {
            $('#newcondition').focus();
            $('#newcondition').css('border', '1px solid red');
            $('.newconditionerror').show().css('color', 'red').text("enter new condition here*");
            return false;
        } else {
            $('#newcondition').css('border', '1px solid #CCC');
            $('.newconditionerror').hide();
        }

        data = new FormData();

        data.append('newcondition', newCondition);
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/profile-dropdown-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.success('Added successfully', '', {
                        timeOut: 1000,
                    });
                    $('#modal-condition').modal('hide');

                    $.post("/get-conditions", {
                        _token: "{{ csrf_token() }}"
                    }, function(result) {
                        $('#dropdown').html(result);
                    });
                } else {
                    toastr.error('allergy already exist in dropdown list');
                }
            }
        });

    }

    function AllergiModal() {
        $('#modal-allergy').modal('show');
    }

    function allergyModalSave() {
        var newAllergy = $('#newallergy').val();

        if (newAllergy == '') {
            $('#newallergy').focus();
            $('#newallergy').css('border', '1px solid red');
            $('.newallergyerror').show().css('color', 'red').text("enter new allergy here*");
            return false;
        } else {
            $('#newallergy').css('border', '1px solid #CCC');
            $('.newallergyerror').hide();
        }

        data = new FormData();

        data.append('newallergy', newAllergy);
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/profile-dropdown-allergy-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.success('Added successfully', '', {
                        timeOut: 1000,
                    });
                    $('#modal-allergy').modal('hide');

                    $.post("/get-allergy", {
                        _token: "{{ csrf_token() }}"
                    }, function(result) {
                        $('#allergy').html(result);
                    });
                } else {
                    toastr.error('allergy already exist in dropdown list');
                }
            }
        });
    }

    function industryModal() {

        $('#modal-industry').modal('show');
    }

    function IndustrySave() {

        var newIndustry = $('#industry').val();

        if (newIndustry == '') {
            $('#industry').focus();
            $('#industry').css('border', '1px solid red');
            $('.industryerror').show().css('color', 'red').text("enter new industry here*");
            return false;
        } else {
            $('#industry').css('border', '1px solid #CCC');
            $('.industryerror').hide();
        }

        data = new FormData();

        data.append('newindustry', newIndustry);
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/profile-industry-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.success('Added successfully', '');
                    $('#modal-industry').modal('hide');

                    $.post("/get-industry", {
                        _token: "{{ csrf_token() }}"
                    }, function(result) {
                        $('#bindustry').html(result);
                    });
                } else {
                    toastr.error('allergy already exist in dropdown list');
                }
            }
        });

    }

    function profileimage() {

        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        var files = document.getElementById('uimageee').files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };

        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            var canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "/crop-image-upload-ajax",
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': base64data
                        },
                        success: function(data) {
                            console.log(data);
                            $modal.modal('hide');
                            // alert('croped success');
                            $('#image_name').val(data['image_name']);


                        }
                    });
                }
            });
        });
    }

    function ProfileChooseShow() {
        var UserID = $('#userid').val();
        var profileUrl = '/profile/' + UserID;

        // Redirect to the profile page
        window.location.href = profileUrl;
    }

    function ChangeProfile(val) {
        if (val == 1) {
            $('#form1').show();
            $('#form2').hide();
        } else if (val == 2) {
            $('#form2').show();
            $('#form1').hide();
        }
    }

    function UserSave() {



        var profileType = $('select#ptype').val();
        var USerID = $('#userid').val();

        var theme = $('select#user_theme').val();
        var profilePic = $('#image_name').val();
        var Name = $('#uname').val();
        var Email = $('#uemail').val();
        var Phone = $('#uphone').val();
        var DateofB = $('#udob').val();
        var Address = $('#uaddress').val();
        var Bio = CKEDITOR.instances.uBio.getData();
        var Instagram = $('#uinstagram').val();
        var Twitter = $('#utwitter').val();
        var Linkedin = $('#ulinkedin').val();

        var em_fullName = $('#fullname').val();
        var relationShip = $('#relationship').val();
        var contact = $('#contact').val();
        var condition = $('select#dropdown').val();
        var allergy = $('select#allergy').val();
        var blood = $('#blood').val();




        if (!profileType) {
            $('#ptype').focus();
            $('#ptype').css('border', '1px solid red');
            $('.ptypeerror').show().css('color', 'red');
            $('.ptypeerror').text("Select Profile Type*");
            return false;
        } else {
            $('#ptype').css('border', '1px solid #CCC');
            $('.ptypeerror').hide();
        }

        // if (!theme) {
        //     $('#theme').focus();
        //     $('#theme').css('border', '1px solid red');
        //     $('.themeerror').show().css('color', 'red');
        //     $('.themeerror').text("Select Theme*");
        //     return false;
        // } else {
        //     $('#theme').css('border', '1px solid #CCC');
        //     $('.themeerror').hide();
        // }

        // if (!profilePic) {
        //     $('#uimage').focus();
        //     $('#uimage').css('border', '1px solid red');
        //     $('.uimageerror').show().css('color', 'red');
        //     $('.uimageerror').text("Select Image*");
        //     return false;
        // } else {
        //     $('#uimage').css('border', '1px solid #CCC');
        //     $('.uimageerror').hide();
        // }

        if (!Name) {
            $('#uname').focus();
            $('#uname').css('border', '1px solid red');
            $('.unameerror').show().css('color', 'red');
            $('.unameerror').text("enter name*");
            return false;
        } else {
            $('#uname').css('border', '1px solid #CCC');
            $('.unameerror').hide();
        }



        if (Email.trim() === '') {
            $('#uemail').focus();
            $('#uemail').css('border', '1px solid red');
            $('.uemailerror').show();
            $('.uemailerror').css('color', 'red');
            $('.uemailerror').text('Enter Email Address*');
            return false;
        } else if (!isValidEmail(Email)) {
            $('#uemail').focus();
            $('#uemail').css('border', '1px solid red');
            $('.uemailerror').show();
            $('.uemailerror').css('color', 'red');
            $('.uemailerror').text('Invalid Email Address');
            return false;
        } else {
            $('#uemail').css('border', '1px solid #CCC');
            $('.uemailerror').hide();
        }

        function isValidEmail(email) {
            // Regular expression for email validation
            var emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
            return emailRegex.test(email);
        }


        if (Phone == '') {
            $('#uphone').focus();
            $('#uphone').css('border', '1px solid red');
            $('.uphoneerror').show().css('color', 'red').text("Enter Mobile Number*");
            return false;
        } else {
            $('#uphone').css('border', '1px solid #CCC');
            $('.uphoneerror').hide();
        }

        var mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(Phone)) {
            $('#uphone').focus();
            $('#uphone').css('border', '1px solid red');
            $('.uphoneerror').show().css('color', 'red').text("Enter a valid mobile number*");
            return false;
        } else {
            $('#uphone').css('border', '1px solid #CCC');
            $('.uphoneerror').hide();
        }

        if (!DateofB) {
            $('#udob').focus();
            $('#udob').css('border', '1px solid red');
            $('.udoberror').show().css('color', 'red');
            $('.udoberror').text("choose date*");
            return false;
        } else {
            $('#udob').css('border', '1px solid #CCC');
            $('.udoberror').hide();
        }



        data = new FormData();

        data.append('profileid', profileType);
        data.append('theme', theme);
        data.append('userdp', profilePic);
        data.append('username', Name);
        data.append('email', Email);
        data.append('userid', USerID);
        data.append('phone', Phone);
        data.append('address', Address);
        data.append('dob', DateofB);
        data.append('bio', Bio);
        data.append('insta', Instagram);
        data.append('twitter', Twitter);
        data.append('linkedin', Linkedin);


        data.append('fullname', em_fullName);
        data.append('relationship', relationShip);
        data.append('contact', contact);
        data.append('condition', condition);
        data.append('allergy', allergy);
        data.append('blood', blood);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/profile-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/user-profile/' + USerID;
                    };
                    toastr.success('Profile Created successfully', '', {
                        timeOut: 1000,
                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });

    }

    function BusinessSave() {

        var profileType = $('#ptype').val();
        var USerID = $('#userid').val();

        var Theme = $('select#business_theme').val();
        var logo = $('#logo_name').val();
        var businessName = $('#bbusinessName').val();
        var Industry = $('#bindustry').val();
        var Address = $('#baddress').val();
        var phone = $('#bphone').val();
        var website = $('#bwebsite').val();
        var description = CKEDITOR.instances.bdescription.getData();

        var instagram = $('#binstagram').val();
        var twitter = $('#btwitter').val();
        var linkedin = $('#blinkedin').val();



        data = new FormData();

        data.append('profileid', profileType);
        data.append('theme', Theme);
        data.append('logo', logo);
        data.append('bname', businessName);
        data.append('industry', Industry);
        data.append('userid', USerID);
        data.append('address', Address);
        data.append('phone', phone);
        data.append('website', website);
        data.append('description', description);
        data.append('instagram', instagram);
        data.append('twitter', twitter);
        data.append('linkedin', linkedin);
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/profile-save-bus",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/user-profile/' + USerID;
                    };
                    toastr.success('Profile Created successfully', '', {
                        timeOut: 1000,
                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });

    }

    function redirectToProfile(ProfileID) {

        data = new FormData();

        data.append('profileid', ProfileID);
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/profile-preview",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
        });
    }

    function logoImage() {

        var $modal = $('#modal-logo');
        var image = document.getElementById('blogoimage');
        var cropper;

        var files = document.getElementById('blogo').files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };

        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#logocrop").click(function() {
            var canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "/crop-image-upload-ajax-business",
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': base64data
                        },
                        success: function(data) {
                            // console.log(data);
                            $modal.modal('hide');

                            $('#logo_name').val(data['logo_name']);


                        }
                    });
                }
            });
        });
    }
</script>



{{-- @include('admin.layouts.js.user_profile_js') --}}
