<?php 
session_start();
if(!isset($_SESSION['b'])){
  echo"<script language='JavaScript'>document.location='login.php'</script>";
    exit();
}
include("connect.php");?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Bukittinggi Tourism</title>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVElibraries=drawing"></script>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css"> 
  <!-- <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />  -->
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script src="assets/js/chart-master/Chart.js"></script>
    <script type="text/javascript" src="inc/mapdraw.js"></script>
    <script type="text/javascript">


    var server = "https:///";
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

var i = 0;
var paket_id = [];  //id objek
var paket_objek = []; //status
    
function tes(){
      console.log('jalan tes');  
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
var nourut=1;
function tampilobjek(){
//      $('#tampilobjek').empty();
      //console.log('jalan');
      var cariobjek = document.getElementById('cariobjek').value;
      if (cariobjek == '') {
        alert("Please Choose Object");
      } else {
        nourut++;
        var no = nourut-1;
        var city = document.getElementById('city').value;
        console.log(city);
        var objek =document.getElementById('objek').value;
        console.log(objek);
       

        paket_objek.push(objek);
        paket_id.push(cariobjek);

        console.log("4578945678945678902345678903456789034567890456789");
        console.log(paket_objek.length);
        console.log("4578945678945678902345678903456789034567890456789");
        for (var i = 0; i<paket_objek.length; i++) {
          console.log(paket_objek[i]);
          console.log(paket_id[i]);
        };

        var hasil = document.getElementById('cariobjek');
       var id = document.getElementById('objek').value;
        
      }

}

function simpanpaket(){


  if (paket_id.length >0){
    var name = document.getElementById('name').value
    var price = document.getElementById('price').value
    if( name == '' || price == ''){
      alert('Data belum lengkap');
    } else {
      var id = document.getElementById('id').value;
      var id_travel = document.getElementById('id_travel').value;
      var name = document.getElementById('name').value;
      $.ajax({url: "http://localhost/wisatasumbar/simpanpaket.php?id="+id+"&id_travel="+id_travel+"&name="+name+"&price="+price, data: "", dataType: 'json', success: function(rows){
          //console.log(rows);
          console.log("http://localhost/wisatasumbar/simpanpaket.php?id="+id+"&id_travel="+id_travel); 
          

      }});//end ajax
      // for(var n = 0;n<paket_id.length){

      // }
    }
  }
  else
  {
    console.log("paket belum dipilih")
  }

}

function show1(){
  console.log('jalan tes lagi'); 
  var name = document.getElementById('name').value;
  var price = document.getElementById('price').value;
  var id = document.getElementById('id').value;
  var id_travel = document.getElementById('id_travel').value;
  var itinerary = document.getElementById('itinerary').value;
  console.log('jalan tes lagi 2');
  if(document.getElementById('name').value != "" & document.getElementById('price').value != ""){
    document.getElementById("data0").style.display = "";
    document.getElementById("data1").style.display = "";
    document.getElementById("data2").style.display = "";
    document.getElementById("caritempatwisata").style.display = "";
    document.getElementById("data-0").style.display = "none";
    document.getElementById("data-1").style.display = "none";
    document.getElementById("data-2").style.display = "none";
    console.log('jalan tes lagi 3,'+id+', '+id_travel+', '+name+', '+price+','+itinerary);
    // console.log("simpanpaket.php?data1=1&data2="+id+"&data3="+id_travel+"&data4="+name+"&data5="+price)
    $.ajax({url:"simpanpaket.php?data1=1&data2="+id+"&data3="+id_travel+"&data4="+name+"&data5="+price+"&data6="+itinerary, data: "", dataType: 'json', success: function(rows){
      console.log('jalan tes lagi 4');
    }});
    
  }else{
    if(document.getElementById('name').value != "" & document.getElementById('price').value == "" & document.getElementById('itinerary').value == ""){
      document.getElementById('name').style.backgroundColor == "none";
      document.getElementById('price').style.backgroundColor == "LightBlue";
      document.getElementById('itinerary').style.backgroundColor == "LightBlue";
    }else{
      if(document.getElementById('name').value != "" & document.getElementById('price').value != ""  & document.getElementById('itinerary').value != ""){
        document.getElementById('name').style.backgroundColor == "LightBlue";
        document.getElementById('price').style.backgroundColor == "LightBlue";
        document.getElementById('itinerary').style.backgroundColor == "LightBlue";
      }else{
        document.getElementById('name').style.backgroundColor == "LightBlue";
        document.getElementById('price').style.backgroundColor == "none";
        document.getElementById('itinerary').style.backgroundColor == "none";
      }
    }
  }
}
var no =1
function show2(){
  var data0 = document.getElementById('id').value;
  var data1 = document.getElementById('objek').value;
  var data2 = document.getElementById('cariobjek').value;
  var data3 = document.getElementById('time').value;
  var name = $("#cariobjek option:selected").text();
        
        $('#hasilcaritempat').append("<tr><td>"+no+"</td><td>"+name+"</td></tr>");
        no++;
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
  $.ajax({url: "simpanpaket.php?data1=2&data2="+data0+"&data3="+data1+"&data4="+data2+"&data5="+data3, data: "", dataType: 'json', success: function(rows){
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
function show3(){
  document.getElementById("data0").style.display = "none";
  document.getElementById("data1").style.display = "none";
  document.getElementById("data2").style.display = "none";
    document.getElementById("caritempatwisata").style.display = "none";
  document.getElementById("data-0").style.display = "";
  document.getElementById("data-1").style.display = "";
  document.getElementById("data-2").style.display = "";
  document.getElementById("name").value = "";
  document.getElementById("price").value = "";
}

    </script>

  </head>
  
  <body onload="tes()">
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>
  <a href="index.html" class="logo"><b>BUKITTINGGI TOURISM</b></a>
  <div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu"></ul>   
  </div>

  <div class="btn-group pull-right">                 
                <!--<button class="btn btn-inverse btn-default btn-sm">-->
                <!--<a type="button"  href="login.php">Logout</a></button>               -->
                <a href="login.php" class="logo1" title="Logout" style="margin-top: 10px"><img src="assets/img/login.png"></a>
            </div> 
  <div class="top-menu">
  
  </ul>
  </div>
</header>
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
  <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="index3.php"><img src="assets/img/jalan.png" class="img-circle" width="60"></a></p>
          <h5 class="centered">TRAVEL AGENT</h5>

        <li class="sub-menu">
          <li><a href="index3.php">Create Package</a></li>
        </li>
        <li class="sub-menu">
          <li><a href="paket.php">My Package</a></li>
        </li>
        <li class="sub-menu">
          <li><a href="booking.php">Booking</a></li>
        </li>
        <li class="sub-menu">
          <li><a href="detailtravel.php">Travel Agent Information</a></li>
        </li>
       <!--  <li class="sub-menu">
          <li><a href="changepassword.php">Change Password</a></li>
        </li> -->
        <!-- <li class="sub-menu">
          <li><a href="tambahpaket.php">ADD PACKAGE</a></li>
        </li>   -->  
    </ul>
              <!-- sidebar menu end-->
  </div>
</aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
     
<section id="main-content">
  <section class="wrapper">
    <div class="col-lg-9 ds" >
     
    <!-- <div class="panel-body text-center" style="height:450px"> -->
      <div class="col-md-20 padding-0">
        <div class="col-md-12 padding-0">
          <div class="panel box-v1">
            <div class="panel-heading bg-white border-none">

              <div class="form-group row">

              </div>  
                <?php
                  $query = $conn->query("SELECT*FROM package");
          $cek = 0;
          $IdPackage = array();
          $a0 = 0;
          while($a = mysqli_fetch_array($query)){
          $IdPackage[$a0] = $a['id'];
          $a0 += 1;
          }
          $dataPackage = count($IdPackage);
          $resArray = array();
          $resArray[0] = 0;
          $a1 = 0;
          for($i=0;$i<$dataPackage;$i++){
          $cek = 0;
          for($j=0;$j<$dataPackage;$j++){
            $k = $i + 1;
            if($k == $IdPackage[$j]){
              $cek = 1;
            }
          }
          if($cek == 0){
            $resArray[$a1] = $i + 1; $a1 += 1;
          }
          }
          if($resArray[0] == 0){
            $resArray[0] = $dataPackage + 1;
          }
                ?>

               
                <div class="col-sm-6">
                    <input name="id" class="form-control hidden" type="text" value="<?php echo $resArray[0]; ?>" id="id" required>
                  </div>

                  <div class="col-sm-6">
                    <input name="id_travel " class="form-control hidden" type="text" value="<?php echo $_SESSION['travel_id']; ?>" id="id_travel" required>
                  </div>



              <div class="form-group row" id="data-0">
                <label for="example-search-input" class="col-sm-3 col-form-label">Package Name</label>
                  <div class="col-sm-6">
                    <input name="name"class="form-control" type="text" value="" id="name" value="" required>
                  </div>
              </div>  

              <div class="form-group row" id="data-1">
                <label for="example-search-input" class="col-sm-3 col-form-label">Price</label>
                  <div class="col-sm-6">
                    <input name="price"class="form-control" type="text" value="" id="price" value="" required>
                  </div>
              </div>

              <div class="form-group row" id="data-2">
                <label for="example-search-input" class="col-sm-3 col-form-label">Itinerary</label>
                  <div class="col-sm-6">
                    <textarea name="itinerary" cols="30" rows="5" class="form-control" style="width: 100%;" id="itinerary">
                    </textarea>
                  </div>
                  <a role='button' class='btn btn-default btn-flat' style="color:black"  onclick='show1()'>SAVE N NEXT</a>
              </div>

          
               

              <div class="form-group row" id="data0" style="display:none;">
                <label for="example-search-input" class="col-sm-3 col-form-label">Choose City</label>
                  <div class="col-sm-6">
                    <select class="form-control select2" style="width: 100%;" id="city" onchange="cariobjek()">
                        <option value="0">-- Choose City --</option>
                          <?php
                            $sql = $conn->query("select * from city");
                            while($row1 = mysqli_fetch_array($sql)){
                              echo "<option value=\"$row1[id]\">$row1[name]</option>";}
                          ?>
                      </select>
                  </div>
              </div> 

              <div class="form-group row" id="data1" style="display:none;">
                <label for="example-search-input" class="col-sm-3 col-form-label">Choose Object</label>
                  <div class="col-sm-6">
                    <select class="form-control select2" style="width: 100%;" id="objek" onchange="cariobjek()">
                        <option value="0">-- Choose Object --</option>
                        <option value="1">Souvenir</option>
                        <option value="2">Mosque</option>
                        <option value="3">Restaurant</option>
                        <option value="4">Tourism</option>
                      </select>
                  </div>
              </div> 


              <div class="form-group row" id="data2" style="display:none;">
                  <label for="example-search-input" class="col-sm-3 col-form-label">Choose Place</label>
                  <div class="col-sm-6">
                    <select class="form-control select2" style="width: 100%;" id="cariobjek">
                    
                  </select>
                  </div>

                <div class="col-sm-12">.</div>
                <label for="example-search-input" class="col-sm-3 col-form-label">Time</label>
                  <div class="col-sm-6">
                    <input class="form-control" style="width: 100%;" id="time" /></div>


                        <a role='button' class='btn btn-default btn-flat' style="color:black"  onclick='show2()'>NEXT</a>

                

                
                    
                    <a role='button' href="index3.php" class='btn btn-default btn-flat' style="color:black">SAVE</a>
                  </div>
              </div> 

              <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                <h4>
                  <span class="icon-map icons icon text-right"></span>
                </h4>
              </div>
            </div>
            <div class="panel-body text-center" style="height:450px">
              <div id="map" style="width: 100%; height: 100%;"></div>
            </div>
          </div>
        </div>
      </div> 

      
    </div>


                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
<div class="col-lg-3 ds" id="caritempatwisata" style="display:none">
  <h3 style="font-size:16px">RESULT</h3>
  <div class="box-body" style="max-height:520px;overflow:auto;">
    <div class="form-group" id="hasilcari1" >
      <table class="table table-bordered" id='hasilcaritempat'></table>
    </div>
  </div>
</div>


                       <!-- USERS ONLINE SECTION -->
            
      <!--main content end-->
      <!--footer start-->
      
    <!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script> 
<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
<script src="assets/js/sparkline-chart.js"></script>    
<script src="assets/js/zabuto_calendar.js"></script>  
<script type="application/javascript"></script>

     <script type="text/javascript">
      // $(function () {
      //   $('#example2').dataTable({
      //     "bPaginate": true,
      //     "bLengthChange": true,
      //     "bFilter": true,
      //     "bSort": true,
      //     "bInfo": true,
      //     "bAutoWidth": false,
      // "iDisplayLength": 10,
      // "oLanguage": {
      //  "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
      //  "sLengthMenu": "Show _MENU_ entries",
      //  "sSearch": "Search:"
      // }
      //   });
      // });
    </script>
  </body>
</html>

