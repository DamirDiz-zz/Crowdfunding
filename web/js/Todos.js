$(document).ready(function () {
    
            console.log("yos");

           
    $('.todo-list-entry').each(function() {
        console.log("genau")
        var todo = $(this).attr("data-content");
        var textelement = $(this).find('.todo-text');
        
        textelement.text(todo);
        console.log(todo);
    });
    
});