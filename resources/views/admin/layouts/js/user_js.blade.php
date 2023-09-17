<script>
    function UserModalShow() {
        $('#modal-add').modal('show');
    }

    function UserSave() {
        // alert('dssad');
        // return false;
        var FirstName = $('input#fname').val();
        var LastName = $('input#lname').val();
        var Email = $('input#email').val();
        var Password = $('input#password').val();
        var mobile = $('input#mobile').val();
        var ConfirmPassword = $('input#confirmPassword').val();

        if (FirstName == '') {
            $('#fname').focus();
            $('#fname').css({
                'border': '1px solid red'
            });
            $('.fnameerror').show();
            $('.fnameerror').css('color', 'red');
            $('.fnameerror').text("Enter First Name*");
            return false;
        } else {
            $('#fname').css({
                'border': '1px solid #CCC'
            });
            $('.fnameerror').hide();
        }

        if (Email.trim() === '') {
            $('#email').focus();
            $('#email').css('border', '1px solid red');
            $('.emailerror').show();
            $('.emailerror').css('color', 'red');
            $('.emailerror').text('Enter Email Address*');
            return false;
        } else if (!isValidEmail(Email)) {
            $('#email').focus();
            $('#email').css('border', '1px solid red');
            $('.emailerror').show();
            $('.emailerror').css('color', 'red');
            $('.emailerror').text('Invalid Email Address');
            return false;
        } else {
            $('#email').css('border', '1px solid #CCC');
            $('.emailerror').hide();
        }


        function isValidEmail(email) {
            // Regular expression for email validation
            var emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
            return emailRegex.test(email);
        }


        if (mobile == '') {
            $('#mobile').focus();
            $('#mobile').css('border', '1px solid red');
            $('.mobileerror').show().css('color', 'red').text("Enter Mobile Number*");
            return false;
        } else {
            $('#mobile').css('border', '1px solid #CCC');
            $('.mobileerror').hide();
        }

        var mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(mobile)) {
            $('#mobile').focus();
            $('#mobile').css('border', '1px solid red');
            $('.mobileerror').show().css('color', 'red').text("Enter a valid mobile number*");
            return false;
        } else {
            $('#mobile').css('border', '1px solid #CCC');
            $('.mobileerror').hide();
        }

        if (Password === '' || ConfirmPassword === '') {
            $('#password').focus();
            $('#password').css('border', '1px solid red');
            $('#confirmPassword').css('border', '1px solid red');
            $('.passworderror').show();
            $('.passworderror').css('color', 'red');
            $('.passworderror').text('Enter Password');
            $('.confirmPasswordError').hide();
            return false;
        } else if (Password.length < 6) {
            $('#password').focus();
            $('#password').css('border', '1px solid red');
            $('#confirmPassword').css('border', '1px solid #CCC');
            $('.passworderror').show();
            $('.passworderror').css('color', 'red');
            $('.passworderror').text('Password should be at least 6 characters');
            $('.confirmPasswordError').hide();
            return false;
        } else if (Password !== ConfirmPassword) {
            $('#password').css('border', '1px solid red');
            $('#confirmPassword').css('border', '1px solid red');
            $('.passworderror').hide();
            $('.confirmPasswordError').show();
            $('.confirmPasswordError').css('color', 'red');
            $('.confirmPasswordError').text('Passwords do not match');
            return false;
        } else {
            $('#password').css('border', '1px solid #CCC');
            $('#confirmPassword').css('border', '1px solid #CCC');
            $('.passworderror').hide();
            $('.confirmPasswordError').hide();
        }

        data = new FormData();
        data.append('fname', FirstName);
        data.append('lname', LastName);
        data.append('email', Email);
        data.append('mobile', mobile);
        data.append('cpwd', ConfirmPassword);
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/user-reg-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/user-list';
                    };
                    toastr.success('User Registered successfully', '', {
                        timeOut: 1000,
                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });
    }

    function ChangePWdSave() {

        var OldPassword = $('#oldpwd').val();
        var NewPassword = $('#newpwd').val();
        // $('#cpwd').val();

        data = new FormData();
        data.append('oldpwd', OldPassword);
        data.append('newpwd', NewPassword);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/change-password-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.success('Password Changed successfully');
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });
    }

    function UserEdit(UserID,Fname,Lname,Email,Mobile) {

        $("#fname1").val(Fname);
        $("#lname1").val(Lname);
        $("#email1").val(Email);
        $("#userid").val(UserID);
        $("#mobile1").val(Mobile);

        $("#modal-edit").modal('show');
    }

    function UserUpdate() {



        var firstName = $("#fname1").val();
        var lastName = $("#lname1").val();
        var Email = $("#email1").val();
        var mobile1 = $("#mobile1").val();

        var UserID = $("#userid").val();

        if (firstName == '') {
            $('#fname1').focus();
            $('#fname1').css({
                'border': '1px solid red'
            });
            $('.fname1error').show();
            $('.fname1error').css('color', 'red');
            $('.fname1error').text("Enter First Name*");
            return false;
        } else {
            $('#fname1').css({
                'border': '1px solid #CCC'
            });
            $('.fname1error').hide();
        }

        if (Email.trim() === '') {
            $('#email1').focus();
            $('#email1').css('border', '1px solid red');
            $('.email1error').show();
            $('.email1error').css('color', 'red');
            $('.email1error').text('Enter Email Address*');
            return false;
        } else if (!isValidEmail(Email)) {
            $('#email1').focus();
            $('#email1').css('border', '1px solid red');
            $('.email1error').show();
            $('.email1error').css('color', 'red');
            $('.email1error').text('Invalid Email Address');
            return false;
        } else {
            $('#email1').css('border', '1px solid #CCC');
            $('.email1error').hide();
        }

        function isValidEmail(email) {
            // Regular expression for email validation
            var emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
            return emailRegex.test(email);
        }


        if (mobile1 == '') {
            $('#mobile1').focus();
            $('#mobile1').css('border', '1px solid red');
            $('.mobile1error').show().css('color', 'red').text("Enter Mobile Number*");
            return false;
        } else {
            $('#mobile1').css('border', '1px solid #CCC');
            $('.mobile1error').hide();
        }

        var mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(mobile1)) {
            $('#mobile1').focus();
            $('#mobile1').css('border', '1px solid red');
            $('.mobile1error').show().css('color', 'red').text("Enter a valid mobile number*");
            return false;
        } else {
            $('#mobile1').css('border', '1px solid #CCC');
            $('.mobile1error').hide();
        }


        data = new FormData();
        data.append('fname', firstName);
        data.append('lname', lastName);
        data.append('email', Email);
        data.append('mobile1', mobile1);
        data.append('userid', UserID);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/user-reg-update",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/user-list';
                    };

                    toastr.success('User Updated successfully', '', {
                        timeOut: 1000,

                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });

    }

    function UserDelete(userID) {
        data = new FormData();

        data.append('userid', userID);
        data.append('_token', '{{ csrf_token() }}');

        Swal.fire({
            title: 'Do You Want To Delete..??',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "/user-reg-delete",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'User Deleted SuccessFully',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = window.location.href;
                                }
                            })
                        } else {
                            toastr.error('Something Went Wrong');
                        }
                    }
                })
            }
        });
    }

    function ChangePassword(userID) {
        $('#modal-changepwd').modal('show');
        $('#userid').val(userID);
    }

    function UserChangepwd() {

        var newPassword = $("#newpwd").val();
        var confirmPassword = $("#cpwd").val();
        var userID = $("#userid").val();
        // alert(userID);
        // return false;

        if (newPassword === '' || confirmPassword === '') {
            $('#newpwd').focus();
            $('#newpwd').css('border', '1px solid red');
            $('#cpwd').css('border', '1px solid red');
            $('.newpwderror').show();
            $('.newpwderror').css('color', 'red');
            $('.newpwderror').text('Enter Password');
            $('.cpwderror').hide();
            return false;
        } else if (newPassword.length < 6) {
            $('#newpwd').focus();
            $('#newpwd').css('border', '1px solid red');
            $('#cpwd').css('border', '1px solid #CCC');
            $('.newpwderror').show();
            $('.newpwderror').css('color', 'red');
            $('.newpwderror').text('Password should be at least 6 characters');
            $('.cpwderror').hide();
            return false;
        } else if (newPassword !== confirmPassword) {
            $('#newpwd').css('border', '1px solid red');
            $('#cpwd').css('border', '1px solid red');
            $('.newpwderror').hide();
            $('.cpwderror').show();
            $('.cpwderror').css('color', 'red');
            $('.cpwderror').text('Passwords do not match');
            return false;
        } else {
            $('#newpwd').css('border', '1px solid #CCC');
            $('#cpwd').css('border', '1px solid #CCC');
            $('.newpwderror').hide();
            $('.cpwderror').hide();
        }

        data = new FormData();
        data.append('password', confirmPassword);
        data.append('userid', userID);

        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/user-change-pwd",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/user-list';
                    };
                    toastr.success('Password Changed successfully', '', {
                        timeOut: 1000,

                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });
    }

    function redirectToProfile(userId) {
        // Construct the URL with the user ID
        var profileUrl = '/user-profile/' + userId;

        // Redirect to the profile page
        window.location.href = profileUrl;
    }
</script>
