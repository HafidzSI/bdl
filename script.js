var server = "http://localhost/wisatasumbar/";
    var map;
    var markersDua = [];
    var markersDkt = [];
    var centerBaru;
    var koordinat = null;
    var infoposisi= [];
    var centerLokasi;
    var markerposisi = [];
    var infoDua = [];
    var hapusMarkersDkt = [];
    var circles = [];
    var directionsDisplay = null;

function init()
{
  basemap();
  tampilanobjek();
  tampildigit();
  tampildigitrm();
  tampildigit();
  tampildigitsov();
  tampildigitmas();
  tampildigitrav();
  cityTampil();
}

function cityTampil(gid)
  {
    city = new google.maps.Data();
    city.loadGeoJson(server+'city.php');
    city.setStyle(function(feature)
    {
      var gid = feature.getProperty('id');
      if (gid == '1'){ color = '#B8860B' 
        return({
      fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpadistrict:0.3,
          clickable: false
        });
    }
      else if(gid == '2'){ color = '#ADD8E6' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpadistrict:0.3,
          clickable: false
        });
    }
      else if(gid == '3'){ color = '#FF69B4' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpadistrict:0.3,
          clickable: false
        });

    }
      else if(gid == '4'){ color = '#008000' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpadistrict:0.3,
          clickable: false
        });

    }else if(gid == '5'){ color = '#663399' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpadistrict:0.3,
          clickable: false
        });

    }else if(gid == '6'){ color = '#8B008B' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpadistrict:0.3,
          clickable: false
        });

    }else if(gid == '7'){ color = '#FFD700' 
        return({
        fillColor:color,
          strokeWeight:2.0,
          strokeColor:'black',
          fillOpadistrict:0.3,
          clickable: false
        });

    }
        
    });
    city.setMap(map);
  }

function posisisekarang()
{
  hapusmarker();
  google.maps.event.clearListeners(map, 'click');
  navigator.geolocation.getCurrentPosition(function(position)
  {
    koordinat = {
    lat: position.coords.latitude,
    lng: position.coords.longitude
    };
      
    centerBaru = new google.maps.LatLng(koordinat.lat, koordinat.lng);
    map.setCenter(centerBaru)
    map.setZoom(10);
    var marker =  new google.maps.Marker({
                  position: koordinat,
                  animation: google.maps.Animation.DROP,
                  map: map
                  });

    infowindow = new google.maps.InfoWindow({
    position: koordinat,
    content: "<center><a style='color:black;'>You are here <br> lat : "+koordinat.lat+" <br> long : "+koordinat.lng+"</a></center>"  
    });
    infowindow.open(map, marker);

    markersDua.push(marker);
    infoposisi.push(infowindow);
    map.setCenter(centerBaru);
  });
}

function lokasimanual()
{
  alert('Click map');
  hapusmarker();
  map.addListener('click', function(event)
  {
    // hapusmarker();
		addMarker(event.latLng);
  });
}
      
function addMarker(location)
{
  for (var i = 0; i < markerposisi.length; i++) 
  {
  markerposisi[i].setMap(null);
  } 

  marker = new google.maps.Marker({
  //icon: "assets/img/biru1.ico",
  position : location,
  map: map,
  animation: google.maps.Animation.DROP,
  });
      
  koordinat = {
  lat: location.lat(),
  lng: location.lng()
  }

  centerLokasi = new google.maps.LatLng(koordinat.lat, koordinat.lng);
  markerposisi.push(marker);
  infowindow = new google.maps.InfoWindow();
  infowindow.setContent("<center><a style='color:black;'>You are here <br> lat : "+koordinat.lat+" <br> long : "+koordinat.lng+"</a></center>");
  infowindow.open(map, marker);
  usegeolocation=true;
  markerposisi.push(marker)
  infoposisi.push(infowindow);
    
  $.ajax({
  url: server+'tampilanobjek.php', data: "", dataType: 'json', success: function(rows)
  {
    if(rows==null)
    {
      alert('Tidak ada data');
    }
    else
    {
      for (var i in rows)
      {
        var row = rows [i];
        var nama = row.nama_tempat_wisata;
        var lat = row.latitude;
        var lon = row.longitude;
        centerBaru = new google.maps.LatLng(koordinat.lat,koordinat.lng);
        map.setCenter(centerBaru);
        map.setZoom(10);
        var marker =  new google.maps.Marker({
                      position: koordinat,
                      animation: google.maps.Animation.DROP,
                      map: map
                      });
        markersDua.push(marker);
        map.setCenter(centerBaru);
      }  
    }
  }
  });
}


function hapusmarker()
{
  for (var i = 0; i < markersDua.length; i++) 
  {
    markersDua[i].setMap(null);
  }
}


