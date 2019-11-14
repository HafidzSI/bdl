 <?php
require 'inc/connect.php';
$id = $_GET["id"];
$query = "SELECT restaurant.id, 
restaurant.name as restaurant_name, 
restaurant.address, 
restaurant.open, 
restaurant.close, 
restaurant.price, 
restaurant.description, 
city.name as city_name, 
ST_X(ST_Centroid(restaurant.geom)) As lng, 
ST_Y(ST_Centroid(restaurant.geom)) As lat 
FROM restaurant, city
where st_contains(city.geom, restaurant.geom) and restaurant.id='$id'";


$hasil=$conn->query($query);
while($row = mysqli_fetch_array($hasil)){
  $id=$row['id'];
  $name=$row['restaurant_name'];
  $address=$row['address'];
  $open=$row['open'];
  $close=$row['close'];
  $price=$row['price'];
  $description=$row['description'];
  $city_name=$row['city_name'];
  $lat=$row['lat'];
  $lng=$row['lng'];
  if ($lat=='' || $lng==''){
    $lat='<span style="color:red">Kosong</span>';
    $lng='<span style="color:red">Kosong</span>';
  }
  //   if ($image=='null' || $image=='' || $image==null){
  //   $image='foto.jpg';
  // }
}
  ?>
		
 
  <div class="col-sm-6"> 
                  <section class="panel">
                      <header class="panel-heading">
						<h2 class="box-title" style="text-transform:capitalize;"><b> <?php echo $name ?></b></h2>
              
                      </header>
                      <div class="panel-body">
							<table>
					<tbody  style='vertical-align:top;'>
						<tr><td width="150px"><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>
						<tr><td><b>Open Hour</b></td><td>:</td><td><?php echo $open ?></td></tr>
						<tr><td><b>Close Hour</b></td> <td> :</td><td><?php echo $close ?></td></tr>
						<tr><td><b>Price<b> </td><td>: </td><td><?php echo $price ?></td></tr>
						<tr><td><b>Description<b> </td><td>: </td><td><?php echo $description ?></td></tr>
						<tr><td><b>City<b> </td><td>: </td><td><?php echo $city_name?></td></tr>
						<tr><td><b>Koordinat<b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <br><b>Longitude</b> : <?php echo $lng ?></td></tr>
						
					</tbody>
					
				</table>
				<div class="btn-group">
						<a href="?page=formupdaterm&id=<?php echo $id ?>" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp Edit Information</a>
				</div>
                      </div>

</section>
	</div>
	
	<div class="col-sm-5"> <!-- menampilkan peta-->
                  <section class="panel">
                      <header class="panel-heading">
                          <h3> Picture of <?php echo $name ?></h3>
              
                      </header>
                      <div class="panel-body">
                         <?php $id=$_GET['id'] ?>
  <?php
  $querysearch="SELECT gallery_restaurant FROM restaurant_gallery where id_restaurant='$id'";

  $hasil=$conn->query($querysearch);
   
   while($baris = mysqli_fetch_array($hasil))
   {
    
    //echo $baris['gallery_culinary'];
    ?>
        <image src="../foto/<?php echo $baris['gallery_restaurant']; ?>" style="width:10%;">
      <?php
   }
  ?>
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
  

  <form role="form" action="act/uploadfotorm.php" enctype="multipart/form-data" method="post">
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
                  
              
                  
              