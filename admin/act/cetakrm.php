<!DOCTYPE html>
<html>
<head>
	<title> CETAK DATA RESTAURANT </title>
</head>
  <div class="form-group">
            <table id="example2" class="table table-hover table-bordered table-striped">

            <thead>
            <table border="1">
              <tr>
                <th> ID </th>
                <th> NAME </th>
                <th> LOCATION </th>
                <th> OPEN </th>
                <th> CLOSE </th>
                <th> PRICE </th>
               <!--  <th> KOORDINAT </th> -->
                <th> DESCRIPTION </th>
                </tr>
              </thead>

              <tbody>
                <?php
                  require 'connect.php';

                  $id = $_GET['id'];
                  $querysearch = "SELECT *FROM restaurant order by id ASC";

                  $hasil = $conn->query($querysearch);
                  while($baris = mysqli_fetch_array($hasil))
                  {
                    $id = $baris['id'];
                    $name = $baris['name'];
                    $address = $baris['address'];
                     $open = $baris['open'];
                      $close = $baris['close'];
                       $price = $baris['price'];
                        // $koordinat = $baris['geom'];
                         $description = $baris['description'];

                    $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address, 'open'=>$open,'close'=>$close, 'price'=>$price,'geom'=> $koordinat, 'description'=>$description);
echo "$dataarray";

                ?>

              <tr>
                <td><?php echo "$id" ?></td>
                <td><?php echo "$name" ?></td>
                <td><?php echo "$address" ?></td>
                <td><?php echo "$open" ?></td>
                <td><?php echo "$close" ?></td>
                <td><?php echo "$price" ?></td>
                <!-- <td><?php echo "$koordinat" ?></td>  -->
                 <td><?php echo "$description" ?></td>
                
              </tr>
            <?php
            }
            ?>
        <script>
		window.print();
	</script>
            </tbody>
          </table>

        </div>
      </div>
                
	

</tbody>
</html>