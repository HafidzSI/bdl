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
      <a class="btn btn-compose">Add Worship Place's Information</a>
      <div class="box-body">

        <div class="form-group row">
          <form name="form_input" action="act/simpanmasjidbaru.php" enctype="multipart/form-data" method="POST">
            <?php
            include '../connect.php';
            $query = $conn->query("SELECT MAX(id) AS id FROM workship_place");
            $result = mysqli_fetch_array($query);
            $idmax = $result['id'];
            if ($idmax == null) {
              $idmax = 1;
            } else {
              $idmax++;
            }
            ?>

            <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $idmax ?>">
            <div class="form-group">
              <label for="geom">Coordinat</label>
              <textarea class="form-control" id="geom" name="geom" readonly required></textarea>
            </div>
            <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" class="form-control" name="name" value="">
            </div>
            <div class="form-group">
              <label for="alamat">Address</label>
              <input type="text" class="form-control" name="address" value="">
            </div>
            <!--  <div class="form-group">
                  <label for="id_kota">City</label>
                <select required name="city" id="kota" class="form-control" onchange="">
                  <?php
                  $sql = $conn->query("select * from city");
                  while ($row1 = mysqli_fetch_array($sql)) {
                    echo "<option value=\"$row1[id]\">$row1[name]</option>";
                  }
                  ?>
                </select>
              </div> -->

            <!-- <div class="form-group">
                  <label for="file">Upload Foto</label>
                  <input type="file" class="" style="background:none;border:none; width:1000px; " name="image" required>
              </div> -->

            <button type="submit" class="btn btn-primary pull-center">Save <i class="fa fa-floppy-o"></i></button>
        </div>
        </form>
      </div>
    </div>
</div>
</div>