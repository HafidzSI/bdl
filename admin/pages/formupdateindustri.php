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

 <div class="col-sm-6"> <!-- menampilkan form add mosque-->
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Update Souvenir's Information</a>
                        <div class="box-body">
            <div class="form-group row">
              <form role="form" method="post" action="act/saveupdateindustri.php" enctype="multipart/form-data">
              <?php if (isset($_GET['id']))
              {
                $id=$_GET['id'];
                $sql = $conn->query("SELECT 
                   souvenir.id,
                  souvenir.name as namaa, 
                   souvenir.address as nama, 
                    souvenir.open, 
                     souvenir.close, 
                      souvenir.description, 
                      city.name as name, 
                      ST_AsText(souvenir.geom) as geom 
                      FROM souvenir, city
                       where souvenir.id='$id'" );
                    
                $data =  mysqli_fetch_array($sql);
              }
              ?>
            </div>

                 <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                  <label for="geom">Coordinat</label>
                  <textarea class="form-control" id="geom" name="geom" readonly required><?php echo $data['geom'] ?></textarea>
                </div> 
                <div class="form-group">
                  <label for="nama">Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $data['namaa'] ?>">
                </div>
                <div class="form-group">
                  <label for="nama">Address</label>
                  <input type="text" class="form-control" name="address" value="<?php echo $data['nama'] ?>">
                </div>
              <!--   <div class="form-group">
                  <label for="id_kota">City</label>
                  <select required name="id_city" id="id_city" class="form-control">
                    <?php
                      $id = $conn->query("select * from city");
                      while($row1 = mysqli_fetch_assoc($id))
                      {
                        if($data[id]==$row1[id]){
                          echo "<option value=\"$row1[id]\" selected>$row1[name]</option>";
                        }
                        else{
                          echo "<option value=\"$row1[id]\">$row1[name]</option>";
                        }
                      }                 
                    ?>
                  </select>
                </div> -->
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

            <!-- <div class="form-group">
              <label class="control-label col-md-3">Image Upload</label>
              <div class="col-md-9">

                  <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                          <img src="../foto/no.png" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                          <span class="btn btn-theme02 btn-file">
                            <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" class="default" name="image"/>
                          </span>
                          <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                  </div>
                  <span class="label label-danger">NOTE!</span>
                 <span>Maximum image size of 500KB</span>
              </div>
          </div>
 -->
             <button type="submit" class="btn btn-primary pull-center">Save <i class="fa fa-floppy-o"></i></button> 
             <script src="inc/mapdrawindustri.js" type="text/javascript"></script>
            </div>
          </div>
        </div>
      </div>
   