function basemap()
{
  map = new google.maps.Map(document.getElementById('map'), 
  {
    zoom: 8,
    center: new google.maps.LatLng(-0.3027606, 100.3632251),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
}

function tampilanobjek(gid)
{

  $.ajax({url: server+'tampilanobjek.php?gid='+gid, data: "", dataType: 'json', success: function(rows)
  {
    console.log('uyicj');
  
    if(rows==null)
    {--
      alert('Tidak ada data');
    }
    else
    {
      console.log(rows);
      hapusmarker();
      markersDua = [];
    for (var i in rows)
    {
      var row = rows [i];
      for (var x in row)
      {
      var row1 = row [x];
      var id = row1.id;
      // var id_souvenir = row.id;
      // var id_restaurant = row.id;
      // var id_tourism = row.id;
      // var id_workship_place = row.id;
      var name = row1.name;
      var status = row1.status;
      var lat = row1.latitude;
      var lon = row1.longitude;
      centerBaru = new google.maps.LatLng(lat,lon);
      map.setCenter(centerBaru);
      console.log(id);
      console.log(status);
      map.setZoom(10);
      var marker =  new google.maps.Marker({
                    position: centerBaru,
                    animation: google.maps.Animation.DROP,
                    map: map
                    });
      if (status ==4){
        klikInfoWindow_tw(id,marker);        
      } else if (status ==2) {
        klikInfoWindow_masjid(id,marker);        
      } else if (status ==3) {
        klikInfoWindow_rm(id,marker);        
      } else if (status ==1) {
        klikInfoWindow_souvenir(id,marker);        
      }

      markersDua.push(marker);
      map.setCenter(centerBaru);
    }
    }
    }
  },
  error: function(xmlHTTPrequest)
  {
    console.log(xmlHTTPrequest)
  }
  });
}

function tampilkantravel(id)
{
  $.ajax({url: server+'tampilkantravel.php?id='+id, data: "", dataType: 'json', success: function(rows)
  {
    console.log('uyicj');
  
    if(rows==null)
    {
      alert('Tidak ada data');
    }
    else
    {
      if(directionsDisplay){
        directionsDisplay.setMap(null);
      }
      hapusmarker();
      console.log(rows);
    for (var i in rows)
    {
      var row = rows [i];
      var id = row.id;
      var name = row.name;
      var lat = row.latitude;
      var lon = row.longitude;
      centerBaru = new google.maps.LatLng(lat,lon);
      map.setCenter(centerBaru);
      console.log(id);
     
      map.setZoom(18);
      var marker =  new google.maps.Marker({
                    position: centerBaru,
                    animation: google.maps.Animation.DROP,
                    map: map
                    });
      markersDua.push(marker);
      map.setCenter(centerBaru);

    
    }
    }
  },
  error: function(xmlHTTPrequest)
  {
    console.log(xmlHTTPrequest)
  }
  });
}

function hapusInfo() 
{
  for (var i = 0; i < infoDua.length; i++) 
  {
    infoDua[i].setMap(null);
  }
}

function tampildigit()
{
  digit = new google.maps.Data();
  digit.loadGeoJson(server+'digitasi.php');
  digit.setStyle(function(feature)
  {
    return ({
      fillColor:'#00ff7f',
      strokeweight:2,
      strokecolor:'green',
      fillOpacity:0.5,
      clickable: false
    });
  }
  );
  digit.setMap(map);
}

function tampildigitrm()
{
  digit = new google.maps.Data();
  digit.loadGeoJson(server+'digitasirm.php');
  digit.setStyle(function(feature)
  {
    return ({
      fillColor:'#800000',
      strokeweight:2,
      strokecolor:'green',
      fillOpacity:0.5,
      clickable: false
    });
  }
  );
  digit.setMap(map);
}

function tampildigitsov()
{
  digit = new google.maps.Data();
  digit.loadGeoJson(server+'digitasiindustri.php');
  digit.setStyle(function(feature)
  {
    return ({
      fillColor:'#20b2aa',
      strokeweight:2,
      strokecolor:'green',
      fillOpacity:0.5,
      clickable: false
    });
  }
  );
  digit.setMap(map);
}

function tampildigitmas()
{
  digit = new google.maps.Data();
  digit.loadGeoJson(server+'digitasimasjid.php');
  digit.setStyle(function(feature)
  {
    return ({
      fillColor:'#ffff66',
      strokeweight:2,
      strokecolor:'green',
      fillOpacity:0.5,
      clickable: false
    });
  }
  );
  digit.setMap(map);
}

function tampildigitrav()
{
  digit = new google.maps.Data();
  digit.loadGeoJson(server+'digitasitravel.php');
  digit.setStyle(function(feature)
  {
    return ({
      fillColor:'#ff0000',
      strokeweight:2,
      strokecolor:'green',
      fillOpacity:0.5,
      clickable: false
    });
  }
  );
  digit.setMap(map);
}

function caritempatwisata()
{
  $('#hasilcaritempat').empty();
  hapusInfo();
  hapusmarker();
  
  var car = document.getElementById('name').value;
  if(car.value=='')
  {
    alert("Fill The Input Column!");
  }
  else
  {
    $.ajax({ 
        url: server+'caritempatwisata.php?name='+car, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('There is no tourism');
            }
            else
          {
             $('#hasilcaritempat').append("<thead><th>Nama</th><th colspan='2'>Aksi</th></thead>");
          for (var i in rows) 
          {   
            var row         = rows[i];
            var id  = row.id;
            var name  = row.name;
            var latitude      = row.latitude ;
            var longitude     = row.longitude ;
            centerBaru        = new google.maps.LatLng(latitude, longitude);
            marker = new google.maps.Marker
            ({
            icon: "assets/img/biru1.ico",
            position : centerBaru,  
            map: map,
            animation: google.maps.Animation.DROP,
            });

            markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(14);
            console.log(name);

             $('#hasilcaritempat').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detailtempatwisata(\""+id+"\")'>Detail</a></td><td><a role='button' class='btn btn-success' onclick='detailtempatwisata(\""+id+"\")'>Gallery</a></td></tr>");
          }
          }
        }
        }); 
    }
}

function carievent()
{
  $('#hasilcaritempat').empty();
  hapusInfo();
  hapusmarker();
  
  var car = document.getElementById('name_event').value;
  if(car.value=='')
  {
    alert("Fill The Input Column!");
  }
  else
  {
    $.ajax({ 
        url: server+'carievent.php?name='+car, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('There is No Event');
            }
            else
          {
             $('#hasilcaritempat').append("<thead><th>Nama</th><th colspan='2'>Aksi</th></thead>");
          for (var i in rows) 
          {   
            var row         = rows[i];
            var id  = row.id;
            var name  = row.name;
            var latitude      = row.latitude ;
            var longitude     = row.longitude ;
            centerBaru        = new google.maps.LatLng(latitude, longitude);
            marker = new google.maps.Marker
            ({
            icon: "assets/img/biru1.ico",
            position : centerBaru,  
            map: map,
            animation: google.maps.Animation.DROP,
            });

            markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(14);
            console.log(name);

             $('#hasilcaritempat').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detailevent(\""+id+"\")'>Detail</a></td></td><td><a role='button' class='btn btn-success' onclick='gallery(\""+id+"\")'>Gallery</a></td></tr>");
          }
          }
        }
        }); 
    }
}

function caripaket()
{
  $('#hasilcaritempat').empty();
  hapusInfo();
  hapusmarker();
  
  var car = document.getElementById('nama_paket').value;
  if(nama_paket.value=='')
  {
    alert("Fill The Input Column!");
  }
  else
  {
    $.ajax({ 
        url: server+'caripaket.php?name='+car, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('There is No Package');
            }
            else
          {
            
          for (var i in rows) 
          {   
            var row = rows[i];
            var id  = row.id;
            var id_travel  = row.id_travel;
            var name  = row.name;
            var price = row.price;
            console.log(name);

             $('#hasilcaritempat').append("<tr><td>"+name+"</td><td>"+price+"</td><td><a role='button' class='btn btn-success fa fa-road' title='route' onclick='rute(\""+id+"\");tampilanobjek(\""+id+"\");'></a></td><td><a role='button' class='btn btn-success fa fa-envelope' title='booking' href='#modalbooking' data-toggle='modal' onclick='booking(\""+id+"\",\""+price+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery(\""+id+"\")'></a></td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showdetpackage(\""+id+"\")'></a></td></tr>");
          }
          }
        }
        }); 
    }
}
// untuk index.php
function caripaket1()
{
  $('#hasilcaritempat').empty();
  hapusInfo();
  hapusmarker();
  
  var car = document.getElementById('nama_paket').value;
  if(nama_paket.value=='')
  {
    alert("Fill The Input Column!");
  }
  else
  {
    $.ajax({ 
        url: server+'caripaket.php?name='+car, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('There is No Package');
            }
            else
          {
            
          for (var i in rows) 
          {   
            var row = rows[i];
            var id  = row.id;
            var id_travel  = row.id_travel;
            var name  = row.name;
            var price = row.price;
            console.log(name);

             
             $('#hasilcaritempat').append("<tr><td>"+name+"</td><td>"+price+"</td><td><a role='button' class='btn btn-success fa fa-road' title='route' onclick='rute(\""+id+"\");tampilanobjek(\""+id+"\");'></a></td><td><a role='button' title='booking' class='btn btn-success fa fa-envelope' value='Booking' onclick='booked(\""+id+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery(\""+id+"\")'></a></td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showdetpackage(\""+id+"\")'></a></td></tr>");
          }
          }
        }
        }); 
    }
}

function booked()
{
  alert('Please login!');
}

function caritravel()
{
  $('#hasilcaritempat').empty();
  hapusInfo();
  hapusmarker();

  var car = document.getElementById('name_travel').value;
  if(name_travel.value=='')
  {
    alert("Fill The Input Column!");
  }
  else
  {
    $.ajax({ 
        url: server+'caritravel.php?name='+car, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('There is No Travel');
            }
            else

          {
             $('#hasilcaritempat').append("<thead><th>Nama</th><th colspan='2'>Aksi</th></thead>");

              document.getElementById('hasilcaritempat').innerHTML = "";  

          for (var i in rows) 
          {   
            var row         = rows[i];
            var id  = row.id;
            var name  = row.name;
            var id_travel  = row.id_travel;
            // var price = row.price;
            console.log(name);

          //    $('#hasilcaritempat').append("<tr><td>"+name+"</td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='travel' onclick='tampilkantravel(\""+id_travel+"\")'></a></td></tr>");
          // }

           $('#hasilcaritempat').append("<tr><td>"+name+"</td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showpackage1(\""+id+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery2(\""+id+"\")'></a></td><td><a role='button' title='travel' class='btn btn-success fa fa-bus' value='travel' onclick='detailtravel(\""+id+"\")'></a></td></tr>");
          }
          }
        }
        }); 
    }
}

