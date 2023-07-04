import { validate } from '../general/validate';
$(document).ready(function() {
    $(".form-select-course").change(function() {
        var course_id = $(this).val();
        if (course_id == 0) {
            $(".form-select-module").empty();
            $(".form-select-module").append(`<option selected >Chọn nhóm bài học</option>`)
        } else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/GetModuleByAjax',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: course_id
                },
                success: function(response) {

                    $(".form-select-module").empty();

                    $.each(response.data, function(key, value) {
                        $(".form-select-module").append(`<option selected value="${value.id}">${value.name}</option>`)
                    });

                },
            });
        }

    })

    var editorCourse = new SimpleMDE({ element: $("#modal-md-course")[0] });
    var editorModule = new SimpleMDE({ element: $("#modal-md-module")[0] });


    function getDataFormCourse() {
        let array = $('.modal_form_course').serializeArray();
        let data = array.reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj
        }, {});
        data.description = editorCourse.value();
        return data;
    }

    function getDataFormModule() {
        let array = $('.modal_form_module').serializeArray();
        let data = array.reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj
        }, {});
        data.description = editorModule.value();

        return data;
    }

    function showModal(selector, duration) {
        $(selector).fadeIn(duration);
    }

    function hideModal(duration) {
        $('.modal').fadeOut(duration);
    }

    function createElment(value, name, selector) {
        $(selector).append(`<option selected value="${value}">${name}</option>`);
    }

    function resetValue() {
        let inputs = $('.modal-body form input');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = ''
        }
        editorCourse.value('');
        editorModule.value('');
    }

    function postDataByAjax(getData, url, selector) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: "POST",
            dataType: 'JSON',
            data: getData(),
            success: function(response) {
                hideModal(selector, 500);
                toastr.success(response.message)
                createElment(response.data.value, response.data.name, selector)
                resetValue()
            },
            error: function(request, status, error) {
                toastr.error('Có lỗi xảy ra, vui lòng kiểm tra lại')
            }
        });
    }

    //show modal
    $("#btn_open_modal").click(function() {
        showModal('.modal-course', 700)
    })

    $("#open-modal-module").click(function() {

        showModal('.modal-module', 700)
    })

    //hide modal
    $(".btn_close").click(function() {
        hideModal('.modal', 700)
    })

    //post data
    $(".btn_submit_course").click(function() {
        getDataFormCourse()
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid",
            ignore: '*:not([name])',
        });
        validate(".modal_form_course")
        var valid = $(".modal_form_course").valid()
        if (valid) {
            let url = $(this).attr('data-action');
            postDataByAjax(getDataFormCourse, url, '.form-select-course')
        }
    })
    $(".btn_submit_module").click(function() {
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid",
            ignore: '*:not([name])',
        });
        validate(".modal_form_module")
        var valid = $(".modal_form_module").valid()
        if (valid) {
            let url = $(this).attr('data-action');
            postDataByAjax(getDataFormModule, url, '.form-select-module')
        }
    })
})