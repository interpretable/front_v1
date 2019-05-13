$(document).ready(function () {
    // Init materialize Js features
    $('.collapsible').collapsible();
    $('.modal').modal();
    $('select').formSelect();



    // TABLE PREVIEW
    var zones = 0;
    var form = "#form";


    // Gets value form changed input and calls readURL
    $(document).on('change', '#imgInp', function () {
        console.log('ON CHANGE INPUT');
        console.log($(this).data('id'));
        readURL(this, $(this).data('id'));
    });

    // Add Zones
    $('.btn_add_zone').click(function () {
        
        switch (zones) {
            case 0:
                $('.zones').append('<div class="zone zone1"></div>');
                $('.zone1').addClass('w100 h100');
                formGen('.zone1', 'zone1');
                zones = 1;
                break;
            case 1:
                $('.zones').append('<div class="zone zone2"></div>');
                $('.zone1').addClass('h50');
                $('.zone2').addClass('h50');
                formGen('.zone2', 'zone2');
                zones = 2;
                break;
            case 2:
                $('.zones').append('<div class="zone zone3"></div>');
                $('.zone1').addClass('h25');
                $('.zone2').addClass('h25');
                $('.zone3').addClass('h50');
                formGen('.zone3', 'zone3');
                zones = 3;
                break;
            case 3:
                $('.zones').append('<div class="zone zone4"></div>');
                $('.zone3').addClass('w50 left');
                $('.zone4').addClass('w50 h50 left');
                formGen('.zone4', 'zone4');
                zones = 4;
                break;
        }
    });

    // Delete Zones
    $('.btn_delete_zone').click(function () {
        switch (zones) {
            case 4:
                $('.zone4').remove();
                $('.zone3').removeClass('w50 left');
                zones = 3;
                break;
            case 3:
                $('.zone3').remove();
                $('.zone2').removeClass('h25');
                $('.zone1').removeClass('h25');
                zones = 2;
                break;
            case 2:
                $('.zone2').remove();
                $('.zone1').removeClass('h50');
                zones = 1;
                break;
            case 1:
                $('.zone1').remove();
                zones = 0;
                break;
        }

    });


    // Appends the default form
    function formGen(zoneClass, zoneName) {
        $(zoneClass).append("<img id='" + zoneName + "' src='#' alt='Image' />");
        $(form).append("<input name='"+zoneName+"' type='file' id='imgInp' data-id='" + zoneName + "' />");
        console.log('click');
    }

    // Gets the file in the input and appends a base 64 image in html
    function readURL(input, zoneName) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                console.log('test');
                $('#' + zoneName).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

});