function caritravel1()
{
  $('#hasilcaritempat').empty();
  hapusInfo();
  hapusmarker();

  var car = document.getElementById('name_travel').value;
  if(name_travel.value=='')
  {
    alert("Fill The Input Column!");
  }
  else
    
  {
    $.ajax({ 
        url: server+'caritravel.php?name='+car, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('There is No Travel');
            }
            else
          {
             $('#hasilcaritempat').append("<thead><th>Nama</th><th colspan='2'>Aksi</th></thead>");
    
              document.getElementById('hasilcaritempat').innerHTML = "";  

          for (var i in rows) 
          {   
            var row         = rows[i];
            var id  = row.id;
            var name  = row.name;
            // var price = row.price;
            console.log(name);

             $('#hasilcaritempat').append("<tr><td>"+name+"</td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='travel' onclick='tampilkantravel(\""+id_travel+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery(\""+id+"\")'></a></td>></tr>");
          }
          }
        }
        }); 
    }
}

function detail(id)
{
  $("#carides").show();
  // $('#hasilcarides').empty();
  hapusInfo();
  hapusmarker();

    $.ajax({ 
        url: server+'tampiltravel.php?id='+id, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('There is No Package');
            }
            else
          {
             $('#hasilcaritempat').append("<thead><th>Nama</th><th colspan='2'>Aksi</th></thead>");
          for (var i in rows) 
          {   
            var row         = rows[i];
            var id  = row.id;
            var name  = row.name;
            var price = row.price;
            console.log(name);

             // $('#hasilcarides').append("<tr><td>"+name+"</td><td>"+price+"<td><td><a role='button' class='btn btn-success' onclick='detailpaket(\""+id+"\")'>Detail</a></td></td><td><a role='button' class='btn btn-success' onclick='rute(\""+id+"\")'>Route</a></td></td><td><a role='button' class='btn btn-success' onclick='gallery(\""+id+"\")'>Gallery</a></td></tr>");


             $('#hasilcarides').append("<tr><td>"+name+"</td><td>"+price+"</td><td><a role='button' title='info' class='btn btn-success fa fa-info' onclick='detailpaket(\""+id+"\")'></a></td><td><a role='button' class='btn btn-success fa fa-road' title='route' onclick='rute(\""+id+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery(\""+id+"\")'></a></td></tr>");
          }
          }
        }
        }); 

}
//informasi detail paket wisata halal
function gallery(a){    
      console.log(a);
    window.open(server+'gallery.php?id_package='+a);    
   }

//informasi detail agen perjalanan
function gallery2(a){    
      console.log(a);
    window.open(server+'gallery2.php?id_travel='+a);    
   }

//informasi detail  objek wisata   
function gallery3(a){    
      console.log(a);
    window.open(server+'gallery3.php?id_tw='+a);    
   }

//informasi detail  rumah makan   
function gallery4(a){    
      console.log(a);
    window.open(server+'gallery4.php?id_rm='+a);    
   }

//informasi detail  masjid   
function gallery5(a){    
      console.log(a);
    window.open(server+'gallery5.php?id_masjid='+a);    
   }

//informasi detail  souvenir
function gallery6(a){    
      console.log(a);
    window.open(server+'gallery6.php?id_souvenir='+a);    
   }

function carides()
{
  $('#hasilcaritempat').empty();
  // $('#carides').empty();
  hapusInfo();
  hapusmarker();
  
  var objek = document.getElementById('objek').value;
  var cariobjek = document.getElementById('cariobjek').value;
  if(cariobjek.value=='')
  {
    alert("Fill The Input Column!");
  }
  else
  {
      console.log(server+'carides.php?status='+objek+'&id='+cariobjek);
    $.ajax({ 
        url: server+'carides.php?status='+objek+'&id='+cariobjek, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('There is No Package');
            }
            else
          {
             $('#hasilcaritempat').append("<thead><th colspan='1'>Name</th><th colspan='1'>Price</th><th colspan='4'>Action</th></thead>");
          for (var i in rows) 
          {   
            var row = rows[i];
            var id  = row.id;
            var id_travel  = row.id_travel;
            var name  = row.name;
            var price = row.price;
            console.log(name);
             $('#hasilcaritempat').append("<tr><td>"+name+"</td><td>"+price+"</td><td><a role='button' class='btn btn-success fa fa-road' title='route' onclick='rute(\""+id+"\");tampilanobjek(\""+id+"\");'></a></td><td><a role='button' class='btn btn-success fa fa-envelope' title='booking' href='#modalbooking' data-toggle='modal' onclick='booking(\""+id+"\",\""+price+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery(\""+id+"\")'></a></td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showdetpackage(\""+id+"\")'></a></td></tr>");
          }
          }
        }
        }); 
    }
}

function carides1()
{
  $('#hasilcaritempat').empty();
  // $('#carides').empty();
  hapusInfo();
  hapusmarker();
  
  var objek = document.getElementById('objek').value;
  var cariobjek = document.getElementById('cariobjek').value;
  if(cariobjek.value=='')
  {
    alert("Fill The Input Column!");
  }
  else
  {
      console.log(server+'carides.php?status='+objek+'&id='+cariobjek);
    $.ajax({ 
        url: server+'carides.php?status='+objek+'&id='+cariobjek, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('There is No Package');
            }
            else
          {
             $('#hasilcaritempat').append("<thead><th>Nama</th><th colspan='2'>Aksi</th></thead>");
          for (var i in rows) 
          {   
            var row = rows[i];
            var id  = row.id;
            var id_travel  = row.id_travel;
            var name  = row.name;
            var price = row.price;
            console.log(name);
             $('#hasilcaritempat').append("<tr><td>"+name+"</td><td>"+price+"</td><td><a role='button' class='btn btn-success fa fa-road' title='route' onclick='rute(\""+id+"\");tampilanobjek(\""+id+"\");'></a></td><td><a role='button' title='booking' class='btn btn-success fa fa-envelope' value='Booking' onclick='booked(\""+id+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery(\""+id+"\")'></a></td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showdetpackage(\""+id+"\")'></a></td><td><a role='button' title='travel' class='btn btn-success fa fa-bus' value='travel' onclick='detailtravel(\""+id_travel+"\")'></a></td></tr>");
          }
          }
        }
        }); 
    }
}

function caritwtype()
{
  $('#hasilcaritempat').empty();
  hapusInfo();
  hapusmarker();
  
  var fas=caritwtype.value;
  var arrayLay=[];
  for(i=0;i<$("input[name=tourism_type]:checked").length;i++){
    arrayLay.push($("input[name=tourism_type]:checked")[i].value);
  }
  console.log('zz');
  if (arrayLay==''){
    alert('Pilih Kuliner');
  }else{
    // $('#hasilcaritempat').append("<thead><th>Name</th><th colspan='3'>Action</th></thead>");
    $.ajax({ url: server+'caritwtype.php?lay='+arrayLay, data: "", dataType: 'json', success: function(rows){
      console.log("hai");
      if(rows==null)
            {
              alert('Data not found');
            }
            for (var i in rows) 
            {   
              var row     = rows[i];
              var id   = row.id;
              var name   = row.name;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'assets/img/biru1.ico',
              map: map,
              animation: google.maps.Animation.DROP,
            });
            console.log(name);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(16);
              
              $('#hasilcaritempat').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detailtype(\""+id+"\");'>Detail</a></td><td><a role='button' class='btn btn-success' onclick='detailtype(\""+id+"\");'>Gallery</a></td></tr>");
            }
           
    }});
  }
}

