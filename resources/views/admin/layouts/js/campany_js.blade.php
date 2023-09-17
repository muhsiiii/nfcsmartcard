<script>
    function CmpnyAdd() {
        $('#campany-add').modal('show');
    }

    function CampanySave() {
        var CampanyName = $('input#cname').val();
        var CampanyEmail = $('input#cemail').val();
        var CampanyContact = $('input#ccontact').val();
        var CPassword = $('input#cpassword').val();
        var CCpassword = $('input#cconfirmPassword').val();

        if (CampanyName == '') {
            $('#cname').focus();
            $('#cname').css({
                'border': '1px solid red'
            });
            $('.cnameerror').show();
            $('.cnameerror').css('color', 'red');
            $('.cnameerror').text("Enter Campany Name*");
            return false;
        } else {
            $('#cname').css({
                'border': '1px solid #CCC'
            });
            $('.cnameerror').hide();
        }

        if (CampanyEmail.trim() === '') {
            $('#cemail').focus();
            $('#cemail').css('border', '1px solid red');
            $('.cemailerror').show();
            $('.cemailerror').css('color', 'red');
            $('.cemailerror').text('Enter Email Address*');
            return false;
        } else if (!isValidEmail(CampanyEmail)) {
            $('#cemail').focus();
            $('#cemail').css('border', '1px solid red');
            $('.cemailerror').show();
            $('.cemailerror').css('color', 'red');
            $('.cemailerror').text('Invalid Email Address');
            return false;
        } else {
            $('#cemail').css('border', '1px solid #CCC');
            $('.cemailerror').hide();
        }

        function isValidEmail(email) {
            // Regular expression for email validation
            var emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
            return emailRegex.test(email);
        }

        if (CampanyContact == '') {
            $('#ccontact').focus();
            $('#ccontact').css('border', '1px solid red');
            $('.ccontacterror').show().css('color', 'red').text("Enter Mobile Number*");
            return false;
        } else {
            $('#ccontact').css('border', '1px solid #CCC');
            $('.ccontacterror').hide();
        }

        var mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(CampanyContact)) {
            $('#ccontact').focus();
            $('#ccontact').css('border', '1px solid red');
            $('.ccontacterror').show().css('color', 'red').text("Enter a valid mobile number*");
            return false;
        } else {
            $('#ccontact').css('border', '1px solid #CCC');
            $('.ccontacterror').hide();
        }


        if (CPassword === '' || CCpassword === '') {
            $('#cpassword').focus().css('border', '1px solid red');
            $('#cconfirmPassword').css('border', '1px solid red');
            $('.cpassworderror').show().css('color', 'red').text('Enter Password');
            $('.cconfirmpassworderror').hide();
            return false;
        } else if (CPassword.length < 6) {
            $('#cpassword').focus().css('border', '1px solid red');
            $('#cconfirmPassword').css('border', '1px solid #CCC');
            $('.cpassworderror').show().css('color', 'red').text('Password should be at least 6 characters');
            $('.cconfirmpassworderror').hide();
            return false;
        } else if (CPassword !== CCpassword) {
            $('#cpassword').css('border', '1px solid red');
            $('#cconfirmPassword').focus().css('border', '1px solid red');
            $('.cpassworderror').hide();
            $('.cconfirmpassworderror').show().css('color', 'red').text('Passwords do not match');
            return false;
        } else {
            $('#cpassword').css('border', '1px solid #CCC');
            $('#cconfirmPassword').css('border', '1px solid #CCC');
            $('.cpassworderror').hide();
            $('.cconfirmpassworderror').hide();
        }

        data = new FormData();

        data.append('cname', CampanyName);
        data.append('cemail', CampanyEmail);
        data.append('ccontact', CampanyContact);
        data.append('ccpwd', CCpassword);
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/campany-reg-save",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/campany-reg-list';
                    };
                    toastr.success('Campany Registered successfully', '', {
                        timeOut: 1000,
                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });
    }

    function CampanyEdit(Cid, Cname, Cemail, Cmobile) {
        $('#campany-edit').modal('show');
        $('#cname1').val(Cname);
        $('#cemail1').val(Cemail);
        $('#ccontact1').val(Cmobile);
        $('#cid').val(Cid);

    }

    function CampanyUpdate() {
        var Cid = $('#cid').val();
        var Cname = $('#cname1').val();
        var Cemail = $('#cemail1').val();
        var Cmobile = $('#ccontact1').val();

        if (Cname == '') {
            $('#cname1').focus();
            $('#cname1').css({
                'border': '1px solid red'
            });
            $('.cnameerror1').show();
            $('.cnameerror1').css('color', 'red');
            $('.cnameerror1').text("Enter Campany Name*");
            return false;
        } else {
            $('#cname1').css({
                'border': '1px solid #CCC'
            });
            $('.cnameerror1').hide();
        }

        if (Cemail.trim() === '') {
            $('#cemail1').focus();
            $('#cemail1').css('border', '1px solid red');
            $('.cemailerror1').show();
            $('.cemailerror1').css('color', 'red');
            $('.cemailerror1').text('Enter Email Address*');
            return false;
        } else if (!isValidEmail(Cemail)) {
            $('#cemail1').focus();
            $('#cemail1').css('border', '1px solid red');
            $('.cemailerror1').show();
            $('.cemailerror1').css('color', 'red');
            $('.cemailerror1').text('Invalid Email Address');
            return false;
        } else {
            $('#cemail1').css('border', '1px solid #CCC');
            $('.cemailerror1').hide();
        }

        function isValidEmail(email) {

            var emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
            return emailRegex.test(email);
        }

        if (Cmobile == '') {
            $('#ccontact1').focus();
            $('#ccontact1').css('border', '1px solid red');
            $('.ccontacterror1').show().css('color', 'red').text("Enter Mobile Number*");
            return false;
        } else {
            $('#ccontact1').css('border', '1px solid #CCC');
            $('.ccontacterror1').hide();
        }

        var mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(Cmobile)) {
            $('#ccontact1').focus();
            $('#ccontact1').css('border', '1px solid red');
            $('.ccontacterror1').show().css('color', 'red').text("Enter a valid mobile number*");
            return false;
        } else {
            $('#ccontact1').css('border', '1px solid #CCC');
            $('.ccontacterror1').hide();
        }

        data = new FormData();

        data.append('campanyname', Cname);
        data.append('campanyemail', Cemail);
        data.append('campanymobile', Cmobile);
        data.append('campanyid', Cid);
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/campany-reg-update",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/campany-reg-list';
                    };
                    toastr.success('Campany Update successfully', '', {
                        timeOut: 1000,
                    });
                } else {
                    toastr.error('Something Went Wrong');
                }
            }
        });
    }

    function CampanyChangepwd(Cid) {
        $('#campany-changepwd').modal('show');
        $('#cid').val(Cid);
    }

    function UserChangepwd() {
        var Cid = $('#cid').val();
        var NewPassword = $('#newpwd').val();
        var CPassword = $('#cpwd').val();

        if (NewPassword === '' || CPassword === '') {
            $('#newpwd').focus().css('border', '1px solid red');
            $('#cpwd').css('border', '1px solid red');
            $('.newpwderror').show().css('color', 'red').text('Enter Password');
            $('.cpwderror').hide();
            return false;
        } else if (NewPassword.length < 6) {
            $('#newpwd').focus().css('border', '1px solid red');
            $('#cpwd').css('border', '1px solid #CCC');
            $('.newpwderror').show().css('color', 'red').text('Password should be at least 6 characters');
            $('.cpwderror').hide();
            return false;
        } else if (NewPassword !== CPassword) {
            $('#newpwd').css('border', '1px solid red');
            $('#cpwd').focus().css('border', '1px solid red');
            $('.newpwderror').hide();
            $('.cpwderror').show().css('color', 'red').text('Passwords do not match');
            return false;
        } else {
            $('#newpwd').css('border', '1px solid #CCC');
            $('#cpwd').css('border', '1px solid #CCC');
            $('.newpwderror').hide();
            $('.cpwderror').hide();
        }

        data = new FormData();

        data.append('cid', Cid);
        data.append('password', CPassword);
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: "/campany-change-pwd",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data['success']) {
                    toastr.options.onHidden = function() {
                        window.location.href =
                            '/campany-reg-list';
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

    function CampanyDelete(Cid) {

        data = new FormData();

        data.append('cid', Cid);
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
                    url: "/campany-reg-delete",
                    data: data,
                    dataType: "json",
                    contentType: false,
                    //cache: false,
                    processData: false,

                    success: function(data) {
                        if (data['success']) {

                            Swal.fire({
                                title: 'Campany Deleted SuccessFully',
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
</script>
