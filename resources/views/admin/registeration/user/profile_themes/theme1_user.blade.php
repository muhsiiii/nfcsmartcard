<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFC</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('nfc/css/nfc.css') }}">
    <link rel="stylesheet" href="{{ asset('nfc/css/common.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background: #F8F9FA;">
        <div class="container-main mt-4">
            <div class="green-bg primary-bg" style="background-image: url(/nfc/images/1457718455276\ 1.png);background-repeat: no-repeat;background-size: 100% auto;background-position: center;background-repeat: no-repeat;background-size: cover;height: -webkit-fill-available;">
            </div>
            <div class="details">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="bussines-profile-dv">
                            <h4 class="business-text">User profile</h4>
                            <div class="business-profile-dv-details">
                                <div class="img-and-prf-details">
                                    <div class="profile-img-dv">
                                        <img class="profile-img" src="{{ asset('upload/'.$profilePreview->profile_pic) }}" alt="">
                                    </div>
                                    <div class="bs-profile-details">
                                        <h2 class="name mb-0">{{ $profilePreview->user_name }}</h2>
                                        <h6 class="email mb-0">{{ $profilePreview->email }}</h6>
                                        <h6 class="number mb-0">{{ $profilePreview->phone }}</h6>
                                        <h6 class="date mb-0">{{ $profilePreview->dob }}</h6>
                                    </div>
                                </div>
                                <div class="bs-social-icons">
                                    @if($profilePreview->instagram)
                                    <a href="{{ $profilePreview->instagram }}" target="_blank">
                                        <img class="icons-bs-profile" src="{{ asset('nfc/images/instagram 1 (3).png') }}" alt="">
                                    </a>
                                    @endif
                                    <a href="#" target="_blank">
                                        <img class="icons-bs-profile" src="{{ asset('nfc/images/facebook (2) 1 (1).png') }}" alt="">
                                    </a>
                                    <a href="{{ $profilePreview->linkedin }}" target="_blank">
                                        <img class="icons-bs-profile" src="{{ asset('nfc/images/instagram 3.png') }}" alt="">
                                    </a>
                                    <a href="#" target="_blank">
                                        <img class="icons-bs-profile" src="{{ asset('nfc/images/youtube 1 (1).png') }}" alt="">
                                    </a>
                                    <a href="{{ $profilePreview->twitter }}" target="_blank">
                                        <img class="icons-bs-profile" src="{{ asset('nfc/images/instagram 2.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="bio-address-dv">
                                <div class="bio-dv primary-bg h-p" style="background-image: url({{ asset('nfc/images/circle.png') }});background-repeat: no-repeat;background-size: 100% auto;background-position: center;background-repeat: no-repeat;background-size: cover;height: -webkit-fill-available;">
                                    <div class="heading-bio">
                                        <i class="ri-file-text-fill"></i>
                                        <h3 class="bio-head-text text-white mb-0">BIO</h3>
                                    </div>
                                    <p class="text-white sub-text-bio mb-0">{!! $profilePreview->bio !!}</p>
                                </div>
                                <div class="bio-dv primary-bg" style="background-image: url({{ asset('nfc/images/circle.png') }});background-repeat: no-repeat;background-size: 100% auto;background-position: center;background-repeat: no-repeat;background-size: cover;height: -webkit-fill-available;">
                                    <div class="heading-bio">
                                        <i class="ri-map-pin-line"></i>
                                        <h3 class="bio-head-text text-white mb-0">ADDRESS</h3>
                                    </div>
                                    <p class="text-white sub-text-bio mb-0">{{ $profilePreview->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ======================= medical ======================== -->
                    <div class="col-lg-4">
                        <div class="medical-main-dv">
                            <h4 class="business-text">Medical Details</h4>
                            <div class="medical-details">
                                <div class="emg-dv pb-3">
                                    <i class="ri-phone-fill primary-color"></i>
                                    <h4 class="emg-text primary-color mb-0">EMERGENCY CONTACT</h4>
                                </div>

                                <div class="medical-person-details">
                                    <h5>{{ $profilePreview->emergency_name }}</h5>
                                    <h6 class="number mb-0">{{ $profilePreview->relation_user }}</h6>
                                    <h6 class="date mb-0">{{ $profilePreview->contact_info }}</h6>
                                </div>
                                <hr>
                                <div class="emg-dv pb-3">
                                    <i class="ri-hospital-fill primary-color"></i>
                                    <h4 class="emg-text primary-color mb-0">CHRONIC MEDICAL CONDITIONS</h4>
                                </div>

                                <div class="medical-person-details">
                                    <h6 class="date mb-0">{{ $profilePreview->conditions }}</h6>
                                </div>
                                <hr>
                                <div class="emg-dv pb-3">
                                    <i class="ri-home-heart-fill primary-color"></i>
                                    <h4 class="emg-text primary-color mb-0">ALLERGIES</h4>
                                </div>

                                <div class="medical-person-details">
                                    <h6 class="date mb-0">{{ $profilePreview->allergies }}</h6>
                                </div>
                                <hr>
                                <div class="emg-dv pb-3">
                                    <i class="ri-drop-fill primary-color"></i>
                                    <h4 class="emg-text primary-color mb-0">BLOOD TYPE</h4>
                                </div>

                                <div class="medical-person-details">
                                    <h6 class="date mb-0">{{ $profilePreview->blood }}</h6>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