function caribulan()
{
  $('#hasilcaritempat').empty();
  hapusInfo();
  hapusmarker();
  
  var car = document.getElementById('bulan').value;
  if(car.value=='')
  {
    alert("Fill The Input Column First!");
  }
  else
  {
    $.ajax({ 
        url: server+'caribulan.php?bulan='+car, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('There is no event');
            }
            else
          {
             $('#hasilcaritempat').append("<thead><th>Nama</th><th colspan='2'>Aksi</th></thead>");
          for (var i in rows) 
          {   
            var row         = rows[i];
            var id  = row.id;
            var name  = row.name;
            var latitude      = row.latitude ;
            var longitude     = row.longitude ;
            centerBaru        = new google.maps.LatLng(latitude, longitude);
            marker = new google.maps.Marker
            ({
            icon: "assets/img/biru1.ico",
            position : centerBaru,  
            map: map,
            animation: google.maps.Animation.DROP,
            });

            markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(14);
            console.log(name);

             $('#hasilcaritempat').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success' onclick='detailevent(\""+id+"\")'>Detail</a></td><td><a role='button' class='btn btn-success' onclick='detailevent(\""+id+"\")'>Gallery</a></td></tr>");
          }
          }
        }
        }); 
    }
}

var arraykota=[]; 
function rute(ab){  
    var total=0;
  while(arraykota.length>0)
    {
      arraykota.pop();
    }
    while(waypts.length>0)
    {
      waypts.pop();
    }
    $.ajax({ 
      url: server+'rutepaket.php?id_package='+ab, data: "", dataType: 'json', success: function(rows)
        {
        for (var i in rows) 
          {   
            total=total+1;
            var row     = rows[i];
            var serial_number   = row.serial_number;
            var id_tourism   = row.id_tourism;
            var id_restaurant   = row.id_restaurant;
            var id_souvenir   = row.id_souvenir;            
            var id_workship_place  = row.id_workship_place;
            var longitude = row.longitude ;
            var longitude = row.longitude ;
            centerBaru      = new google.maps.LatLng(row.latitude, row.longitude);
            arraykota.push(centerBaru);       
            map.setCenter(centerBaru);
          //  klikInfoWindow_paket(centerBaru, id);
            map.setZoom(15);          
             
            // $('#hasilCari').append("<div id='resultCari'>");
            // $('#resultCari').append("Tujuan : "+total+"<br> Objek Wisata : "+namaow+"<br><input type='button' class='btn btn-primary' value='Detail'  onclick='detail(\""+idow+"\")' style='display: table; margin: 0 left; margin-top: 2px'/>");
            // $('#hasilCari').append("</div>");
          }
            calcDire();      
        }
      }); 

  }
  var waypts=[];
  function calcDire(){
   
    if(directionsDisplay)
      {
        // clearroute2();
        directionsDisplay.setMap(null);
        hapusInfo();
      }
      else
      {
        
      }
      // console.log(directionsDisplay);
    var directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
    
    for (var x = 1; x < arraykota.length-1;x++){
      waypts.push({
        location:arraykota[x],
        stopover:false
      }) 
    }

    directionsDisplay.setMap(map);
    directionsService.route(
      { origin: arraykota[0],
      destination: arraykota[arraykota.length-1],
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING }, 
      function(response, status) {
      if (status === google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
        var route = response.routes[0]; } 
      }
    );
     // console.log("aaaaaa");
    //  klikInfoWindow_paket(directionsDisplay, id);
   }

function clearroute2(){
  directionsDisplay.setMap(null);
  hapusmarker();
}


function detailtempatwisata(id1)
{
          hapusInfo();
          //hapusmarker();
          // console.log('cdscf');
          console.log('cc')
          $.ajax({ 
          url: server+'detailtempatwisata.php?detailtempat='+id1, data: "", dataType: 'json', success: function(rows)
            { 
            for (var i in rows) 
                {   
                var row = rows[i];
                var id = row.id;
                var name   = row.name;
                var address = row.address;
                var open    = row.open;
                var close    = row.close;
                var ticket = row.ticket;
                var description = row.description;
                var latitude  = row.latitude; ;
                var longitude = row.longitude ;

                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(15); 
                 marker = new google.maps.Marker({
                //   position: centerBaru,              
                //   icon:"assets/img/biru1.ico",
                //   animation: google.maps.Animation.DROP,
                //   map: map
                  }); 

        //        klikInfoWindow_paket(centerBaru, id);
                markersDua.push(marker);
                map.setCenter(centerBaru);

                //var gambar= name.replace(/\s/g, '');
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<span style=color:black><center><b>Information</b><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-road'></i> "+address+"<br><i class='fa fa-clock-o'></i> "+open+"<br><i class='fa fa-clock-o'></i> "+close+"<br><i class='fa fa-tag'></i> "+ticket+"<br><i class='btn btn-success fa fa-info' onclick='gallery3(\""+id+"\")'></i> "+description+"</span>",
                  pixelOffset: new google.maps.Size(0, -33)






                });
                
                hapusInfo()
                infoDua.push(infowindow); 
                infowindow.open(map); 
                  //hapusMarkerInfowindow()
                } 
            }
  }); 
}

function detailrumahmakan(id2)
{
          hapusInfo();
          //hapusmarker();
          // console.log('cdscf');
          console.log('cc')
          $.ajax({ 
          url: server+'detailrm.php?id='+id2, data: "", dataType: 'json', success: function(rows)
            { 
            for (var i in rows) 
                {   
                var row = rows[i];
                var id = row.id;
                var name   = row.name;
                var address = row.address;
                var open    = row.open;
                var close    = row.close;
                var price = row.price;
                var description = row.description;
                var latitude  = row.latitude; ;
                var longitude = row.longitude ;

                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(15); 
                marker = new google.maps.Marker({
                //   position: centerBaru,              
                //   icon:"assets/img/biru1.ico",
                //   animation: google.maps.Animation.DROP,
                //   map: map
                   }); 

                //klikInfoWindow_paket(centerBaru, id);
                markersDua.push(marker);
                map.setCenter(centerBaru);

                //var gambar= name.replace(/\s/g, '');
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<span style=color:black><center><b>Information</b><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-road'></i> "+address+"<br><i class='fa fa-clock-o'></i> "+open+"<br><i class='fa fa-clock-o'></i> "+close+"<br><i class='fa fa-tag'></i> "+price+"<br><i class='btn btn-success fa fa-info' onclick='gallery4(\""+id+"\")'></i> "+description+"</span>",
                  pixelOffset: new google.maps.Size(0, -33)
                });
                
                hapusInfo()
                infoDua.push(infowindow); 
                infowindow.open(map); 
                  //hapusMarkerInfowindow()
                } 
            }
  }); 
}

