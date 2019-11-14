<?php 
session_start();
if(!isset($_SESSION['b'])){
  echo"<script language='JavaScript'>document.location='login.php'</script>";
    exit();
}
include("../connect.php");?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Bukittinggi Tourism</title>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&libraries=drawing"></script>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <script src="../assets/js/chart-master/Chart.js"></script>
    <script type="text/javascript" src="inc/mapdraw.js"></script>
    <script type="text/javascript">

    var server = "http://localhost/paketwisatahalal/";
    </script>
    <style>


  #map{
    height: 580px;
  }
  #map-canvas {
    position:relative;
  }
  #floating-panel {
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 5;
    background-color: #fff;
    padding: 1px;
    border: 1px solid #999;
    border-radius: 3px;
  }
  #latlng{
    width: 200px;
  }
  .my-btn{
    padding:0px 6px;
    vertical-align: baseline;
  }
  </style>
  </head>
  <body >
  <section id="container" >
  
<header class="header black-bg">
  <?php include ("inc/headeruser.php"); ?>
</header>
     
<aside>
  <div id="sidebar"  class="nav-collapse ">
  <!-- sidebar menu start-->
    <?php include ("inc/sidebaruser.php"); ?>
              <!-- sidebar menu end-->
  </div>
</aside>
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
       <?php
      $p=$_GET['page'];
      $page="pages/".$p.".php";
      if(file_exists($page)){
        include($page);
      }elseif($p==""){
        include('pages/home.php');
      }else{
        include('pages/404.php');
      }
      ?>
      </div>
  </section>
</section>
</section>
      
    <!-- js placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/jquery-1.8.3.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../assets/js/jquery.scrollTo.min.js"></script>
<script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
<script src="../assets/js/common-scripts.js"></script> 
<script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
<script src="../assets/js/sparkline-chart.js"></script>    
<script src="../assets/js/zabuto_calendar.js"></script>  
<script type="application/javascript"></script>
<script src="plugins/datatables/dataTables.min.css" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.min.js" type="text/javascript"></script>
<script>
            $(document).ready(function () {

                "use strict"; // Start of use strict

                $('#dataTableExample1').DataTable({
                    "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
                    "lengthMenu": [[6, 25, 50, -1], [6, 25, 50, "All"]],
                    "iDisplayLength": 6
                });

                $("#dataTableExample2").DataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    buttons: [
                        {extend: 'copy', className: 'btn-sm'},
                        // {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                        // {extend: 'print', className: 'btn-sm'}
                    ]
                });

            });
        </script>
  </body>
</html>

