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
                <!--   <button class="btn btn-inverse btn-default btn-sm"> -->
              <a  href="logout.php" class="logo1" title="Logout" style="margin-top: 10px"><img src="assets/img/login.png"></a></button>               
            </div> 

  <div class="top-menu">
  </div>
</header>

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
        <li class="sub-menu">
          <li><a href="changepassword.php">Change Password</a></li>
        </li> 
    </ul>
              <!-- sidebar menu end-->
  </div>
</aside>

<section id="main-content">
  <section class="wrapper">
     <!--  <h1>TRAVEL AGENT INFORMATION</h1> -->
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
        <div class="box-header clearfix">


<div class="box-body">
          <!-- <table id="" class="table table-hover table-bordered table-striped"> -->

<?php

$id = $_SESSION['travel_id'];
$query = "SELECT travel.id, travel.name as name, travel.cp as cp, travel.address, travel.website, travel.open, travel.close, travel.description, travel.email, travel.fullname, administrator.password FROM travel JOIN administrator ON administrator.username = travel.name where travel.id='".$id."'";

$hasil=$conn->query($query);
while($row = mysqli_fetch_array($hasil)){
  $id_travel=$row['id'];
  $name=$row['name'];
  $fullname=$row['fullname'];
  $cp=$row['cp'];
  $address=$row['address'];
  $website=$row['website'];
  $open=$row['open'];
  $close=$row['close'];
  $description=$row['description'];
  $email=$row['email'];
  // $password=$row['password'];
}
?>
   <div class="col-sm-6"> 
                  <section class="panel">
                      <header class="panel-heading">
            <h2 class="box-title" style="text-transform:capitalize;"><b> <?php echo $fullname ?></b></h2>
              
                      </header>
                      <div class="panel-body">
              <table id="detgal" class="table">
          <tbody  style='vertical-align:top;'>
          <tr><td width="150px"><b>Username</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $name ?></td></tr>  
            <tr><td width="150px"><b>Contact Person</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $cp ?></td></tr>  
            <tr><td width="150px"><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>  
            <tr><td width="150px"><b>Website</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $website ?></td></tr>  
            <tr><td width="150px"><b>Open Hour</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $open ?></td></tr>  
            <tr><td width="150px"><b>Close Hour</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $close ?></td></tr>
             <tr><td width="150px"><b>Description</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $description ?></td></tr>  

            <tr><td width="150px"><b>Email</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $email ?></td></tr>    
 <!--            <tr><td width="150px"><b>Password</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $password ?></td></tr>             -->
          </tbody>
          
        </table>
        <div class="btn-group">
            <a href="?page=agenupdateinfo&id=<?php echo $id?>" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp Edit Information</a>
        </div>
<a class='btn btn-round' role='button'   onclick='' title='Nearby' aria-controls='Nearby'><i class='fa fa-plus' style='color:black;'></i><label>&nbsp Add Info</label>
        </a>
      </div>

      <div  id='info'>
          <form method="post" action="addinfo.php">
            <input type="text" class="form-control hidden " id="id" name="id" value="<?php echo $id ?>">
            <input type="text" class="form-control hidden " id="username" name="username" value="<?php echo $username ?>">
            <table class="table">
              <tbody  style='vertical-align:top;'>
                <tr><td><b>Essential Information :</td><td><textarea cols="40" rows="5" name="info"></textarea></td></tr>
                            <tr><td><input type="submit" value="Post Information"/></td><td></td></tr>

                
              </tbody>          
            </table>

          </form>
          </div>

          <?php 
                     
                  $id = $_GET["id"];
                      //echo "ini $id";

                  $sqlreview = "SELECT * from info where id_travel = '$id'";
                                              
                  $result = $conn->query($sqlreview);
          ?>
                    <table class="table">
                      <thead><th>Tanggal</th><th class="centered">Info</th><th>Action</th></thead>
                    <?php  
                      while ($rows = mysqli_fetch_array($result)) 
                        {
                          $tgl = $rows['tanggal'];
                          $info = $rows['info'];
                          $id_info =$rows['id_info'];
                          echo "<tr><td>$tgl</td><td>$info</td><td><a href='act/info_delete2.php?id_info=$id_info' class='btn btn-sm btn-default' title='Delete'><i class='fa fa-trash-o'></i></a></td></tr>";
                        }
                    

                       ?>               
                    
                  </table>

</div>
<div class="col-sm-5"> <!-- menampilkan peta-->
                  <section class="panel">
                      <header class="panel-heading">
                          <h3> Picture of <?php echo $name ?></h3>
              
                      </header>

                       <div class="content" style="text-align:center;">
                        <div class="content" style="text-align:center;">
                              <div class="html5gallery" style="max-height:700px; overflow:auto;" data-skin="horizontal" data-width="350" data-height="200" data-resizemode="fit"> 
                      <div class="panel-body">
                         <?php $id=$_GET['id'] ?>
  <?php
  $querysearch="SELECT gallery_travel FROM travel_gallery where id_travel='$id'";

  $hasil=$conn->query($querysearch);
   
   while($baris = mysqli_fetch_array($hasil))
   {
    
    //echo $baris['gallery_culinary'];
    ?>
        <image src="../foto/<?php echo $baris['gallery_travel']; ?>" style="width:10%;">
      <?php
   }
  ?>
          
            
           
            </div>
            </div>
            </div>

                  </section>
              </div>
        <div class="col-sm-5"> <!-- menampilkan peta-->
                  <section class="panel">
                      <header class="panel-heading">
                          <h3>Upload Picture of <?php echo $name ?></h3>
              
                      </header>
                      <div class="panel-body">
                          <!-- form start -->
  

  <form role="form" action="uploadfototravel.php" enctype="multipart/form-data" method="post">
    <div class="box-body">
    
    <input type="text" class="form-control hidden" name="id" value="<?php echo $id ?>">
    <div class="form-group">
     <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
    </div>
    <span style="color:red;">*Maximum image size 500kb</span>
    </div><!-- /.box-body -->

    <div class="box-footer">
    <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
    </div>
  </form>
                      </div>
            
            
                  </section>
              </div>

</section>



  </div>



                  
              


</section>

</section>

