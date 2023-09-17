<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NFC</title>
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('nfc/css/common.css') }}">
	<link rel="stylesheet" href="{{ asset('nfc/css/nfc.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background: #F5F5F7;">
	<div class="conatainer-main-two">
		<div class="row">
			<div class="col-lg-12">
				<div class="user-prfl-dv">
					<h4 class="theme-two-usr-txt">Business profile</h4>
					<hr>
				</div>
			</div>
			<div class="col-lg-12">

				<div class="business-profile-main-box">
					<div class="profile-box-theme-two">
						<img class="theme-two-profile-img" src="{{ asset('upload/'.$profilePreview->logo) }}" alt="">
						<h2 class="name-theme-two mb-0 text-center">{{ $profilePreview->business_name }}</h2>
						<h5 class="sub-txt-post-theme-two mb-0 text-center">{{ $profilePreview->industry }}</h5>
						<h5 class="sub-txt-post-theme-two mb-0 text-center"><a href="#">{{ $profilePreview->phone }}</a></h5>
						<h5 class="sub-txt-post-theme-two mb-0 text-center"><a href="#">{{ $profilePreview->website }}</a></h5>
						<div class="bs-social-icons-thm-2">
							<a href="{{ $profilePreview->instagram }}">
								<img class="icons-bs-profile" src="{{ asset('nfc/images/instagram 1 (3).png') }}" alt="">
							</a>
							<a href="#">
								<img class="icons-bs-profile" src="{{ asset('nfc/images/facebook (2) 1 (1).png') }}" alt="">
							</a>
							<a href="{{ $profilePreview->linkedin }}">
								<img class="icons-bs-profile" src="{{ asset('nfc/images/instagram 3.png') }}" alt="">
							</a>
							<a href="#">
								<img class="icons-bs-profile" src="{{ asset('nfc/images/youtube 1 (1).png') }}" alt="">
							</a>
							<a href="{{ $profilePreview->twitter }}">
								<img class="icons-bs-profile" src="{{ asset('nfc/images/instagram 2.png') }}" alt="">
							</a>
						</div>
					</div>
					<div class="bio-add-dv-theme-2">
						<div class="bio-dv-theme-two">
							<div class="box-bio-add-thm-2">
								<i class="ri-file-list-3-fill"></i>
								<h3 class="head-txt-main-theme-two mb-0">DESCRIPTION</h3>
							</div>
							<p>{!! $profilePreview->description !!}</p>
						</div>
						<div class="bio-dv-theme-two">
							<div class="box-bio-add-thm-2">
								<i class="ri-file-list-3-fill"></i>
								<h3 class="head-txt-main-theme-two mb-0">ADDRESS</h3>
							</div>
							<p>{{ $profilePreview->address }}</p>
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
