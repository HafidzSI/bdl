<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='initial-scale=1.0, user-scalable=no' /><style type='text/css'> 
html { height: 100%;width: 100% } 
body { height: 100%; width: 100%; margin: 0px; padding: 0px }
#map { height: 100%; width: 100% }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh7Xfdh42Ro9CNFPkvoZhFVhEpTeOP16g"></script>
</script>
<script src='http://code.jquery.com/jquery-1.11.0.min.js' type='text/javascript'>
</script> 
<? 
$lat = -0.305441; 
$lng = 100.3692; 

$id = $_GET["id"];

// $rad = $_GET["rad"];  

?> 
<script type='text/javascript'> 
var map;
var ip_mobile="http://10.44.7.138/ta_hausa/mobile/";
var server = "http://10.44.7.138/ta_hausa/mobile/";
//var ip="http://10.44.7.31/t2-eng/";
var markersDua = [];

var waypts=[];
var arraykota=[]; 

  function init(){
    console.log("init jalan");
    var latlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>); 
    var myOptions = { 
      zoom:14, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
      map = new google.maps.Map(document.getElementById('map'), myOptions);     
     var total=0;

     //rute(ab)
    while(arraykota.length>0){
      arraykota.pop();
    }
    while(waypts.length>0){
      waypts.pop();
    }
    $.ajax({ 
//      console.log(server+'rutepaket.php?id_package='+<?php echo $id; ?>);
      url: server+'rutepaket.php?id_package='+<?php echo $id; ?>, data: "", dataType: 'json', success: function(rows)
        { 
        for (var i in rows){   
          total=total+1;
          var row     = rows[i];
          var serial_number   = row.serial_number;
          var id_tourism   = row.id_tourism;
          var id_restaurant   = row.id_restaurant;
          var id_souvenir   = row.id_souvenir;            
          var id_workship_place  = row.id_workship_place;
          //var longitude = row.longitude ;
          //var longitude = row.longitude ;
          centerBaru      = new google.maps.LatLng(row.latitude, row.longitude);
          arraykota.push(centerBaru);       
          map.setZoom(15);          
        }
            //calcDire();      
            var directionsService = new google.maps.DirectionsService;
            directionsDisplay = new google.maps.DirectionsRenderer;
            for (var x = 1; x < arraykota.length-1;x++){
              // console.log("aaa");
              waypts.push({
                location:arraykota[x],
                stopover:true
              }) 
            }

            directionsDisplay.setMap(map);
            directionsService.route({
                origin: arraykota[0],
                destination: arraykota[arraykota.length-1],
                waypoints: waypts,
                optimizeWaypoints: true,
                travelMode: google.maps.TravelMode.DRIVING
              }, function(response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                  directionsDisplay.setDirections(response);
                  var route = response.routes[0];
              } 
            });

        }
      }); 


    }

  
</script>
</head>
<body onload='init()'> 
<div id='map'></div>
</body>
</html>

