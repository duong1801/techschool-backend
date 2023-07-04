$(document).ready(function() {
    $(".js-example-templating").select2({

        matcher: function(params, data) {

            if ($.trim(params.term) === '') {
                return data;
            }


            if (typeof data.text === 'undefined') {
                return null;
            }


            if (data.text.indexOf(params.term) > -1) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.text;

                return modifiedData;
            }


            return null;
        }
    });
    $('.js-example-templating').on('change', function() {
        $('.customCheck').find('input').removeAttr('checked')
        var student_id = $(this).val()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/getIdCourse',
            type: "POST",
            data: {
                student_id: student_id
            },
            success: function(response) {

                if (response.length > 0) {
                    $.each(response, function(index, elment) {
                        $('.customCheck').find('input[value="' + elment + '"]').attr('checked', 'checked')
                    })
                }
            },
        });
    })
});