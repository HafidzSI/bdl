<?php
define('db_host', 'localhost');
define('db_user', 'root');
define('db_pass', 'root');
define('db_name', 'paketwisata');
define('db_port', 3307);

$conn = new mysqli(db_host, db_user, db_pass, db_name, db_port);
if ($conn->connect_errno > 0) {
    die('Unable to connect to database [' . $conn->connect_error . ']');
}
