export { validate };

function validate(form) {
    $(form).validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            name: {
                required: true,

            },
            slug: {
                required: true,

            },
            thumbnail: {
                required: true,
            },
            price: {
                required: true,
                number: true
            },
            discount: {
                required: true,
                number: true
            },
            teacher_id: {
                required: true,
            },
            category_id: {
                required: true,
            },
            course_id: {
                required: true,
            }
        },

    });
}