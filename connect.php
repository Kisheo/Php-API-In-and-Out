<?php

// include the config file
require_once 'config.php';

// connect to the database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
