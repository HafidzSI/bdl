<?php
session_start('c');
include('connect.php');
$id_booking = $_POST['id_booking'];
//$id_booking = 3;

$updateBooking = $conn->query("UPDATE booking set statusbooking='TERKIRIM' where id_booking='" . $id_booking . "'");


$query = "SELECT travel.email as emailtravel, travel.name as namatravel, booking.date, package.name as nama_paket, booking.id_booking, booking.username, detail_booking.total, detail_booking.totalprice, package.price, administrator.email, administrator.name,  administrator.cp FROM booking 
                        LEFT JOIN detail_booking on booking.id_booking = detail_booking.id_booking  
                        LEFT JOIN package on detail_booking.id_package = package.id 
                        left join administrator on booking.username = administrator.username
                        join travel on travel.id = package.id_travel 
                         where booking.id_booking = '" . $id_booking . "'";
$cek = $conn->query($query);
$data = mysqli_fetch_array($cek);
$emailtravel = $data['emailtravel'];
$namatr = $data['namatravel'];
//$emailtravel = 'firdausrizki17@gmail.com';
//$namatr = 'Rizki Firdus';
// require('PHPMailer/class.phpmailer.php');
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'ssl://smtp.googlemail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "crozzgazelle4@gmail.com";
$mail->Password = "anakcacad12";

$mail->setFrom("crozzgazelle4@gmail.com", "SISTEM INFORMASI Bukittinggi Tourism");
$mail->isHTML(true);
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
// Setel format email ke HTML 
$mail->addAddress($emailtravel, $namatr);
//    $mail->addAddress("$email", "$Username");
$mail->Subject = 'SIG HALAL TOURISM PACKAGE';
$mail->Body = "Anda mendapatkan pesanan paket wisata dari : 
                        <table>
                          <tbody>

                            <tr>
                                <td>Nama Paket </td> <td>:  &nbsp;</td> <td> " . $data['nama_paket'] . ",
                            </tr>
                            <tr>
                                <td>Tanggal Pemesanan </td> <td>:  &nbsp;</td> <td> " . $data['date'] . ",
                            </tr>
                            <tr>
                                <td>Nama Pemesan</td> <td>:  &nbsp;</td> <td> " . $data['username'] . ",
                            </tr>
                            <tr>
                                <td>No Telepon </td> <td>:  &nbsp;</td> <td>" . $data['cp'] . ",
                            </tr>
                            <tr>
                               <td>Total Harga </td> <td>:  &nbsp;</td> <td>" . $data['totalprice'] . ",
                            </tr>
                            <tr>
                               <td>E-mail</td> <td>:  &nbsp;</td> <td>" . $data['email'] . "
                            </tr>
                          </tbody>
                      </table>";

$mail->AltBody = ' Ini adalah badan dalam teks biasa untuk klien email non-HTML ';

if ($mail->send()) {
    $status = array('kirimemail' => Sukses,);
} else {
    $status = array('kirimemail' => Gagal,);
}
echo json_encode($status);
