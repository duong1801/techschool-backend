import { validate } from './validate';
var simplemde = new SimpleMDE({ element: $("#modal-md")[0] });
$(document).ready(function() {
    function getData() {
        let array = $('.modal-body form').serializeArray();
        let data = array.reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj
        }, {});
        data.description = simplemde.value();
        return data
    }

    function showModal(duration) {
        $(".modal").fadeIn(duration);
    }

    function hideModal(duration) {
        $(".modal").fadeOut(duration);
    }

    function createElment(value, name) {
        $(".form-select-create").append(`<option selected value="${value}">${name}</option>`);
    }

    function resetValue() {
        let inputs = $('.modal-body form input');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = ''
        }
        simplemde.value('');
    }

    function postDataByAjax(getData, url) {
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
                hideModal(500);
                toastr.success(response.message)
                createElment(response.data.value, response.data.name)
                resetValue()
            },
            error: function(request, status, error) {
                toastr.error('Có lỗi xảy ra, vui lòng kiểm tra lại')
            }
        });
    }

    //show modal
    $("#btn_open_modal").click(function() {
            showModal(700)

        })
        //hide modal
    $(".btn_close").click(function() {
            hideModal(700)

        })
        //post data
    $(".btn_submit").click(function() {
        //set deafaul validate
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid",
            ignore: '*:not([name])',
        });
        validate(".modal_form")
        var valid = $(".modal_form").valid()
        if (valid) {
            let url = $(this).attr('data-action');
            postDataByAjax(getData, url)
        }
    })
});