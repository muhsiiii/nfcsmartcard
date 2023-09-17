<script>
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

    //    var test = $('select#dropdown').val();

        var profileType = $('select#ptype').val();
        var theme = $('select#theme').val();
        var USerID = $('#userid').val();

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
        var Theme = $('#theme').val();
        var USerID = $('#userid').val();

        var logo = $('#blogo').get(0).files[0];
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
        data.append('theme', theme);
        data.append('logo', $('#blogo')[0].files[0]);
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
</script>
