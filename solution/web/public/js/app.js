$(function(){
    $("#phone").mask("8(999) 999-9999");
    $("#date").mask("99.99.9999");

    $.contextMenu({
        selector: '.context-menu-cancel',
        callback: function(key, options) {
            window.location.href = $(this).data('workflow')
        },
        items: {
            "cancel": {name: "Отменить"},
        }
    });

    $.contextMenu({
        selector: '.context-menu-finish',
        callback: function(key, options) {
            window.location.href = $(this).data('workflow')
        },
        items: {
            "finish": {name: "Завершить"},
        }
    });
});
