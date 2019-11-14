

var server = "http://localhost/wisatasumbar/";
var map;
//var markersDua = [];
var centerBaru;
var koordinat = null;
var infoposisi = [];
var centerLokasi;
var markerposisi = [];
var infoDua = [];

function posisisekarang() {
  hapusmarker();
  google.maps.event.clearListeners(map, 'click');
  navigator.geolocation.getCurrentPosition(function (position) {
    koordinat = {
      lat: position.coords.latitude,
      lng: position.coords.longitude

    };
    //   console.log(koordinat)
    centerBaru = new google.maps.LatLng(koordinat.lat, koordinat.lng);
    map.setCenter(centerBaru)
    map.setZoom(10);
    var marker = new google.maps.Marker({
      position: koordinat,
      animation: google.maps.Animation.DROP,
      map: map
    });

    infowindow = new google.maps.InfoWindow({
      position: koordinat,
      content: "<center><a style='color:black;'>Anda Disini <br> lat : " + koordinat.lat + " <br> long : " + koordinat.lng + "</a></center>"
    });
    infowindow.open(map, marker);

    markerposisi.push(marker);
    infoposisi.push(infowindow);
    map.setCenter(centerBaru);

  })

}

function lokasimanual() {
  alert('Klik Peta');
  hapusmarker();
  // clearroute2();
  //hapusRadius();
  //cekRadius();    
  map.addListener('click', function (event) {
    hapusmarker();
    addMarker(event.latLng);
  });
}

function addMarker(location) {
  for (var i = 0; i < markerposisi.length; i++) {
    markerposisi[i].setMap(null);

    //hapusRadius();
    //cekRadius();
  }

  marker = new google.maps.Marker({
    //icon: "assets/img/biru1.ico",
    position: location,
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
  infowindow.setContent("<center><a style='color:black;'>Anda Disini <br> lat : " + koordinat.lat + " <br> long : " + koordinat.lng + "</a></center>");
  infowindow.open(map, marker);
  usegeolocation = true;
  markerposisi.push(marker)
  infoposisi.push(infowindow);

  $.ajax({
    url: server + 'tampilanobjek.php', data: "", dataType: 'json', success: function (rows) {
      //console.log(rows)
      if (rows == null) {
        alert('There is no data');
      }
      else {
        for (var i in rows) {
          var row = rows[i];
          var name = row.name;
          var lat = row.latitude;
          var lon = row.longitude;
          centerBaru = new google.maps.LatLng(koordinat.lat, koordinat.lng);
          map.setCenter(centerBaru);
          map.setZoom(10);
          var marker = new google.maps.Marker({
            position: koordinat,
            animation: google.maps.Animation.DROP,
            map: map
          });
          markerposisi.push(marker);
          map.setCenter(centerBaru);
        }
      }
    }
  });
}

function hapusmarker() {
  for (var i = 0; i < markerposisi.length; i++) {
    markerposisi[i].setMap(null);
  }
}

function init() {
  basemap();
  tampilanobjek();
  //Viewobjek();
}

function basemap() {
  map = new google.maps.Map(document.getElementById('map'),
    {
      zoom: 13,
      center: new google.maps.LatLng(-0.3027606, 100.3632251),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
}

function tampilanobjek() {
  $.ajax({
    url: server + 'tampilanobjek.php', data: "", dataType: 'json', success: function (rows) {
      //console.log(rows)
      if (rows == null) {
        alert('There is no data');
      }
      else {
        for (var i in rows) {
          var row = rows[i];
          var name = row.name;
          var lat = row.latitude;
          var lon = row.longitude;
          centerBaru = new google.maps.LatLng(lat, lon);
          map.setCenter(centerBaru);
          map.setZoom(10);
          var marker = new google.maps.Marker({
            position: centerBaru,
            animation: google.maps.Animation.DROP,
            map: map
          });
          markerposisi.push(marker);
          map.setCenter(centerBaru);
        }
      }
    }
  });
}

function hapusInfo() {
  for (var i = 0; i < infoDua.length; i++) {
    infoDua[i].setMap(null);
  }
}

function caritempatwisata() {
  $('#hasilcari').empty();
  $('#hasilpencarian').empty();
  $('#jarakj').css('display', 'none');
  // hapusgrafik();
  hapusInfo();
  //hapusRadius();
  hapusmarker();
  //clearmarkerDkt();
  //clearroute2();
  var city = document.getElementById('name').value;
  if (city.value == '') {
    alert("Isi kolom pencarian dahulu!");
  }
  else {

    $.ajax({
      url: server + 'caritempatwisata.php?name=' + city, data: "", dataType: 'json', success: function (rows) {
        if (rows == null) {
          alert('There is no data');
        }
        else {
          for (var i in rows) {
            var row = rows[i];
            var id = row.id;
            var name = row.name;
            var latitude = row.latitude;
            var longitude = row.longitude;
            centerBaru = new google.maps.LatLng(latitude, longitude);
            marker = new google.maps.Marker({
              icon: "assets/img/biru1.ico",
              position: centerBaru,
              map: map,
              animation: google.maps.Animation.DROP,
            });

            // console.log(latitude);
            // console.log(longitude);
            markerposisi.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(14);
            console.log(name);

            // $('#hasilcari').append("<button class='btn btn-block btn-danger ' style='width:100%' onclick='detail_ekspedisi(\""+id_ekspedisi+"\")' >"+nama_ekspedisi+"</button>");

          }
          // console.log(rows.length);
          // $('#hasilpencarian').append("<h3 class='box-title' id='hasilpencarian'>Hasil Pencarian</h3> : "+rows.length);

        }
      }
    });
  }
}

function carikota() {
  var city = document.getElementById('city')
  if (city.value == '') {
    alert("There is no data");
  }
  else {
    // $('#tampillistik').empty();
    // $('#tampillistik').append("<thead><th>Nama Kota</th><th colspan='2'>Aksi</th></thead>");
    var tourism = document.getElementById('city').value;
    //console.log(tempatwisata);
    // hapusInfo();
    // clearangkot();
    // hapusRadius();
    hapusmarker();
  }
  $.ajax
    ({
      url: server + 'carikota.php?city=' + tourism, data: "", dataType: 'json', success: function (rows) {
        if (rows == null) {
          alert('There is no data');
        }
        for (var i in rows) {
          var row = rows[i];
          var id = row.id;
          var name = row.name;
          var id_city = row.id_city;
          var lat = row.latitude;
          var lon = row.longitude;
          centerBaru = new google.maps.LatLng(lat, lon);
          marker = new google.maps.Marker
            ({
              position: centerBaru,
              map: map,
            });

          markerposisi.push(marker);
          map.setCenter(centerBaru);
          map.setZoom(14);
          console.log(name);
          // klikInfoWindow(centerBaru, id_tempat_wisata);

          //$('#hasilcari').append("<button class='btn btn-block btn-danger' style='width:100%' onclick='carikota(\""+id_kota+"\")' >"+nama_kota+"</button>");

        }
      }
    });
}

