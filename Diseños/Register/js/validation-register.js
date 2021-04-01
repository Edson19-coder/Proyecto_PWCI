$(document).ready( () => {

    $( "#btn-sign-up" ).prop( "disabled", true );

    $('.register-content').keyup( () => {
        if($('#InputUserRegister').val().length <= 0 || $('#InputEmailRegister').val().length <= 0 || $('#InputPasswordRegister').val().length <= 0 || $('#InputConfirmPasswordRegister').val().length <= 0) {
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
    });

    $('#InputConfirmPasswordRegister').keyup( () => {
        if($('#InputConfirmPasswordRegister').val().length <= 0) {
            $('#span-confirm-password').removeClass('hide');
        } else {
            $('#span-confirm-password').addClass('hide');
        }
    });

});