function detailmasjid(id3)
{
          hapusInfo();
          //hapusmarker();
          // console.log('cdscf');
          console.log('cc')
          $.ajax({ 
          url: server+'detailmasjid.php?detailmasjid='+id3, data: "", dataType: 'json', success: function(rows)
            { 
            for (var i in rows) 
                {   
                var row = rows[i];
                var id = row.id;
                var name   = row.name;
                var address = row.address;
                var latitude  = row.latitude; ;
                var longitude = row.longitude ;

                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(15); 
                marker = new google.maps.Marker({
                //   position: centerBaru,              
                //   icon:"assets/img/biru1.ico",
                //   animation: google.maps.Animation.DROP,
                //   map: map
                   }); 

               // klikInfoWindow_paket(centerBaru, id);
                markersDua.push(marker);
                map.setCenter(centerBaru);

                //var gambar= name.replace(/\s/g, '');
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<span style=color:black><center><b>Information</b><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-road'></i> "+address+" <br><i class='btn btn-success fa fa-info' onclick='gallery5(\""+id+"\")'></i></span>",
                  pixelOffset: new google.maps.Size(0, -33)
                });
                
                hapusInfo()
                infoDua.push(infowindow); 
                infowindow.open(map); 
                  //hapusMarkerInfowindow()
                } 
            }
  }); 
}

function detailsouvenir(id4)
{
          hapusInfo();
          //hapusmarker();
          // console.log('cdscf');
          console.log('cc')
          $.ajax({ 
          url: server+'detailindustri.php?detailsouvenir='+id4, data: "", dataType: 'json', success: function(rows)
            { 
            for (var i in rows) 
                {   
                var row = rows[i];
                var id = row.id;
                var name   = row.name;
                var address = row.address;
                var open    = row.open;
                var close    = row.close;
                var description = row.description;
                var latitude  = row.latitude; ;
                var longitude = row.longitude ;

                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(15); 
                 marker = new google.maps.Marker({
                //   position: centerBaru,              
                //   icon:"assets/img/biru1.ico",
                //   animation: google.maps.Animation.DROP,
                //   map: map
                  }); 

               // klikInfoWindow_paket(centerBaru, id);
                markersDua.push(marker);
                map.setCenter(centerBaru);

                //var gambar= name.replace(/\s/g, '');
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                   content: "<span style=color:black><center><b>Information</b><br><i class='fa fa-home'></i> "+name+"<br><i class='fa fa-road'></i> "+address+"<br><i class='fa fa-clock-o'></i> "+open+"<br><i class='fa fa-clock-o'></i> "+close+"<br><i class='btn btn-success fa fa-info' onclick='gallery6(\""+id+"\")'></i> "+description+"</span>",
                  pixelOffset: new google.maps.Size(0, -33)
                });
                
                hapusInfo()
                infoDua.push(infowindow); 
                infowindow.open(map); 
                  //hapusMarkerInfowindow()
                } 
            }
  }); 
}

function detailtravel(id5)
{
          hapusInfo();
          // hapusmarker();
          // console.log('cdscf');
          console.log('cc')
          $.ajax({ 
          url: server+'detailtravell.php?detailtravel='+id5, data: "", dataType: 'json', success: function(rows)
            { 
            for (var i in rows) 
                {   
                var row = rows[i];
                var id = row.id;
                var name   = row.name;
                var cp = row.cp;
                var latitude  = row.latitude; ;
                var longitude = row.longitude ;

                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(15); 
                marker = new google.maps.Marker({
                  position: centerBaru,              
                  icon:"assets/img/biru1.ico",
                  animation: google.maps.Animation.DROP,
                  map: map
                  }); 

               // klikInfoWindow_paket(centerBaru, id);
                markersDua.push(marker);
                map.setCenter(centerBaru);

                //var gambar= name.replace(/\s/g, '');
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<center><b>Information</b></center><br>Name: "+name+"<br> Contact Person: "+cp+"",
                  pixelOffset: new google.maps.Size(0, -33)
                });
                
                hapusInfo()
                infoDua.push(infowindow); 
                infowindow.open(map); 
                  //hapusMarkerInfowindow()
                } 
            }
  }); 
}

function detailevent(id1)
{
          hapusInfo();
          hapusmarker();
          // console.log('cdscf');
          console.log('cc')
          $.ajax({ 
          url: server+'detailevent.php?detailevent='+id1, data: "", dataType: 'json', success: function(rows)
            { 
            for (var i in rows) 
                {   
                var row = rows[i];
                var id = row.id;
                var name   = row.name;
                var address = row.address;
                var date = row.date;
                var open    = row.open;
                var close    = row.close;
                var ticket = row.ticket;
                var latitude  = row.latitude; ;
                var longitude = row.longitude ;

                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(15); 
                marker = new google.maps.Marker({
                  position: centerBaru,              
                  icon:"assets/img/biru1.ico",
                  animation: google.maps.Animation.DROP,
                  map: map
                  }); 

                markersDua.push(marker);
                map.setCenter(centerBaru);

                //var gambar= name.replace(/\s/g, '');
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<bold>DETAIL INFORMATION</bold><br>Name: "+name+"<br> Address: "+address+"<br> "+address+" <br>Date: "+date+"<br>Open Hour: "+open+"<br>Close Hour: "+close+"<br>Ticket: "+ticket+"/>",
                  pixelOffset: new google.maps.Size(0, -33)
                });
                
                hapusInfo()
                infoDua.push(infowindow); 
                infowindow.open(map); 
                  //hapusMarkerInfowindow()
                } 
            }
          }); 
        }

function detailtype(id2)
{
          hapusInfo();
          hapusmarker();
          // console.log('cdscf');
          console.log('cc')
          $.ajax({ 
          url: server+'detailtype.php?detailtype='+id2, data: "", dataType: 'json', success: function(rows)
            { 
            for (var i in rows) 
                {   
                var row = rows[i];
                var id = row.id;
                var name   = row.name;
                var address = row.address;
                var open    = row.open;
                var close    = row.close;
                var ticket = row.ticket;
                var description = row.description;
                var latitude  = row.latitude; ;
                var longitude = row.longitude ;

                centerBaru = new google.maps.LatLng(latitude, longitude);
                map.setCenter(centerBaru);
                map.setZoom(15); 
                marker = new google.maps.Marker({
                  position: centerBaru,              
                  icon:"assets/img/biru1.ico",
                  animation: google.maps.Animation.DROP,
                  map: map
                  }); 

                markersDua.push(marker);
                map.setCenter(centerBaru);

                //var gambar= name.replace(/\s/g, '');
                infowindow = new google.maps.InfoWindow({
                  position: centerBaru,
                  content: "<bold>DETAIL INFORMATION</bold><br>Name: "+name+"<br> Address: "+address+"<br> "+address+"<br>Open Hour: "+open+"<br>Close Hour: "+close+"<br>Ticket: "+ticket+" <br>Description: "+description+"/>",
                  pixelOffset: new google.maps.Size(0, -33)
                });
                
                hapusInfo()
                infoDua.push(infowindow); 
                infowindow.open(map); 
                  //hapusMarkerInfowindow()
                } 
            }
          }); 
        }

