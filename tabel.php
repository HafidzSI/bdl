<?php
include 'connect.php';
$id = $_GET['id'];
$querysearch  = "SELECT tempat_wisata.id_tempat_wisata, 
    tempat_wisata.nama_tempat_wisata, 
    tempat_wisata.lokasi, 
    tempat_wisata.jam_buka,
    tempat_wisata.jam_tutup,
    tempat_wisata.biaya,
    tempat_wisata.fasilitas,
    tempat_wisata.keterangan FROM tempat_wisata order by id ASC ";

$hasil = $conn->query($querysearch);
while ($baris = mysqli_fetch_array($hasil)) {
  $id = $baris['id'];
  $nama_tempat_wisata = $baris['nama_tempat_wisata'];
  $lokasi = $baris['lokasi'];
  $jam_buka = $baris['jam_buka'];
  $jam_tutup = $baris['jam_tutup'];
  $biaya = $baris['biaya'];
  $fasilitas = $baris['fasilitas'];
  $keterangan = $baris['keterangan'];

  $dataarray[] = array('id_tempat_wisata' => $id_tempat_wisata, 'nama_tempat_wisata' => $nama_tempat_wisata, 'lokasi' => $lokasi, 'jam_buka' => $jam_buka, 'jam_tutup' => $jam_tutup, 'biaya' => $biaya, 'fasilitas' => $fasilitas, 'keterangan' => $keterangan);
}
