function initMap() {
    var uluru = {lat: lat, lng: lng};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 20,
        center: uluru
        });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
        });
    }