function rmterdekat(id)
{
  $('#hasilcari').empty();
  // clearroute2();
  // hapusInfo();
  $('#hasiljarak').empty();
  $('#jarakj').css('display','block');
    
  $.ajax({ 
        url: server+'jarakterdekatrm.php?id='+id, data: "", dataType: 'json', success: function(rows)
        { 
          var arrayNama=[];
          var arraycenter=[];
          for (var i in rows) 
          {   
            var row       = rows[i];
            var id    = row.id;
            var name   = row.name;
            var latitude    = row.latitude ;
            var longitude = row.longitude ;
            var rmterdekat = row.meter;
          
          centerBaru = new google.maps.LatLng(latitude, longitude);
          marker1 = new google.maps.Marker
          ({
            // icon: "http://localhost/agen/img/biru2.ico",
            position: centerBaru,
            map: map,
          });
          
          markersDkt.push(marker1);
          map.setCenter(centerBaru);
          map.setZoom(16);
        //  klikInfoWindow(centerBaru, id_rumah_makan);
          
          var rm1={
            lat: parseFloat(latitude),
            lng: parseFloat(longitude)
          };
          console.log(rm1);
          arraycenter.push(rm1);
          arrayNama+=name+',';
          }
        arrayNama=arrayNama.slice(0,-1);
        
        var restaurant= arrayNama.split(",");
        var meter= parseFloat(rmterdekat).toFixed(2);
        $('#hasiljarak').append("<table class='table table-bordered'><tr><td>Dari</td><td>: </td><td>"+restaurant[0]+"</td></tr><tr><td>Ke</td><td>: </td><td>"+restaurant[1]+"</td></tr><tr><td>Jarak</td><td>: </td><td>"+meter+" meter </td></tr></table>");
        infoDua.push(infowindow); 
        console.log(arraycenter[0]);
        console.log(rmterdekat);
        var rmterdekat1 = parseFloat(rmterdekat) + 17;
        console.log(rmterdekat1);
        var circle = new google.maps.Circle({
              center: arraycenter[0],
              radius: parseFloat(rmterdekat1),      
              map: map,
              strokeColor: "blue",
              strokeOpacity: 0.8,
              strokeWeight: 2,
              fillColor: "blue",
              fillOpacity: 0.35
              });   
         
         circles.push(circle); 
         cekRadiusStatus = 'on';
      }
                
        });
}

function cariobjek(){
  $('#cariobjek').empty();
 
  var city = document.getElementById('city').value;
  var objek =document.getElementById('objek').value;
  
  if (objek!=0 && city!=0){
    $.ajax({url: "http://localhost/wisatasumbar/cariobjek.php?objek="+objek+"&city="+city, data: "", dataType: 'json', success: function(rows){
      console.log(rows);
      console.log("http://localhost/wisatasumbar/cariobjek.php?objek="+objek+"&city="+city); 
        if (objek=="1") {
          // console.log("jalan1");
          for (var i in rows){
            
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            console.log(id);
            console.log(name);
            $('#cariobjek').append('<option value="'+id+'">'+name+'</option>');
          }
        }
        else if (objek=="2") 
        {
          for (var i in rows)
          {
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            console.log(id);
            console.log(name);
            $('#cariobjek').append('<option value="'+id+'">'+name+'</option>');
          }
        }
        else if (objek=="3") 
        {
          for (var i in rows)
          {
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            console.log(id);
            console.log(name);
            $('#cariobjek').append('<option value="'+id+'">'+name+'</option>');
          }
        }
        else 
        {
          for (var i in rows)
          {
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            console.log(id);
            console.log(name);
            $('#cariobjek').append('<option value="'+id+'">'+name+'</option>');
          }
        }

      }});//end ajax
    }//end if
}

function show2(){
  var data0 = document.getElementById('id').value;
  var data1 = document.getElementById('objek').value;
  var data2 = document.getElementById('cariobjek').value;
/*
1 industri
2 mesjid
3 rm
4 tw
*/

  //var paket_id = [];
  //var paket_objek = [];
  paket_id.push(data2);
  paket_objek.push(data1);
  for (var i = 0; i < paket_id.length; i++) {
    console.log(paket_id[i]);
    console.log(paket_objek[i]);
    console.log("ertyuityguigighjkyuiotyiofgfghfdcfhgcfhgcgfhcgfhchgfchfgc");
  };
  //nyimpan ka object point
  $.ajax({url: "simpanpaket.php?data1=2&data2="+data0+"&data3="+data1+"&data4="+data2, data: "", dataType: 'json', success: function(rows){
  }});

  //
  console.log("simpanpaket.php?data1=3&data2="+data0+"&data3="+data1);
  $.ajax({url: "simpanpaket.php?data1=3&data2="+data0+"&data3="+data1, data: "", dataType: 'json', success: function(rows){
      $('#hasilcaritempat').empty();
      //$('#hasilcaritempat').append("<tr><td>"+nourut+"</td><td>"+city+"</td><td>"+name+"</td></tr>");
      //nourut++;
      for (var i in rows) {
        var row = rows[i];

        $('#hasilcaritempat').append("<tr><td>"+row.d1+"</td><td>"+row.d2+"</td><td>"+row.d3+"</td></tr>");
      }
    }});
}

function masjidterdekat(id)
{
    $('#hasilcari').empty();
    // clearroute2();
    // hapusInfo();
    $('#hasiljarak').empty();
    $('#jarakj').css('display','block');
      
    $.ajax({ 
      url: server+'jarakterdekatmasjid.php?id='+id, data: "", dataType: 'json', success: function(rows)
        { 
          var arrayNama=[];
          var arraycenter=[];
          for (var i in rows) 
          {   
            var row       = rows[i];
            var id    = row.id;
            var name   = row.name;
            var latitude    = row.latitude ;
            var longitude = row.longitude ;
            var masjidterdekat = row.meter;
          
          centerBaru = new google.maps.LatLng(latitude, longitude);
          marker1 = new google.maps.Marker
          ({
            // icon: "http://localhost/agen/img/biru2.ico",
            position: centerBaru,
            map: map,
          });
          
          markersDkt.push(marker1);
          map.setCenter(centerBaru);
          map.setZoom(16);
        //  klikInfoWindow(centerBaru, id_rumah_makan);
          
          var masjid1={
            lat: parseFloat(latitude),
            lng: parseFloat(longitude)
          };
          console.log(masjid1);
          arraycenter.push(masjid1);
          arrayNama+=nama_masjid+',';
          }
        arrayNama=arrayNama.slice(0,-1);
        
        var workship_place= arrayNama.split(",");
        var meter= parseFloat(masjidterdekat).toFixed(2);
        $('#hasiljarak').append("<table class='table table-bordered'><tr><td>Dari</td><td>: </td><td>"+workship_place[0]+"</td></tr><tr><td>Ke</td><td>: </td><td>"+workship_place[1]+"</td></tr><tr><td>Jarak</td><td>: </td><td>"+meter+" meter </td></tr></table>");
        infoDua.push(infowindow); 
        console.log(arraycenter[0]);
        console.log(masjidterdekat);
        var masjidterdekat1 = parseFloat(masjidterdekat) + 17;
        console.log(masjidterdekat1);
        var circle = new google.maps.Circle({
              center: arraycenter[0],
              radius: parseFloat(masjidterdekat1),      
              map: map,
              strokeColor: "blue",
              strokeOpacity: 0.8,
              strokeWeight: 2,
              fillColor: "blue",
              fillOpacity: 0.35
              });   
         
         circles.push(circle); 
         cekRadiusStatus = 'on';
      }
                
        });
}

