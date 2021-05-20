$(document).ready( () => {

        var fileInput = document.getElementById("InputImageSettings");

        check();

        $('#InputImageSettings').change(() => {
            check();
        })

        function check() {
            if(fileInput.files.length == 0) {
                $( "#btn-update-image" ).prop( "disabled", true );
            } else {
                $( "#btn-update-image" ).prop( "disabled", false );
            }
        }
        
});