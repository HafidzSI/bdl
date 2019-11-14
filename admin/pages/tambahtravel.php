<div class="col-sm-6">
  <!-- menampilkan peta-->
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

<div class="col-sm-6">
  <!-- menampilkan form add mosque-->
  <section class="panel">
    <div class="panel-body">
      <a class="btn btn-compose">Add Travel's Information</a>
      <div class="box-body">

        <div class="form-group row">
          <form name="form_input" action="act/simpantravelbaru.php" enctype="multipart/form-data" method="POST">
            <?php
            include '../connect.php';
            $query = $conn->query("SELECT MAX(id) AS id FROM travel");
            $result = mysqli_fetch_array($query);
            $idmax = $result['id'];
            //echo "id max = $idmax";
            if ($idmax == null) {
              $idmax = 1;
            } else {
              $idmax++;
            }

            // echo "$query";
            // echo "$result";

            ?>
            <input name="idbaru" id="id" class="form-control hidden" type="text" value="<?php echo $idmax; ?>" required>
        </div>

        <input type="text" class="form-control hidden" id="id" name="id" value="">
        <div class="form-group">
          <label for="geom">Coordinat</label>
          <textarea class="form-control" id="geom" name="geom" readonly required></textarea>
        </div>
        <div class="form-group">
          <label for="nama">Username</label>
          <input type="text" class="form-control" name="name" value="">
        </div>
        <div class="form-group">
          <label for="nama">Travel Agent Name</label>
          <input type="text" class="form-control" name="fullname" value="">
        </div>
        <div class="form-group">
          <label for="nama">Contact Person</label>
          <input type="text" class="form-control" name="cp" value="">
        </div>
        <!--   <div class="form-group">
              <label for="nama">Username</label>
              <input type="text" class="form-control" name="cp" value="">
            </div> -->
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" value="">
        </div>
        <div class="form-group">
          <label for="website">Website</label>
          <input type="text" class="form-control" name="website" value="">
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" class="form-control" name="email" value="">
        </div>
        <div class="form-group">
          <label for="open">Open Hour</label>
          <input type="time" class="form-control" name="open" value="">
        </div>
        <div class="form-group">
          <label for="close">Close Hour</label>
          <input type="time" class="form-control" name="close" value="">
        </div>
        <div class="form-group">
          <label for="nama">Password</label>
          <input type="text" class="form-control" name="password" value="">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" name="description" value="">
        </div>

        <button type="submit" class="btn btn-primary pull-center">Save <i class="fa fa-floppy-o"></i></button>
      </div>

      </form>
    </div>
</div>
</div>
</div>