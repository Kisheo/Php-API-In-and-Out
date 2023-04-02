<?php

// Database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'mydatabase');

// MediaStack API access key and URL
define('API_KEY', 'f32591403d2b1dc28ff8769ad5f63a27');
define('API_URL', 'http://api.mediastack.com/v1/news');

// API parameters
$api_params = array(
  "languages" => "en",
  "countries" => "us",
  "date" => date("Y-m-d")
);
