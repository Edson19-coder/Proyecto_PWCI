$(document).ready( () => {

    $( "#btn-sign-in" ).prop( "disabled", true );

    $('.login-content').keyup( () => {
        if($('#InputPasswordLogin').val().length <= 0 || $('#InputEmailLogin').val().length <= 0) {
            $( "#btn-sign-in" ).prop( "disabled", true );
        } else {
            $( "#btn-sign-in" ).prop( "disabled", false );
        }
    })
    

    $('#InputPasswordLogin').keyup( () => {
        if($('#InputPasswordLogin').val().length <= 0) {
            $('#span-password').removeClass('hide');
        }
        else {
            $('#span-password').addClass('hide');
        }
    });

    $('#InputEmailLogin').keyup( () => {
        if($('#InputEmailLogin').val().length <= 0) {
            $('#span-email').removeClass('hide');
        }
        else {
            $('#span-email').addClass('hide');
        }
    });

});
