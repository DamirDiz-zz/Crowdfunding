$(document).ready(function () {
    
    $('.todo-list-entry').each(function() {
        $(this).find('.todo-text').text($(this).attr("data-todo-content"));
    });
    
    $('.todo-text').on('click', function() {
        if ($(this).find('input').length === 0) {
           
            var text = $(this).parent().attr("data-todo-content");

           
            var newInput = $('<input value="' + text + '">');
            $(this).empty();
            $(this).append(newInput);
            newInput.focus();
        }
    });
    
});