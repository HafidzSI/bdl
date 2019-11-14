       var markersDua = [];
    var arraykota2=[];
    var infowindow;
    var infoDua=[];
    var markers = [];
    var circles = [];    
    var pos ='null';
    var harga;
    var map;
    var jenis;
    var id2;
    var id;
    var total=0;
    var rad;
    var markersDua;
    var directionsDisplay;
    var centerBaru;
    var centerLokasi;
    var cekRadiusStatus = "off";  
    var countdua    = 0;
    var server = 'http://localhost/contoh5/';
        function basemap()
        {
            map = new google.maps.Map(document.getElementById('map'), 
                {
                  zoom: 16,
                  center: new google.maps.LatLng(-0.9154335, 100.4609481),
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              });
        }
		function aktifkanGeolocation(){    

    navigator.geolocation.getCurrentPosition(function(position) {
  
      pos = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
      };
        marker = new google.maps.Marker({
      position: pos,
      map: map,
      animation: google.maps.Animation.DROP,
      });
        centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
      markers.push(marker);
      infowindow = new google.maps.InfoWindow({
      position: pos,
      content: 'Anda Disini'
      });
      infowindow.open(map, marker);
      map.setCenter(pos);
    }); 
    
  }
  
  function carikategori()
	{

		$('#resultCari').remove();
		$('#resultinfo').remove();
		//hapusInfo();
		//clearroute2();
		//clearmarker();
		kategorirm=kategori_rm.value;
		$.ajax({ 
	      url: server+'carikategorirm.php?kategori_rm='+kategorirm, data: "", dataType: 'json', success: function(rows)
	        { 
	        	if(rows==null)
	        	{
	        		alert('Data Tidak Ada');
	        	}
	        for (var i in rows) 
	          {   
	            var row     = rows[i];
	            var rm_id   = row.rm_id;
	            var rm_nama   = row.rm_nama;
	            var latitude  = row.latitude ;
	            var longitude = row.longitude ;
	            centerBaru = new google.maps.LatLng(latitude, longitude);
	            marker = new google.maps.Marker
	            ({
					position: centerBaru,
					map: map,
					animation: google.maps.Animation.DROP,
				});
	            console.log(latitude);
	            console.log(longitude);
	            markersDua.push(marker);
	            map.setCenter(centerBaru);
	            $('#hasilCari').append("<div id='resultCari'>");
	            $('#resultCari').append("<button class='btn btn-success btn-lg' style='width:100%' onclick='detail_tp(\""+rm_id+"\")' >"+rm_nama+"</button>");
	            $('#hasilCari').append("</div>");
	          } 
	         
	        }
	      }); 
	}
  