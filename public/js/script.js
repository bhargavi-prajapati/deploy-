var map;
var myLatLng;
$(document).ready(function() {
    geoLocationInit();
});
    function geoLocationInit() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Browser not supported");
        }
    }

    function success(position) {
        console.log(position);
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;
        myLatLng = new google.maps.LatLng(latval, lngval);
        createMap(myLatLng);
        // nearbySearch(myLatLng, "school");
        searchMechanicshop(latval,lngval);
    }

    function fail() {
        alert("it fails");
    }
    //Create Map
    function createMap(myLatLng) {
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });
    }
    //Create marker
    function createMarker(latlng, icn, name) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: icn,
            title: name
        });
    }
   
    function searchMechanicshop(lat,lng){
        $.post('http://localhost/api/searchMechanicshop',{lat:lat,lng:lng},function(match){
            // console.log(match);
            $('#shopsResult').html('');

            $.each(match,function(i,val){
                var slatval=val.lat;
                var slngval=val.lng;
                var sname=val.name;
                var SLatLng = new google.maps.LatLng(slatval, slngval);
                var sicn= 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                createMarker(SLatLng,sicn,sname);
                var html='<h5><li>'+sname+'</li></h5>';
                $('#shopssResult').append(html);
            });

              // $.each(match, function(i, val) {
              //   console.log(val.name);
              // });
        });
    }

    $('#searchMechanicshop').submit(function(e){
       e.preventDefault();
        var val=$('#locationSelect').val();
        $.post('http://localhost/api/getLocationCoords',{val:val},function(match){

            var myLatLng = new google.maps.LatLng(match[0],match[1]);
            createMap(myLatLng);
            searchMechanicshop(match[0],match[1]);
        });
    });
