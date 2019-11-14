<div class="col-lg-7 ds">
      <div class="panel panel-bd" style="width: 610px;" >
        <div class="panel-heading" style="height:45px;">
          <div class="panel-title" >
            <div style="float:left;width:75%"><h4>Tourism Map</h4></div>
            <div style="float:right;width:25%"  align="right" ></div>
          </div>
        </div> 
                  
                  <!--section class="wrapper"-->
        <div class="panel-body text-center" style="height:450px">
          <div id="map-canvas"  style="height:450px; width: 580px">
            <div id="map"></div>
            <div id="floating-panel">
              <button class="btn btn-default my-btn" id="delete-button" type="button" title="Remove shape"><i class="glyphicon glyphicon-trash"></i></button>
              <input id="latlng" type="text" value="" placeholder="latitude, longitude">
              <button class="btn btn-default my-btn" id="btnlatlng" type="button" title="Geocode"><i class="glyphicon glyphicon-search"></i></button>
            </div>
          </div>
        </div>
      </div>
</div>


<div class="col-lg-5 ds">
      <div class="panel panel-bd " >
      <div class="panel-heading" style="height:45px;">
        <div class="panel-title">
          <h4>Detail Information</h4>
        </div>
      </div>
      <div class="panel-body" style="height:580px;">
        <div class="message_inner" style="height:560px;overflow:auto;">
          <div class="message_widgets">


            <div class="form-group row">
              <?php 
              include '../connect.php';
              if (isset($_GET['id']))
              {
                $id=$_GET['id'];
                $sql = $conn->query("SELECT id, name, address, date, open, close, ticket, id_city, id_event_type, id_organizer, ST_AsText(geom) as geom FROM event where id='$id'" );
                    
                $data =  mysqli_fetch_array($sql);
              }
              ?>

              
              <form role="form" method="post" action="act/saveupdateevent.php" enctype="multipart/form-data">
                <input name="id"class="form-control hidden" type="text" value="<?php echo $id?>" id="id">
                
                  <label for="geom" class="col-sm-5 col-form-label">Coordinate
                    <span style="color:green">*</span>
                  </label>
                <div class="col-sm-7">
                  <input name="geom"class="form-control " type="text" value="<?php echo $data ['geom']?>" id="geom" readonly required>
                </div>
                </div>
                
            <div class="form-group row">
              <label for="name" class="col-sm-5 col-form-label">Name
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="name" class="form-control" type="text" value="<?php echo $data ['name']?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="address" class="col-sm-5 col-form-label">Address
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="address" class="form-control" type="text" value="<?php echo $data ['address']?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="date" class="col-sm-5 col-form-label">Date 
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="date" class="form-control" type="date" value="<?php echo $data['date(format)']?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="open" class="col-sm-5 col-form-label">Open Hour 
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="open" class="form-control" type="time" value="<?php echo $data['open']?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="close" class="col-sm-5 col-form-label">Close Hour
                <span style="color:green">*</span>
              </label>
                <div class="col-sm-7">
                  <input name="close" class="form-control" type="time" value="<?php echo $data['close']?>">
                </div>
            </div>

            <div class="form-group row">
              <label for="ticket" class="col-sm-5 col-form-label">Ticket
                <span class="required"></span>
              </label>
              <div class="col-sm-7">
                <input name="ticket"class="form-control" type="text" value="<?php echo $data['ticket']?>">
              </div>
            </div> 

            <div class="form-group">
                <label for="id_kota">City</label>
                <select required name="id_kota" id="id_kota" class="form-control">
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
              </div>

            

            <!-- <div class="form-group">
                  <label for="file">Upload Foto</label>
                  <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
            </div> -->
            <button type="submit" class="btn btn-primary pull-right">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
 