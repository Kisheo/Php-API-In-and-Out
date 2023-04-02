<?php 
//database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//fetching news
$url = "http://api.mediastack.com/v1/news?access_key=f32591403d2b1dc28ff8769ad5f63a27&languages=en&countries=us&date=" . date("Y-m-d");

// Initialize cURL
$ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, $url);

// Return the response instead of outputting it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Close cURL
curl_close($ch);

// Decode the JSON response
$news = json_decode($response, true);

?>
