<?php 
/*session_start();
if(!isset($_SESSION['b'])){
  echo"<script language='JavaScript'>document.location='login.php'</script>";
    exit();
} */
require 'connect.php';
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Bukittinggi Tourism</title>
    
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script src="assets/js/chart-master/Chart.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    var server = "https:///";

  function getserial(serial){
    var input = document.getElementById('serial_number');
    var isidm = "datamodal"+serial;
    var input2 = document.getElementById(isidm).value;
    var isitime = "dataisitime"+serial;
    var input3 = document.getElementById(isitime).value;
    var id_package = "<?php echo $id; ?>";
    input.value = serial;
    console.log("data id page :::::::::::::::: "+id_package);
    console.log("getserial fired with serial : "+serial);
    console.log("hai ini data  : "+input3);
    document.getElementById('judul').innerHTML = input2;
    document.getElementById('n6').value = input3;

  }
	
	function cariobjek(){
      $('#n4').empty();
     
      var city = document.getElementById('city').value;
      var objek =document.getElementById('n3').value;
      
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
                $('#n4').append('<option value="'+id+'">'+name+'</option>');
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
                $('#n4').append('<option value="'+id+'">'+name+'</option>');
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
                $('#n4').append('<option value="'+id+'">'+name+'</option>');
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
                $('#n4').append('<option value="'+id+'">'+name+'</option>');
              }
            }

          }});//end ajax
        }//end if
}
var nourut=1;
function tampilobjek(){
//      $('#tampilobjek').empty();
      //console.log('jalan');
      var cariobjek = document.getElementById('n4').value;
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
        var name = hasil.options[hasil.selectedIndex].text;
        var id = document.getElementById('objek').value;
        $('#hasilcaritempat').append("<tr><td>"+no+"</td><td>"+name+"</td><td>"+id+"</td></tr>");
        
      }

}
function Up1(){
	var z = document.getElementById('n0').value;
	var a = document.getElementById('n1').value;
	$.ajax({url: "simpanpaket.php?data1=33&data2="+z+"&data3="+a, data: "", dataType: 'json', success: function(rows){}});
}
function Up2(){
	var z = document.getElementById('n0').value;
	var a = document.getElementById('n2').value;
	$.ajax({url: "simpanpaket.php?data1=4&data2="+z+"&data3="+a, data: "", dataType: 'json', success: function(rows){}});
  console.log("serial number :"+a,z);
}
function Up3(){
	var z = document.getElementById('n0').value;
	var a = document.getElementById('n3').value;
	var b = document.getElementById('n4').value;
  var g = document.getElementById('serial_number').value;
  var h = document.getElementById('n6').value;
  console.log("serial number :"+g);
	$.ajax({url: "simpanpaket.php?dats1=5&dats2="+z+"&dats3="+a+"&dats4="+b+"&dats5="+g+"&dats6="+h, data: "", dataType: 'json', success: function(rows){}});
}
function Up4(){
  var z = document.getElementById('n0').value;
  var a = document.getElementById('n7').value;
  $.ajax({url: "simpanpaket.php?data1=44&data2="+z+"&data3="+a, data: "", dataType: 'json', success: function(rows){}});
  //window.location.href = "updatepaket.php?id=<?php echo $id; ?>";
  //alert('berhasil');
  console.log("serial number :"+a,z);
  console.log("simpanpaket.php?data1=44&data2="+z+"&data3="+a)
}


  

    </script>
  </head>
 <body> 
  <section id="container" >

<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>
  <a href="index.html" class="logo"><b>BUKITTINGGI TOURISM</b></a>
  <div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu"></ul>   
  </div>

  <div class="btn-group pull-right">                 
               <a href="logout.php" class="logo1" title="Logout" style="margin-top: 10px"><img src="assets/img/logout.png"></a>               
            </div> 

  <div class="top-menu">
  </div>
</header>

<aside>
  <div id="sidebar"  class="nav-collapse ">
  <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
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
        <!-- <li class="sub-menu">
          <li><a href="changepassword.php">Change Password</a></li>
        </li>  -->    
    </ul>
              <!-- sidebar menu end-->
  </div>
</aside>


<section id="main-content">
  <section class="wrapper">
      <h1>YOUR PACKAGE</h1>
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
        <div class="box-header clearfix">
 <?php

$query0 = "SELECT*FROM package where package.id='$id'";
$query1 = "SELECT*FROM object_point where id_package='$id' ORDER BY object_point.serial_number ASC";

$arr0 = array();
$arr1 = array();
$arr2 = array();
$data0=$conn->query($query0);
while($row = mysqli_fetch_array($data0)){
	$arr0 = array(
		'id' => $row['id'],
		'name' => $row['name'],
		'price' => $row['price'],
    'itinerary' => $row['itinerary']
	);
} 
/*
sn   is    iw    iss   it    status     time 

1    -     -      t00 -        4         30   arr4[1]['serial_number'] / arr4[0][0]
2    -     -      t00 -        4         30
3    -     -      t00 -        4         30

*/

