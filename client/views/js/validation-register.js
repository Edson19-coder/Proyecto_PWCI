$(document).ready( () => {

    $( "#btn-sign-up" ).prop( "disabled", true );

    $('.register-content').keyup( () => {
        var validatePass = validatePassword($('#InputPasswordRegister').val());
        //if($('#InputUserRegister').val().length <= 0 || $('#InputEmailRegister').val().length <= 0 || $('#InputPasswordRegister').val().length <= 0 || $('#InputConfirmPasswordRegister').val().length <= 0 || validatePass == false)
        if($('#InputUserRegister').val().length <= 0 || $('#InputEmailRegister').val().length <= 0 || $('#InputPasswordRegister').val().length <= 0 || validatePass == false) {
            $( "#btn-sign-up" ).prop( "disabled", true );
        } else {
            $( "#btn-sign-up" ).prop( "disabled", false );
        }
    });

    $('#InputUserRegister').keyup( () => {
        if($('#InputUserRegister').val().length <= 0) {
            $('#span-user-name').removeClass('hide');
        } else {
            $('#span-user-name').addClass('hide');
        }
    });

    $('#InputEmailRegister').keyup( () => {
        if($('#InputEmailRegister').val().length <= 0) {
            $('#span-email').removeClass('hide');
        } else {
            $('#span-email').addClass('hide');
        }
    });

    $('#InputPasswordRegister').keyup( () => {
        if($('#InputPasswordRegister').val().length <= 0) {
            $('#span-password').removeClass('hide');
        } else {
            $('#span-password').addClass('hide');
        }

        if(!validatePassword($('#InputPasswordRegister').val())) {
            $('#span-password-2').removeClass('hide');
        } else {
            $('#span-password-2').addClass('hide');
        }
    });

    /*$('#InputConfirmPasswordRegister').keyup( () => {
        if($('#InputConfirmPasswordRegister').val().length <= 0) {
            $('#span-confirm-password').removeClass('hide');
        } else {
            $('#span-confirm-password').addClass('hide');
        }
    });*/
    

});

function validatePassword(password)
    {
        if(password.length >= 8)
        {
            debugger
            var capitalLetter = false;
            var lowerCase = false;
            var number = false;
            var special = false;

            for(var i = 0;i<password.length;i++)
            {
                if(password.charCodeAt(i) >= 65 && password.charCodeAt(i) <= 90)
                {
                    capitalLetter = true;
                }
                else if(password.charCodeAt(i) >= 97 && password.charCodeAt(i) <= 122)
                {
                    lowerCase = true;
                }
                else if(password.charCodeAt(i) >= 48 && password.charCodeAt(i) <= 57)
                {
                    number = true;
                }
                else
                {
                    special = true;
                }
            }
            if(capitalLetter == true && lowerCase == true && special == true && number == true)
            {
                return true;
            }
        }
        return false;
    }