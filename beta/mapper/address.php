<!DOCTYPE html>
<html> 
<head> 
   <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
   <title>Google Maps Geocoding Demo 1</title> 
   <script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> 
   <style type="text/css">
   	body {
		margin: 0px;	
	}
   </style>
</head> 
<body> 
   <div id="map" style="position: absolute; width: 100%; height: 100%;"></div> 

<script type="text/javascript"> 

	//var addresses = "2929 Ponderosa Dr. Concord, CA";
	<?php
		$i = 1;
		$file = "ades.txt";
		$lines = file($file);
		
		echo "var locations = [\n";
		
		foreach($lines as $line_num => $line)
		{
			$ostr = $line;
			$order   = array("\r\n", "\n", "\r");
			$replace = "";

			// Processes \r\n's first so they aren't converted twice.
			$line = str_replace($order, $replace, $ostr);
			echo "[$line],\n";
			$i++;
		}
		echo "];";
	?>

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(37.933308,-122.056494),
      mapTypeId: google.maps.MapTypeId.HYBRID
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		title: locations[i][0],
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
	</script>
</body> 
</html> 