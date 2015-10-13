var Todos = {
    init: function () {
        $(".todo-list-entry").each(function () {
            $(this).find(".todo-text").text($(this).data("todo-content"));
        });

        $(".todo-list-add").on("click", function () {
            Todos.createTodo();
        });

        $(document).on("click", ".todo-icon-edit", function () {
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

        $(document).on("click", ".todo-icon-confirm", function () {
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

        $(document).on("click", ".todo-icon-delete", function () {
            Todos.deleteTodo($(this).parent().parent());
        });
    },
    
    createTodo: function () {
        var url = $('#todo-list').attr('data-todo-action-url');

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                "action" : "create"
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                Todos.addTodo(data.id, data.content);
            }
        });
    },
    
    addTodo: function (id, content) {
        var addblock = '<div class="todo-list-entry" data-todo-id="' + id + '" data-todo-content="' + content + '" data-todo-edited="0">' +
                '<div class="todo-icon"></div>' +
                '<div class="todo-text">' + content + '</div>' +
                '<div class="todo-action pull-right">' +
                '<div class="todo-icon-edit"></div>' +
                '<div class="todo-icon-delete"></div>' +
                '</div>' +
                '</div>';

        $('#todo-list-items').append(addblock);
    },
    
    deleteTodo: function (todoobject) {
        var url = $('#todo-list').attr('data-todo-action-url');

        var todoid = todoobject.attr("data-todo-id");
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                "action" : "delete",
                "todoid" : todoid
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                todoobject.remove();
            }
        });
    },
    removeTodo: function () {
        
        //var button = $(this);
        //    var todoobject = button.parent().parent();

        //    todoobject.remove();
    }
    
    
}
$(document).ready(function () {
    Todos.init();
});