$data0=$conn->query($query1); $indexArray = 0;
while($row = mysqli_fetch_array($data0)){
	$arr1[$indexArray] = array(
		$row['serial_number'],
		$row['id_souvenir'],
		$row['id_workship_place'],
		$row['id_restaurant'],
		$row['id_tourism'],
    $row['status'],
    $row['time']
	); $indexArray += 1;
}
  ?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:orange">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="judul">Update</h4>
      </div>
      <div class="modal-body">
        <!-- -->
		
		<div class="form-group row" id="data0">
                <label for="example-search-input" class="col-sm-3 col-form-label">Choose City</label>
                  <div class="col-sm-6">
                    <input type="hidden" id="serial_number" value=""/>
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

              <div class="form-group row" id="data1">
                <label for="example-search-input" class="col-sm-3 col-form-label">Choose Object</label>
                  <div class="col-sm-6">
                    <select class="form-control select2" style="width: 100%;" id="n3" onchange="cariobjek()">
                        <option value="0">-- Choose Object --</option>
                        <option value="1">Souvenir</option>
                        <option value="2">Mosque</option>
                        <option value="3">Restaurant</option>
                        <option value="4">Tourism</option>
                      </select>
                  </div>
              </div> 
			  
        <div class="form-group row" id="data2">
                <label for="example-search-input" class="col-sm-3 col-form-label">Choose Place</label>
                  <div class="col-sm-6">
                    <select class="form-control select2" style="width: 100%;" id="n4"></select>
                  </div>
        </div> 

        <div class="form-group row" id="data3">
                <label for="example-search-input" class="col-sm-3 col-form-label">Time</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" style="width: 100%;" id="n6" />
                  </div>
        </div> 
		
		<!-- -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Up3()">Save</button>
      </div>
    </div>

  </div>
</div>
  <div class="col-sm-8"> 
                  <section class="panel">
                      <header class="panel-heading">
            <h2 class="box-title" style="text-transform:capitalize;"><b></b></h2>
              
                      </header>
                      <div class="panel-body">
              <table id="detgal" class="table table-striped table-hover table-condensed">
          <tbody  style='vertical-align:top;'>
            <?php 
			echo "  <tr>
                <td><b>Name: </b></td>
                <td colspan='5'>
                  <input class='form-control' id='n0' value='".$id."' style='display:none' />
                  <input class='form-control' id='n1' value='".$arr0['name']."' /></td>
                <td><button class='form-control' id='' onclick='Up1()'>Update</button></td>
              </tr>";

			echo "  <tr>
                <td><b>Price: </b></td>
                <td colspan='5'><input class='form-control' id='n2' value='".$arr0['price']."' /></td>
                <td><button class='form-control' id='' onclick='Up2()'>Update</button></td>
              </tr>";
$x=$arr0['itinerary'];
      echo "  <tr>
                <td><b>Itinerary: </b></td>
                <td colspan='5'><textarea class='form-control' rows='15' id='n7' value='$x'>$x</textarea></td>
                <td><button class='form-control' id='' onclick='Up4()'>Update</button></td>
              </tr>";
              
              //echo "initerary = $x";

			echo "<tr><td colspan='6'></br> <b>Destinasi : </b></br><td></tr>";
      $a = count($arr1);
			$arr2[4] = "tourism";
			$arr2[3] = "restaurant";
			$arr2[2] = "workship_place";
			$arr2[1] = "souvenir";
			for($i=0;$i<$a;$i++){
				$column = 0;
				$query2 = "SELECT
					a.name AS n1,
					b.name AS n2
       
					FROM ".$arr2[$arr1[$i][5]]." AS a, city as b   
					
					WHERE st_contains(b.geom, a.geom) and a.id = '".$arr1[$i][$arr1[$i][5]]."'
				";   //  $arr1[$i][5] adalah status
				$data0=$conn->query($query2);
				while($row = mysqli_fetch_array($data0)){
					echo "<tr>
                  <td>".$arr1[$i][0]."</td>
                  <td>".$row['n2']."</td>
                   
                  <td> &nbsp ".$row['n1']."</td>
                  <td> &nbsp ".$arr1[$i][6]."</td>
                  <td>
                      <input style='display:none' id='datamodal".$arr1[$i][0]."' value='".$arr1[$i][0].". ".$row['n2']." :: ".$row['n1']."' />
                      <input style='display:none' id='dataisitime".$arr1[$i][0]."' value='".$arr1[$i][6]."' />
						          <button class='form-control' id='".$arr1[$i][0]."' data-toggle='modal' data-target='#myModal' onclick='getserial(this.id)'>Update</button>
						
                  </td>
                </tr>";
				}
			}
             ?>
          </tbody>
          
        </table>
        
                      </div>
</section>
  </div>
  
</body>
</html>
                  
              