function industriterdekat(id)
{
      $('#hasilcari').empty();
      // clearroute2();
      // hapusInfo();
      $('#hasiljarak').empty();
      $('#jarakj').css('display','block');
        
      $.ajax({ 
        url: server+'jarakterdekatindustri.php?id='+id, data: "", dataType: 'json', success: function(rows)
          { 
            var arrayNama=[];
            var arraycenter=[];
            for (var i in rows) 
            {   
              var row       = rows[i];
              var id    = row.id;
              var name   = row.name;
              var latitude    = row.latitude ;
              var longitude = row.longitude ;
              var industriterdekat = row.meter;
          
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker1 = new google.maps.Marker
              ({
              // icon: "http://localhost/agen/img/biru2.ico",
              position: centerBaru,
              map: map,
            });
          
            markersDkt.push(marker1);
            map.setCenter(centerBaru);
            map.setZoom(16);
           
        //   klikInfoWindow(centerBaru, id_rumah_makan);
          
            var souvenir1={
              lat: parseFloat(latitude),
              lng: parseFloat(longitude)
            };

            console.log(souvenir1);
            arraycenter.push(souvenir1);
            arrayNama+=name+',';
          }
          arrayNama=arrayNama.slice(0,-1);
          
          var souvenir= arrayNama.split(",");
          var meter= parseFloat(industriterdekat).toFixed(2);
          $('#hasiljarak').append("<table class='table table-bordered'><tr><td>Dari</td><td>: </td><td>"+souvenir[0]+"</td></tr><tr><td>Ke</td><td>: </td><td>"+souvenir[1]+"</td></tr><tr><td>Jarak</td><td>: </td><td>"+meter+" meter </td></tr></table>");

          infoDua.push(infowindow); 
          console.log(arraycenter[0]);
          console.log(industriterdekat);
          var industriterdekat1 = parseFloat(industriterdekat) + 17;
          console.log(industriterdekat1);
          var circle = new google.maps.Circle({
                center: arraycenter[0],
                radius: parseFloat(industriterdekat1),      
                map: map,
                strokeColor: "blue",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "blue",
                fillOpacity: 0.35
                });   
           
          circles.push(circle); 
          cekRadiusStatus = 'on';
        }    
      });
}

function showdetpackage(id){
  $('#carides2').show()
  hapusInfo();
  hapusmarker();
  $.ajax({url: "http://localhost/wisatasumbar/detailPak.php?id="+id, data: "", dataType: 'json', success: function(rows){
  var i=1;

       document.getElementById('hasilcarides').innerHTML = ""; 
    for(var a in rows){
            var row = rows[a];
            var n1  = row.n1;
            var n2  = row.n2;
            var n3  = row.n3;
           
            console.log(n1);

      //console.log(rows[0])
             $('#hasilcarides').append("<tr><td>"+i+"</td><td>"+n1+"</td><td>"+n2+"</td><td>"+n3+"</td></tr>");
             i++;
    }
  }});

}

