<?php // index.php
require_once 'openid.php';
$openid = new LightOpenID("localhost");

$openid->identity = 'https://www.google.com/accounts/o8/id';
$openid->required = array(
  'namePerson/first',
  'namePerson/last',
  'contact/email',
);
$openid->returnUrl = 'http://localhost/ukMap/login'
?>

<a href="<?php echo $openid->authUrl() ?>">Login with Google</a>
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      .container { height: 100%}
      #map-canvas { height: 60% }
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEmOv-nBArHrcFBLXpG75LqA763iVBp4k">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(29.745841, 79.931897),
          zoom: 10
		  //mapTypeIds: Array("TERRAIN","HYBRID","ROADMAP","SATELLITE")
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
			
		var marker = new google.maps.Marker({
			position: map.getCenter(),
			map: map,
			title: 'Kunalta'
		  });
		google.maps.event.addListener(marker, 'click', function() {
			map.setZoom(map.getZoom()+1);
			map.setCenter(marker.getPosition());
		  });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div id="map-canvas"></div>
	<div style="height:40%;background-color:#23F454"></div>
