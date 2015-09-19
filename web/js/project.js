var Project = {

    init: function () {
        this.initMap();
    },
    
    initMap: function() {
        console.log("init dat hoe");
        
        var title = $('#map').attr('location');
        var latitude = $('#map').attr('lat');
        var longitude = $('#map').attr('lng');
        var location = {lat: parseFloat(latitude), lng: parseFloat(longitude)};
        
        var map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                scrollwheel: false,
                zoom: 16
            });
        
        var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: title
            });
    }
}

$(document).ready(function() {
Project.init();
        });