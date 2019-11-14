<div class="col-lg-7 ds">
      <div class="panel panel-bd" style="width: 610px;" >
        <div class="panel-heading" style="height:45px;">
          <div class="panel-title" >
            <div style="float:left;width:75%"><h4>Tourism Map</h4></div>
              <div style="float:right;width:25%" align="right" >
              </div>
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
              <form  name = "form_input" action="act/simpaneventbaru.php" enctype="multipart/form-data" method="POST">
                <?php
                include '../inc/connect.php';
                    $query = $conn->query("SELECT MAX(id) AS id FROM event");
                    $result = mysqli_fetch_array($query);
                    $idmax = $result['id'];
                    if ($idmax==null) {$idmax=1;}
                    else {$idmax++;}
                ?>
                 <input name="id"class="form-control hidden" type="text" value="<?php echo $idmax;?>" id="id" required>

                <label for="geom" class="col-sm-5 col-form-label">Coordinate
                <span style="color:green">*</span>
                  </label>
                    <div class="col-sm-7">
                      <input name="geom"class="form-control" type="text" value="" id="geom" readonly required>
                    </div>
            </div>

            <div class="form-group row">
              <label for="example-search-input" class="col-sm-5 col-form-label">Name 
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="name" class="form-control" type="text" value="" id="name" value="" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-email-input" class="col-sm-5 col-form-label">Address 
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="address" class="form-control" type="text" value="" id="address">
              </div>
            </div>

            <div class="form-group row">
              <label for="open" class="col-sm-5 col-form-label">Date
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="date" class="form-control" type="date" value="" id="date" required>
              </div>
            </div>            

            <div class="form-group row">
              <label for="open" class="col-sm-5 col-form-label">Open Hour
                <span style="color:green">*</span>
              </label>
              <div class="col-sm-7">
                <input name="open" class="form-control" type="time" value="" id="open" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="close" class="col-sm-5 col-form-label">Close Hour
                <span style="color:green">*</span>
              </label>
                <div class="col-sm-7">
                  <input name="close" class="form-control" type="time" value="" id="close" required>
                </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-sm-5 col-form-label">Ticket
                <span class="required"></span>
              </label>
              <div class="col-sm-7">
                <input name="ticket"class="form-control" type="text" value="" id="ticket">
              </div>
            </div> 

            <div class="form-group">
                <label for="city"><span style="color:red">*</span>City</label>
                <select required name="city" id="kota" class="form-control" onchange="">
                  <?php
                    $sql = $conn->query("select * from city");
                    while($row1 = mysqli_fetch_array($sql)){
                      echo "<option value=\"$row1[id]\">$row1[name]</option>";}
                  ?>
                </select>
            </div>

            <div class="form-group">
                <label for="event_type"><span style="color:red">*</span>Event Type</label>
                <select required name="event_type" id="event_type" class="form-control" onchange="">
                  <?php
                    $sql = $conn->query("select * from event_type");
                    while($row1 = mysqli_fetch_array($sql)){
                      echo "<option value=\"$row1[id]\">$row1[name]</option>";}
                  ?>
                </select>
            </div>

            <div class="form-group">
                <label for="organizer"><span style="color:red">*</span>Organizer</label>
                <select required name="organizer" id="organizer" class="form-control" onchange="">
                  <?php
                    $sql = $conn->query("select * from organizer");
                    while($row1 = mysqli_fetch_array($sql)){
                      echo "<option value=\"$row1[id]\">$row1[name]</option>";}
                  ?>
                </select>
            </div>

              <!-- <div class="form-group">
                  <label for="file">Upload Foto</label>
                  <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
              </div> -->

            <input name="simpan" class="btn btn-default" type="submit" value="save">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>