$(document).ready(function () {
    new google.maps.places.Autocomplete(
            (document.getElementById('project-location')), {
        types: ['geocode']
    });

    $('#project-category_id').change(function () {
        console.log("yo");
        console.log($("#project-category_id input[type='radio']:checked").val());
        $("#project-category_id input[type='radio']:not(:checked)").parent().removeClass("category-is-selected");
        $("#project-category_id input[type='radio']:checked").parent().addClass("category-is-selected");
    });  

});