<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
        <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>

  <script src="https://336265.ru/jquery/jquery-latest.min.js" type="text/javascript"></script>

  </head>
  <body>
    <div id="map"></div>


<script>



</script>


    <script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 6
  });
  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };


//$.post("https://maps.google.com/maps/api/geocode/xml?latlng="+position.coords.latitude+","+position.coords.longitude+"&sensor=false", function( data ) {
//  var xmlDoc = $.parseXML(data);
//  console.log(xmlDoc);
//});

    $.ajax({
        type: "POST",
        url: "https://maps.google.com/maps/api/geocode/xml?latlng="+position.coords.latitude+","+position.coords.longitude+"&sensor=false",
        dataType: "xml",
        success: xmlParser
    });

function xmlParser(xml) {
  var count_parser=0;
  $(xml).find("address_component").each(function () {
    count_parser=count_parser+1;
    var page_url = $(this).find('long_name').text();
    if (count_parser==3) {
      alert(page_url);  
    }   
  });
}    

console.log("https://maps.google.com/maps/api/geocode/xml?latlng="+position.coords.latitude+","+position.coords.longitude+"&sensor=false");


      infoWindow.setPosition(pos);
      infoWindow.setContent('Вы находитесь примерно здесь.');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });

  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC59V-WlsRQSk0LbFvqnQhT1SXbphNkg7k&signed_in=true&callback=initMap" async defer></script>

  </body>
</html>