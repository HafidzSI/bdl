<div class="col-sm-6"> <!-- menampilkan peta-->
  <section class="panel">
      <header class="panel-heading">
          <h3>                    
          <input id="latlng" type="text" class="form-control" style="width:200px" value="" placeholder="Latitude, Longitude">
          <button class="btn btn-default my-btn" id="btnlatlng" type="button" title="Geocode"><i class="fa fa-search"></i></button>
          <button class="btn btn-default my-btn" id="delete-button" type="button" title="Remove shape"><i class="fa fa-trash"></i></button> </h3>
      </header>
      <div class="panel-body">
          <div id="map" style="width:100%;height:420px; z-index:50"></div>
      </div>
  </section>
</div>

<div class="col-lg-6 ds">
  <div class="panel panel-bd " >
      <div class="panel-heading" style="height:45px;">
        <div class="panel-title">
          <h4>Update Travel's Information</h4>
        </div>
      </div>
      <div class="panel-body" style="height:580px;">
        <div class="message_inner" style="height:560px;overflow:auto;">
          <div class="message_widgets">
          <!--  <div class="form-group row"> -->
           <form role="form" method="post" action="act/saveupdatetravel.php" enctype="multipart/form-data">
            <?php 
            include '../connect.php';
            if (isset($_GET['id']))
              {
                $id=$_GET['id'];
                $sql = $conn->query("SELECT 
                  travel.id, 
                  travel.name,  
                  travel.cp, 
                  ST_AsText(geom) as geom, 
                  travel.address, 
                  travel.website, 
                  travel.open, 
                  travel.close, 
                  travel.description, 
                  travel.email, 
                  travel.fullname
                
                  FROM travel where travel.id='$id'" );
                $sql2 = $conn->query("SELECT password FROM administrator where travel_id='$id'");

                while ($data =  mysqli_fetch_array($sql) )
                {

              ?>
              <!-- </div> -->

            <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $id ?>">
            <div class="form-group">
              <label for="geom">Coordinat</label>
              <textarea class="form-control" id="geom" name="geom" readonly required><?php echo $data['geom'] ?></textarea>
            </div>
            <div class="form-group row">
             
                <input name="id"class="form-control hidden" type="text" value="<?php echo $id?>" id="id">
            </div>

            <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>">
            </div>
            <div class="form-group">
              <label for="nama">Travel Agent Name</label>
              <input type="text" class="form-control" name="fullname" value="<?php echo $data['fullname'] ?>">
            </div>
            <div class="form-group">
              <label for="nama">Contact Person</label>
              <input type="text" class="form-control" name="cp" value="<?php echo $data['cp'] ?>">
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <input type="text" class="form-control" name="address" value="<?php echo $data['address'] ?>">
            </div>
            <div class="form-group">
              <label for="website">Website</label>
              <input type="text" class="form-control" name="website" value="<?php echo $data['website'] ?>">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" name="email" value="<?php echo $data['email'] ?>">
            </div>
            <div class="form-group">
              <label for="open">Open Hour</label>
              <input type="time" class="form-control" name="open" value="<?php echo $data['open'] ?>">
            </div>
            <div class="form-group">
              <label for="close">Close Hour</label>
              <input type="time" class="form-control" name="close" value="<?php echo $data['close'] ?>">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="<?php echo $data['description'] ?>">
            </div>
            <?php 
          }
              while ($data2=mysqli_fetch_array($sql2)) {
                
              


             ?>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" name="password" value="<?php echo $data2['password'] ?>">
            </div>
<?php
            }

              }
              ?>
           <button type="submit" class="btn btn-primary pull-center">Save <i class="fa fa-floppy-o"></i></button> 
           <script src="inc/mapdrawtravel.js" type="text/javascript"></script>

            </div>
          </div>
        </div>
      </div>
    </div>


  
    