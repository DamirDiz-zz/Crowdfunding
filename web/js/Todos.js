$(document).ready(function () {
    
    $('.todo-list-entry').each(function() {
        $(this).find('.todo-text').text($(this).data("todo-content"));
    });
    
    $(document).on("click", ".todo-icon-edit", function() {
        var button = $(this);
        var todoobject = button.parent().parent();
        var editmode = todoobject.data("todo-edited");
        
        if (editmode === 0) {
            todoobject.data("todo-edited", 1);
            
            var textdiv = todoobject.find(".todo-text");
            var todotext = todoobject.data("todo-content");
            var newInput = $('<textarea>' + todotext + '</textarea>');
            
            textdiv.empty();
            textdiv.append(newInput);

            newInput.focus();

            button.removeClass("todo-icon-edit");
            button.addClass("todo-icon-confirm");
        } 
    });
    
    $(document).on("click", ".todo-icon-confirm", function() {
        var button = $(this);
        var todoobject = button.parent().parent();
        var editmode = todoobject.data("todo-edited");
        
        if (editmode === 1) {
            todoobject.data("todo-edited", 0);
            
            var textdiv = todoobject.find(".todo-text");
            var inputtext = textdiv.find('textarea').val();
            todoobject.data("todo-content", inputtext);
            
            textdiv.empty();
            textdiv.text(inputtext);

            button.removeClass("todo-icon-confirm");
            button.addClass("todo-icon-edit");
        } 
    });
    
});