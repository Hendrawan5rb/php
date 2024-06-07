// jQuery(document) OR :
$(document).ready(function () {

    var total = $('#total').val();
    var hal = 1;

    function prevnext() {
        if (hal == total) {
            $('#next').hide();
        } else {
            $('#next').show();
        }

        if (hal == 1) {
            $('#previous').hide();
        } else {
            $('#previous').show();
        }
    }

    prevnext();

    $('#keyword').on('keyup', function () {

        // $('#container').load('src/komik.php?keyword=' + $('#keyword').val());

        $.get('src/komik.php?keyword=' + $('#keyword').val(), function (data) {
            $('#container').html(data);

            total = $('#total').val();
            hal = 1;

            prevnext();
        });

    });

    $(document).on('click', '.page', function (event) {
        event.preventDefault();

        hal = $(this).attr('page');

        $.get('src/komik.php?keyword=' + $('#keyword').val() + '&page=' + $(this).attr('page'), function (data) {
            $('#container').html(data);

            prevnext();
        });

    });

    $(document).on('click', '#previous', function (event) {
        event.preventDefault();

        hal = hal - 1;

        $.get('src/komik.php?keyword=' + $('#keyword').val() + '&page=' + hal, function (data) {
            $('#container').html(data);

            prevnext();
        });
    });

    $(document).on('click', '#next', function (event) {
        event.preventDefault();

        hal = hal + 1;

        $.get('src/komik.php?keyword=' + $('#keyword').val() + '&page=' + hal, function (data) {
            $('#container').html(data);

            prevnext();
        });
    });

});