var Project = {

    init: function () {
        this.initMap();
        this.checkIfNew();
    },
    
    initMap: function() {
        var title = $('#map').attr('location');
        var latitude = $('#map').attr('lat');
        var longitude = $('#map').attr('lng');
        var location = {lat: parseFloat(latitude), lng: parseFloat(longitude)};
        
        
        var map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                scrollwheel: false,
                zoom: 16,
                disableDefaultUI: true,
                styles: [{"featureType":"landscape","stylers":[{"hue":"#FFA800"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#53FF00"},{"saturation":-73},{"lightness":40},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FBFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#00FFFD"},{"saturation":0},{"lightness":30},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00BFFF"},{"saturation":6},{"lightness":8},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#679714"},{"saturation":33.4},{"lightness":-25.4},{"gamma":1}]}]
        });
        
        var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: title
            });
    },
    
    checkIfNew: function() {
        var isNew = $('#project').data('project-new');
        
        if (isNew === 1) {
            $('#project-created-modal').modal('show')
        }
        
    }
}

$(document).ready(function() {
    Project.init();
});