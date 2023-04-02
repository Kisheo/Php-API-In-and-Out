<?php

// include the config file
require_once 'config.php';

// connect to the database
require_once 'connect.php';

// build the API query string
$api_query_string = http_build_query(array_merge($api_params, array("access_key" => API_KEY)));

// build the full API URL
$api_url = API_URL . '?' . $api_query_string;

// fetch the news data from the API
$news_data = file_get_contents($api_url);

// decode the JSON data
$news_data = json_decode($news_data, true);

// loop through the news items and insert them into the database
foreach ($news_data['data'] as $news_item) {
  $author = mysqli_real_escape_string($conn, $news_item['author']);
  $title = mysqli_real_escape_string($conn, $news_item['title']);
  $description = mysqli_real_escape_string($conn, $news_item['description']);
  $url = mysqli_real_escape_string($conn, $news_item['url']);
  $source = mysqli_real_escape_string($conn, $news_item['source']);
  $image = mysqli_real_escape_string($conn, $news_item['image']);
  $category = mysqli_real_escape_string($conn, $news_item['category']);
  $published_at = mysqli_real_escape_string($conn, $news_item['published_at']);
  
  $sql = "INSERT INTO posts (author, title, description, url, source, image, category, published_at) VALUES ('$author', '$title', '$description', '$url', '$source', '$image', '$category', '$published_at')";
  
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully\n";
  } else {
    echo "Error: " . $sql . "\n" . mysqli_error($conn) . "\n";
  }
}

// close the database connection
mysqli_close($conn);
