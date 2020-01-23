$(function(){
    // Set up the number formatting.
    $('.getNumber').on('change',function(){
        console.log('Change event.');
        var val = $('.getNumber').val();

    });

    $('.getNumber').number( true, 0 );

});