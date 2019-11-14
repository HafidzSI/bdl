<div class="col-sm-12">
  <!-- menampilkan list mosque-->
  <section class="panel">
    <div class="panel-body">
      <a href="?page=tambahtravel" title="Add Travel" class="btn btn-compose"><i class="fa fa-plus"></i>Add Travel</a>
      <div class="box-body">

        <div class="form-group">
          <table id="example2" class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th> ID </th>
                <th> NAME </th>
                <th> CONTACT PERSON </th>
                <th> ACTION </th>
              </tr>
            </thead>

            <tbody>
              <?php
              include '../connect.php';
              //$id = $_GET['id'];
              $querysearch = "SELECT travel.id, travel.fullname, travel.cp FROM travel order by id ASC";

              $hasil = $conn->query($querysearch);
              while ($baris = mysqli_fetch_array($hasil)) {
                $id = $baris['id'];
                $fullname = $baris['fullname'];
                $cp = $baris['cp'];
                $dataarray[] = array('id' => $id, 'name' => $fullname, 'cp' => $cp);
                ?>

                <tr>
                  <td><?php echo "$id" ?></td>
                  <td><?php echo "$fullname" ?></td>
                  <td><?php echo "$cp" ?></td>
                  <td><?php echo "" ?>
                    <a href="?page=detailtravel&id=<?php echo $id ?>" class="btn btn-sm btn-default" title='Detail'><i class="fa fa-list"></i> Detail</a>
                    <a href="act/hapustravel.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>




                    <!-- <a href="act/hapustravel.php?id=<?php echo $id ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a> -->
                </tr>

              <?php
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>