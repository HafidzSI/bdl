<!DOCTYPE html>
<html>

<head>
  <title>Paket Wisata Halal Sumatera Barat</title>
  <ul class="sidebar-menu" id="nav-accordion">
    <p class="centered"><img src="assets/img/jalan.png" class="img-circle" width="60"></a></p>
</head>

<body>

  <center>
    <?php
    include "connect.php";

    $id_package = $_GET['id_package'];

    $querysearch = "  SELECT package.name as nama_package ,  package.itinerary, package.id_travel , travel.name as nama_travel FROM package  JOIN travel ON travel.id = package.id_travel where package.id='$id_package'";

    $hasil = $conn->query($querysearch);
    while ($baris = mysqli_fetch_array($hasil)) {

      $travel = $baris['nama_travel'];
      $nama = $baris['nama_package'];

      $itinerary = $baris['itinerary'];
    }

    //     echo "$id_package";
    ?>
    <h2 class="box-title" style="text-transform:capitalize;"><b>
        <?php echo $travel; ?></b></h2>
    <h2 class="box-title" style="text-transform:capitalize;"><b>
        <?php echo $nama; ?></b></h2>
    <table id="detgal" class="table">
      <tbody style='vertical-align:top;'>

        <tr>
          <td width="150px"><b>Itinerary</b></td>
          <td> :&nbsp; </td>
          <td style='text-transform:capitalize;'><?php echo $itinerary ?></td>
        </tr>
        <br>
      </tbody>

  </center>




  <script>
    window.print();
  </script>

</body>

</html>