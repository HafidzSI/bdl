<?php
require 'inc/connect.php';
$id = $_GET["id"];
$query = "SELECT 
travel.id, 
travel.name as name, 
city.name as nama,
travel.fullname, 
travel.cp, 
travel.address, 
travel.website, 
travel.open, 
travel.close, 
travel.description, 
travel.email, 
administrator.password ,
 ST_X(ST_Centroid(travel.geom)) As lng, 
ST_Y(ST_Centroid(travel.geom)) As lat 
FROM city ,travel JOIN  administrator ON administrator.username = travel.name where travel.id='$id'";

$hasil = $conn->query($query);
while ($row = mysqli_fetch_array($hasil)) {
  $id_travel = $row['id'];
  $name = $row['name'];
  $fullname = $row['fullname'];
  $cp = $row['cp'];
  $address = $row['address'];
  $website = $row['website'];
  $open = $row['open'];
  $close = $row['close'];
  $description = $row['description'];
  $email = $row['email'];
  $password = $row['password'];
  $lat = $row['lat'];
  $lng = $row['lng'];
  if ($lat == '' || $lng == '') {
    $lat = '<span style="color:red">Kosong</span>';
    $lng = '<span style="color:red">Kosong</span>';
  }
}
//echo "$id_travel,$name,$cp,$address";
?>


<div class="col-sm-6">
  <section class="panel">
    <header class="panel-heading">
      <h2 class="box-title" style="text-transform:capitalize;"><b> <?php echo $fullname ?></b></h2>

    </header>
    <div class="panel-body">
      <table id="detgal" class="table">
        <tbody style='vertical-align:top;'>
          <tr>
            <td width="150px"><b>Username</b></td>
            <td> :&nbsp; </td>
            <td style='text-transform:capitalize;'><?php echo $name ?></td>
          </tr>
          <tr>
            <td width="150px"><b>Contact Person</b></td>
            <td> :&nbsp; </td>
            <td style='text-transform:capitalize;'><?php echo $cp ?></td>
          </tr>
          <tr>
            <td width="150px"><b>Address</b></td>
            <td> :&nbsp; </td>
            <td style='text-transform:capitalize;'><?php echo $address ?></td>
          </tr>
          <tr>
            <td width="150px"><b>Website</b></td>
            <td> :&nbsp; </td>
            <td style='text-transform:capitalize;'><?php echo $website ?></td>
          </tr>
          <tr>
            <td width="150px"><b>Open Hour</b></td>
            <td> :&nbsp; </td>
            <td style='text-transform:capitalize;'><?php echo $open ?></td>
          </tr>
          <tr>
            <td width="150px"><b>Close Hour</b></td>
            <td> :&nbsp; </td>
            <td style='text-transform:capitalize;'><?php echo $close ?></td>
          </tr>
          <tr>
            <td width="150px"><b>Description</b></td>
            <td> :&nbsp; </td>
            <td style='text-transform:capitalize;'><?php echo $description ?></td>
          </tr>

          <tr>
            <td width="150px"><b>Email</b></td>
            <td> :&nbsp; </td>
            <td style='text-transform:capitalize;'><?php echo $email ?></td>
          </tr>
          <tr>
            <td width="150px"><b>Password</b></td>
            <td> :&nbsp; </td>
            <td style='text-transform:capitalize;'><?php echo $password ?></td>
          </tr>
        </tbody>

      </table>
      <div class="btn-group">
        <a href="?page=formupdatetravel&id=<?php echo $id ?>" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp Edit Information</a>
      </div>
    </div>

  </section>
</div>

<div class="col-sm-5">
  <!-- menampilkan peta-->
  <section class="panel">
    <header class="panel-heading">
      <h3> Picture of <?php echo $name ?></h3>

    </header>

    <div class="content" style="text-align:center;">
      <div class="content" style="text-align:center;">
        <div class="html5gallery" style="max-height:700px; overflow:auto;" data-skin="horizontal" data-width="350" data-height="200" data-resizemode="fit">
          <div class="panel-body">
            <?php $id = $_GET['id'] ?>
            <?php
            $querysearch = "SELECT gallery_travel FROM travel_gallery where id_travel='$id'";

            $hasil = $conn->query($querysearch);

            while ($baris = mysqli_fetch_array($hasil)) {

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
<div class="col-sm-5">
  <!-- menampilkan peta-->
  <section class="panel">
    <header class="panel-heading">
      <h3>Upload Picture of <?php echo $name ?></h3>

    </header>
    <div class="panel-body">
      <!-- form start -->


      <form role="form" action="act/uploadtravel.php" enctype="multipart/form-data" method="post">
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