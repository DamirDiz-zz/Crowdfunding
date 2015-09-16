$(document).ready(function () {
    new google.maps.places.Autocomplete(
            (document.getElementById('project-location')), {
        types: ['geocode']
    });
});