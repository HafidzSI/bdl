 <?php
  include 'connect.php';
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
   <script type="text/javascript">
     var server = "https://gissurya.org/wisatasumbar/";
   </script>
 </head>
 <section id="container">

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
     <div id="sidebar" class="nav-collapse ">
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
       <h1><b>YOUR PACKAGE</b></h1>
       <div class="row">
         <div class="col-xs-20">
           <div class="box">
             <div class="box-header clearfix">
               <?php
                require 'connect.php';
                $id = $_GET["id"];

                $query0 = "SELECT*FROM package where package.id='$id'";
                $query1 = "SELECT*FROM object_point where id_package='$id' ORDER BY object_point.serial_number ASC";

                $arr0 = array();
                $arr1 = array();
                $arr2 = array();

                $data0 = $conn->query($query0);
                while ($row = mysqli_fetch_array($data0)) {
                  $arr0 = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'price' => $row['price'],
                    'itinerary' => $row['itinerary']
                  );
                }
                $data0 = $conn->query($query1);
                $indexArray = 0;
                while ($row = mysqli_fetch_array($data0)) {
                  $arr1[$indexArray] = array(
                    $row['serial_number'],
                    $row['id_souvenir'],
                    $row['id_workship_place'],
                    $row['id_restaurant'],
                    $row['id_tourism'],
                    $row['status'],
                    $row['time']
                  );
                  $indexArray += 1;
                }
                ?>

               <div class="col-sm-11">
                 <section class="panel">
                   <header class="panel-heading">
                     <h2 class="box-title" style="text-transform:capitalize;"><b></b></h2>

                   </header>
                   <div class="panel-body">
                     <table id="detgal" class="table">
                       <tbody style='vertical-align:top;'>
                         <?php


                          echo "<tr><td><b>Name:</b>  </td><td>" . $arr0['name'] . "</td></tr>";
                          echo "<tr><td><b>Price:</b>  </td><td>" . $arr0['price'] . "</td></tr>";
                          echo "<tr><td><b>Itinerary:</b>  </td><td><br>" . $arr0['itinerary'] . "</td></tr>";
                          echo "<tr><td colspan='3'></br> <b>Destinasi : </b></br><td></tr>";
                          $a = count($arr1);
                          $arr2[4] = "tourism";
                          $arr2[3] = "restaurant";
                          $arr2[2] = "workship_place";
                          $arr2[1] = "souvenir";
                          for ($i = 0; $i < $a; $i++) {
                            $column = 0;
                            $query2 = "SELECT
					a.name AS n1,
					b.name AS n2
					FROM " . $arr2[$arr1[$i][5]] . " AS a, city as b
					
					WHERE st_contains(b.geom, a.geom) and a.id = '" . $arr1[$i][$arr1[$i][5]] . "'
				";
                            $data0 = $conn->query($query2);
                            while ($row = mysqli_fetch_array($data0)) {
                              echo "<tr><td>" . $arr1[$i][0] . "<td><td>" . $row['n2'] . "<td><td> &nbsp " . $row['n1'] . "<td><td> &nbsp " . $arr1[$i][6] . "<td></tr>";
                            }
                          }
                          ?>
                       </tbody>

                     </table>
                     <table id="tab">

                     </table>
                     <div class="btn-group">
                       <a href="updatepaket.php?id=<?php echo $id; ?>" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp Edit Information</a>
                     </div>
                     <a class='btn btn-round' role='button' href='#info' onclick='' title='Nearby' aria-controls='Nearby'><i class='fa fa-plus' style='color:black;'></i><label>&nbsp Add Info</label>
                     </a>
                   </div>

                   <div id='info'>
                     <form method="post" action="addinfo2.php">
                       <input type="text" class="form-control hidden " id="id" name="id" value="<?php echo $id ?>">
                       <input type="text" class="form-control hidden " id="username" name="username" value="">
                       <table class="table">
                         <tbody style='vertical-align:top;'>
                           <tr>
                             <td><b>Essential Information :</td>
                             <td><textarea cols="40" rows="5" name="info"></textarea></td>
                           </tr>
                           <tr>
                             <td><input type="submit" value="Post Information" /></td>
                             <td></td>
                           </tr>


                         </tbody>
                       </table>

                     </form>
                   </div>

                   <?php

                    $id = $_GET["id"];
                    //echo "ini $id";

                    $sqlreview = "SELECT * from info where id_package = '$id'";

                    $result = $conn->query($sqlreview);
                    ?>
                   <table class="table">
                     <thead>
                       <th>Tanggal</th>
                       <th class="centered">Info</th>
                       <th>Action</th>
                     </thead>
                     <?php
                      while ($rows = mysqli_fetch_array($result)) {
                        $tgl = $rows['tanggal'];
                        $info = $rows['info'];
                        $id_info = $rows['id_info'];
                        echo "<tr><td>$tgl</td><td>$info</td><td><a href='info_delete.php?id_info=$id_info' class='btn btn-sm btn-default' title='Delete'><i class='fa fa-trash-o'></i></a></td></tr>";
                      }


                      ?>

                   </table>

                 </section>
               </div>