function showpackage(id){
  $('#caritrav').show()
  console.log(id);
  $.ajax({url: "http://localhost/wisatasumbar/pak.php?id="+id, data: "", dataType: 'json', success: function(rows){
    console.log('asd');
  var z=1;

            document.getElementById('hasilcaritrav').innerHTML = "";  
  
    for (var i in rows) 
          {   
            var row = rows[i];
            var id  = row.id;
            var id_travel  = row.id_travel;
            var name  = row.name;
            var price = row.price;
            console.log(name);
      //console.log(rows[0])
             $('#hasilcaritrav').append("<tr><td>"+name+"</td><td>"+price+"</td><td><a role='button' class='btn btn-success fa fa-road' title='route' onclick='rute(\""+id+"\");tampilanobjek(\""+id+"\");'></a></td><td><a role='button' class='btn btn-success fa fa-envelope' title='booking' href='#modalbooking' data-toggle='modal' onclick='booking(\""+id+"\",\""+price+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery(\""+id+"\")'></a></td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showdetpackage(\""+id+"\")'></a></td></tr>");
             z++;    }
  }});

}

function showpackage1(id){
  $('#caritrav').show()
  console.log(id);
  $.ajax({url: "http://localhost/wisatasumbar/pak.php?id="+id, data: "", dataType: 'json', success: function(rows){
    console.log('asd');
  var z=1;
  
          document.getElementById('hasilcaritrav').innerHTML = "";  

    for (var i in rows) 
          {   
            var row = rows[i];
            var id  = row.id;
            var id_travel  = row.id_travel;
            var name  = row.name;
            var price = row.price;
            console.log(name);
      //console.log(rows[0])
             $('#hasilcaritrav').append("<tr><td>"+name+"</td><td>"+price+"</td><td><a role='button' class='btn btn-success fa fa-road' title='route' onclick='rute(\""+id+"\");tampilanobjek(\""+id+"\");'></a></td><td><a role='button' title='booking' class='btn btn-success fa fa-envelope' value='Booking' onclick='booked(\""+id+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery(\""+id+"\")'></a></td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showdetpackage(\""+id+"\")'></a></td></tr>");
             z++;    }
  }});

}

function cariobjek(){
      $('#cariobjek').empty();
     
      var city = document.getElementById('city').value;
      var objek =document.getElementById('objek').value;
      
      if (objek!=0 && city!=0){
        $.ajax({url: "http://localhost/wisatasumbar/cariobjek.php?objek="+objek+"&city="+city, data: "", dataType: 'json', success: function(rows){
          console.log(rows);
          console.log("http://localhost/wisatasumbar/cariobjek.php?objek="+objek+"&city="+city); 
            if (objek=="1") {
              // console.log("jalan1");
              for (var i in rows){
                
                var row = rows[i];
                var id = row.id;
                var name = row.name;
                console.log(id);
                console.log(name);
                $('#cariobjek').append('<option value="'+id+'">'+name+'</option>');
              }
            }
            else if (objek=="2") 
            {
              for (var i in rows)
              {
                var row = rows[i];
                var id = row.id;
                var name = row.name;
                console.log(id);
                console.log(name);
                $('#cariobjek').append('<option value="'+id+'">'+name+'</option>');
              }
            }
            else if (objek=="3") 
            {
              for (var i in rows)
              {
                var row = rows[i];
                var id = row.id;
                var name = row.name;
                console.log(id);
                console.log(name);
                $('#cariobjek').append('<option value="'+id+'">'+name+'</option>');
              }
            }
            else 
            {
              for (var i in rows)
              {
                var row = rows[i];
                var id = row.id;
                var name = row.name;
                console.log(id);
                console.log(name);
                $('#cariobjek').append('<option value="'+id+'">'+name+'</option>');
              }
            }

          }});//end ajax
        }//end if
}

function klikInfoWindow_tw(id1,marker)
{
  google.maps.event.addListener(marker, "click", function(){
        detailtempatwisata(id1);
      });
}

function klikInfoWindow_rm(id2,marker)
{
  google.maps.event.addListener(marker, "click", function(){
        detailrumahmakan(id2);
      });
}

function klikInfoWindow_masjid(id3,marker)
{
  google.maps.event.addListener(marker, "click", function(){
        detailmasjid(id3);
      });
}

function klikInfoWindow_souvenir(id4,marker)
{
  google.maps.event.addListener(marker, "click", function(){
        detailsouvenir(id4);
      });
}

function klikInfoWindow_travel(id5,marker)
{
  google.maps.event.addListener(marker, "click", function(){
        detailtravel(id5);
      });
}

var booking_id = "";
var booking_price = "";
function booking(id,price)
{
  booking_id = id;
  booking_price = price;
  document.getElementById('id_package').value = booking_id;
}

function hitung()
{
  var hitung = document.getElementById('total').value;
  hitung = hitung * booking_price;
  document.getElementById('totalprice').value = hitung;  
}

function tampilsemuapaket(aab){ 

   $.ajax({ 
        url: server+'lihatsemuapaket.php?id='+aab, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('Data Tidak Ditemukan');
            }
            document.getElementById('hasilcaritempat').innerHTML = "";  

          for (var i in rows) 
            {   
              var row = rows[i];
            var id  = row.id;
            var id_travel  = row.id_travel;
            var name  = row.name;
            var price = row.price;
            console.log(name);
            //   centerBaru = new google.maps.LatLng(latitude, longitude);
            //   marker = new google.maps.Marker
            // ({
            //   position: centerBaru,
            //   icon:'assets/ico/marker_masjid.png',
            //   map: map,
            //   animation: google.maps.Animation.DROP,
            // });
        //       console.log(latitude);
        //       console.log(longitude);
        //       markersDua.push(marker);
        //       map.setCenter(centerBaru);
        
        // klikInfoWindow(id);
              //map.setZoom(14);
              // $('#hasilcaritempat').append("<tr><td>"+name+"</td><td>"+price+"</td><td><a role='button' class='btn btn-success fa fa-road' title='route' onclick='rute(\""+id+"\");tampilanobjek(\""+id+"\")'></a></td><td><a role='button' class='btn btn-success fa fa-envelope' title='booking' href='#modalbooking' data-toggle='modal' onclick='booked(\""+id+"\",\""+price+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery(\""+id+"\")'></a></td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showdetpackage(\""+id+"\")'></a></td></tr>");
              
               $('#hasilcaritempat').append("<tr><td>"+name+"</td><td>"+price+"</td><td><a role='button' class='btn btn-success fa fa-road' title='route' onclick='rute(\""+id+"\");tampilanobjek(\""+id+"\");'></a></td><td><a role='button' class='btn btn-success fa fa-envelope' title='booking' href='#modalbooking' data-toggle='modal' onclick='booking(\""+id+"\",\""+price+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery(\""+id+"\")'></a></td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showdetpackage(\""+id+"\")'></a></td></tr>");
              }

            } 
           
          
        }); 
  }     


  function tampilsemua(){ 
    console.log("masuk");
    $.ajax({ 
          url: server+'lihatsemua.php', data: "", dataType: 'json', success: function(rows)
            { 
              if(rows==null)
              {
                alert('Data Tidak Ditemukan');
              }
  
             document.getElementById('hasilcaritempat').innerHTML = "";  
  
            for (var i in rows) 
              {   
                var row = rows[i];
                var id  = row.id;
               var id_travel  = row.id_travel;
                var name  = row.name;
            //  var price = row.price;
                console.log(name);
              //   centerBaru = new google.maps.LatLng(latitude, longitude);
              //   marker = new google.maps.Marker
              // ({
              //   position: centerBaru,
              //   icon:'assets/ico/marker_masjid.png',
              //   map: map,
              //   animation: google.maps.Animation.DROP,
              // });
          //       console.log(latitude);
          //       console.log(longitude);
          //       markersDua.push(marker);
          //       map.setCenter(centerBaru);
          // klikInfoWindow(id);
                //map.setZoom(14);
                $('#hasilcaritempat').append("<tr><td>"+name+"</td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showpackage1(\""+id+"\")'></a></td><td><a role='button' title='gallery' class='btn btn-success fa fa-photo' value='Route' onclick='gallery2(\""+id+"\")'></a></td><td><a role='button' title='travel' class='btn btn-success fa fa-bus' value='travel' onclick='detailtravel(\""+id+"\")'></a></td></tr>");
              } 
             
            }
          }); 
    }     

function mybooking(aab){ 

  $.ajax({ 
        url: server+'mybooking.php?id='+aab, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('Data Tidak Ditemukan');
            }
          for (var i in rows) 
            {   
              var row = rows[i];
              var date  = row.date;
              var id_package  = row.id_package;
              var id_travel  = row.id_travel;
            //var name  = row.name;
              var price = row.price;
              console.log(name);
            //   centerBaru = new google.maps.LatLng(latitude, longitude);
            //   marker = new google.maps.Marker
            // ({
            //   position: centerBaru,
            //   icon:'assets/ico/marker_masjid.png',
            //   map: map,
            //   animation: google.maps.Animation.DROP,
            // });
        //       console.log(latitude);
        //       console.log(longitude);
        //       markersDua.push(marker);
        //       map.setCenter(centerBaru);
        // klikInfoWindow(id);
              //map.setZoom(14);
              // $('#hasilcaritempat').append("<tr><td>"+name+"</td><td><a role='button' title='info' class='btn btn-success fa fa-info' value='Detail' onclick='showpackage1(\""+id+"\")'></a></td></tr>");
            } 
           
          }
        }); 
  }     


 function legenda()
{
  $('#tombol').empty();
 $('#tombol').append('<a type="button" id="hidelegenda" onclick="hideLegenda()" class="btn btn-default" data-toggle="tooltip" title="Sembunyikan Legenda" style="margin-right: 7px;" ><i class="fa fa-eye-slash" ></i></a> ');
 
 var layer = new google.maps.FusionTablesLayer(
  {
          query: {
            select: 'Location',
            from: '1NIVOZxrr-uoXhpWSQH2YJzY5aWhkRZW0bWhfZw'
          },
          map: map
        });
  var legend = document.createElement('div');
        legend.id = 'legend';
        var content = [];
        content.push('<h4 style="color: white;">Legend</h4>');
        content.push('<p><div class="color a" style="color: white;">&nbsp;Route</div></p>');
        content.push('<p><div class="color b" style="color: white;">&nbsp;Tourism</div></p>');
        content.push('<p><div class="color c" style="color: white;">&nbsp;Restaurant</div></p>');
        content.push('<p><div class="color d" style="color: white;">&nbsp;Souvenir</div></p>');
        content.push('<p><div class="color e" style="color: white;">&nbsp;Workship&nbsp;Place</div></p>');
        content.push('<p><div class="color f" style="color: white;">&nbsp;Travel</div></p>');

        content.push('<p><div class="color g" style="color: white;">&nbsp;Bukittinggi</div></p>');
        content.push('<p><div class="color h" style="color: white;">&nbsp;Payakumbuh</div></p>');
        content.push('<p><div class="color i" style="color: white;">&nbsp;Batusangkar</div></p>');
        content.push('<p><div class="color j" style="color: white;">&nbsp;Padang&nbsp;Panjang</div></p>');
        content.push('<p><div class="color k" style="color: white;">&nbsp;Solok</div></p>');
        content.push('<p><div class="color l" style="color: white;">&nbsp;Maninjau</div></p>');
        content.push('<p><div class="color m" style="color: white;">&nbsp;Padang</div></p>');
        legend.innerHTML = content.join('');
        legend.index = 1;
        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
}

function hideLegenda() 
{
 $('#legend').remove();
 $('#tombol').empty();
 $('#tombol').append('<a type="button" id="showlegenda" onclick="legenda()" class="btn btn-default btn-sm " data-toggle="tooltip"  style="margin-right: 7px;" ><i class="fa fa-eye-slash" style="color:black;"> </i></a> ');
}


 

function update(id_booking)
                   {
                    window.location.href='updatebooking.php?id_booking='+id_booking ;

                    
                    }

function hapus(id_booking)


                   {
                   window.location.href='deletebooking.php?id_booking='+id_booking ;
                    
                    }

function send(id_booking)

{
                    var button1=document.getElementById('btndel');                   
                    button1.disabled=true;
                    var button2=document.getElementById('btnup');                 
                    button2.disabled=true;
                    var button3=document.getElementById('btnsend');                 
                    button3.disabled=true;
                    
          
          //  console.log(id_booking);

           $.ajax({
                    // url: server+'kirimemail.php'+id_booking, data: "", dataType:'JSON', success: function(data)
                    // {
                    //   if (data==null) 
                    //   {
                    //       alert('Email Has Been Send To : ')
                    //   };
                    // }

               type : "POST",
               url  : "kirimemail.php",
               dataType : "JSON",
               data : {id_booking:id_booking},
               success: function(data)
               {
                   alert('Email Sudah Dikirim ke');
               }
           });
  alert('Data Has Been Send');
  location.reload();
}




function hitungupdate(id_booking)
{
  var hitung = document.getElementById('total').value;
  var booking_price=document.getElementById('price').value;
  hitung = hitung * booking_price;
  document.getElementById('totalprice').value = hitung;  
}