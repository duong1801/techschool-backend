$(document).ready(function() {
    $(".js-example-templating").select2({
        theme: "classic",
        tags: true,
        placeholder: "Vui lòng chọn",
        allowClear: true
    });
    $(".select2-search__field").css({
        "height": "85%",
        "padding-left": "5px"
    });
});