$(function() {
    $('#description').on('show.bs.collapse', function() {
        $('#filler').hide();
    });

    // set onclick events
    $('#ratable').find('a').each(function() {
        $(this).click(function(ev) {
            ratePlace($(this).data('rate'));
        });

        // highlight the stars when hovered upon
        $(this).hover(function() {
            $(this).prevAll().each (function() {
                $(this).find('span').first().removeClass('glyphicon-star-empty').addClass('glyphicon-star');
            });
            $(this).find('span').first().removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        },
        function() {
            $(this).prevAll().each (function() {
                $(this).find('span').first().removeClass('glyphicon-star').addClass('glyphicon-star-empty');
            });
            $(this).find('span').first().removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        });
    });
});

// ajax to update the rating
var ratePlace = function (rate) {
    var token = $('input[name=csrf_hh]').val();
    var rate_url = $('input[name=rate_url]').val();
    var id = $('input[name=place_id]').val();

    $.ajax({
        type: "POST",
        url: rate_url,
        data: { csrf_hh: token, place_id: id, rate: rate  },
    })
    .done(function () {
        $('#ratable').remove();
        // TODO: Update the actual rating?
    });
};

