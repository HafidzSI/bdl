<div class="btn-group pull-left col-md-5">
  <a href="pages/formevent.php" class="btn btn-default"><i class="fa fa-plus"></i> ADD DATA</a>
</div>

<div class="box col-md-12">
        <div class="box-body">
          <table id="" class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th> ID </th>
                <th> NAME </th>
                <th> ADDRESS </th>
                <th> CITY </th>
                <th> ACTION </th>
                </tr>
              </thead>

              <tbody>
                <?php
                  include '../connect.php';
                  $id = $_GET['id'];
                  $querysearch = "SELECT event.id, event.name, event.address, event.id_city FROM event order by id ASC";

                  $hasil = $conn->query($querysearch);
                  while($baris = mysqli_fetch_array($hasil))
                  {
                    $id = $baris['id'];
                    $name = $baris['name'];
                    $address = $baris['address'];
                    $id_city = $baris['id_city'];
                    $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'id_city'=>$id_city);
                ?>

              <tr>
                <td><?php echo "$id" ?></td>
                <td><?php echo "$name" ?></td>
                <td><?php echo "$address" ?></td>
                <td><?php echo "$id_city" ?></td>
                <td><?php echo "$aksi" ?>
                <a href="?page=formupdateevent&id=<?php echo $id?>" class="btn btn-success"> UPDATE </a>
                <a href="?pages=hapusevent&id=<?php echo $id; ?>" onclick="return confirm ('delete?')"  class="btn btn-success"> DELETE </a>
              </tr>

            <?php
            }
            ?>

            </tbody>
          </table>
        