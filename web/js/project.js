var Update = {
    
    createUpdate: function (title, content) {
        var persistLink = $('#add-update').attr('data-add-update-url');

        $.ajax({
            type: 'POST',
            url: persistLink,
            data: {
                "action" : "create",
                "title" : title,
                "content" : content
            },
            dataType: "json",
            success: function (data) {

                Update.addUpdateToDom(data.id, data.title, data.content, data.createdat);
                Update.reset();
            }
        });
    },
        
    addUpdateToDom: function(id, title, content, createdat) {
        var updateBlock = '<div class="updates-timeline-block info">' + 
            '<div class="updates-timeline-img">' + 
                '<div class="timeline-icon"></div>' + 
            '</div>' + 
            '<div class="updates-timeline-content">' + 
                    '<date>' + createdat + '</date>' +
                    '<h4>' + title + '</h4>' +
                    '<p>' + content + '</p>' +
                '</div>' +
            '</div>';
        
        $('#updates-timeline').prepend(updateBlock);
    },
    
    reset: function() {
        $('#add-update-title').val("");
        $('#add-update-content').val("");
    }
}

var Project = {

    init: function () {
        this.initMap();
        this.checkIfNew();
        this.initUpdates();
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
        
    },
    
    initUpdates: function() {
        
        $('#add-update-button').on('click', function() {
            var title = $('#add-update-title').val();
            var content = $('#add-update-content').val();
            
            Update.createUpdate(title, content);
            
        });
    }
}

$(document).ready(function() {
    Project.init();
    
    $("#project-nav li").click(function(e){
        if (!$(this).hasClass("active")) {
            
            var tabNum = $(this).index();
            
            $("#project-nav li.active").removeClass("active");    
            $(this).addClass("active");

            $(".project-detail.active").removeClass("active");
            $($(".project-detail")[tabNum]).addClass("active")
        }
    });
});