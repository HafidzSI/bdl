<?php
require 'act/counttw.php';
?>

<?php 
	$sql1 = "select count(*) as hitung from souvenir";
	$sql2 = "select count(*) as hitung from workship_place";
	
	$query2 = $conn->query($sql1);
	$query3 = $conn->query($sql2);
	$data1 = mysqli_fetch_assoc($query2);
	$data2 = mysqli_fetch_assoc($query3);
?>

<div class="row">
  <div class="col-lg-5 col-xs-12">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $data['hitung'] ?></h3>
        <p><span>Tourism</span></p>
      </div>
      <div class="icon">
        <i class="fa fa-tag"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-5 col-xs-12">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $data['hitung'] ?></h3>
        <p><span>Restaurant</span></p>
      </div>
      <div class="icon">
        <i class="fa fa-tag"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-5 col-xs-12">
    <div class="small-box bg-red">
      <div class="inner">
	<h3><?php echo $data2['hitung'] ?></h3>
        <p><span>Worship Place</span></p>
      </div>
      <div class="icon">
        <i class="fa fa-tag"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-5 col-xs-12">
    <div class="small-box bg-yellow">
      <div class="inner">
	<h3><?php echo $data1['hitung'] ?></h3>        
	<p><span>Souvenir</span></p>
      </div>
      <div class="icon">
        <i class="fa fa-tag"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-5 col-xs-12">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $data['hitung'] ?></h3>
        <p><span>Travel Agent</span></p>
      </div>
      <div class="icon">
        <i class="fa fa-tag"></i>
      </div>
    </div>
  </div>
</div>