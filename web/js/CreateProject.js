$(document).ready(function () {
    var autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('project-formattedaddress')), {
        types: ['geocode']
    });
    
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      
      $('#project-longitude').val(place.geometry.location.lng());
      $('#project-latitude').val(place.geometry.location.lat());
      $('#project-location').val(place.name);
      $('#project-placeid').val(place.place_id);
      
    });

    $('#project-category_id').change(function () {
        console.log("yo");
        console.log($("#project-category_id input[type='radio']:checked").val());
        $("#project-category_id input[type='radio']:not(:checked)").parent().removeClass("category-is-selected");
        $("#project-category_id input[type='radio']:checked").parent().addClass("category-is-selected");
    });  
    
});