<div class="col-sm-12">
  <!-- menampilkan list mosque-->
  <section class="panel">
    <div class="panel-body">
      <a href="?page=formrm" title="Add Restaurant" class="btn btn-compose"><i class="fa fa-plus"></i>Add Restaurant</a>
      <div class="box-body">


        <div class="form-group">
          <table id="example2" class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th> ID </th>
                <th> NAME </th>
                <th> LOCATION </th>
                <th> ACTION </th>
              </tr>
            </thead>

            <tbody>
              <?php
              include '../connect.php';
              // $id = $_GET['id'];
              $querysearch = "SELECT restaurant.id, restaurant.name, restaurant.address FROM restaurant order by id ASC";

              $hasil = $conn->query($querysearch);
              while ($baris = mysqli_fetch_array($hasil)) {
                $id = $baris['id'];
                $name = $baris['name'];
                $address = $baris['address'];
                $dataarray[] = array('id' => $id, 'name' => $name, 'address' => $address);
                ?>

                <tr>
                  <td><?php echo "$id" ?></td>
                  <td><?php echo "$name" ?></td>
                  <td><?php echo "$address" ?></td>
                  <td><?php echo "" ?>
                    <a href="?page=detailrm&id=<?php echo $id ?>" class="btn btn-sm btn-default" title='Detail'><i class="fa fa-list"></i> Detail</a>
                    <a href="act/hapusrm.php?id=<?php echo $id ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
                </tr>

              <?php
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>