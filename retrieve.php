<?php

// include the config file
require_once 'config.php';

//including the scraping file
include('scrape.php');

// connect to the database
require_once 'connect.php';

// query the database for the latest 30 posts
$sql = "SELECT * FROM posts ORDER BY published_at DESC LIMIT 30";
$result = mysqli_query($conn, $sql);

// create an empty array to store the posts
$posts = array();

// loop through the results and add each post to the array
while ($row = mysqli_fetch_assoc($result)) {
  $post = array(
    "id" => $row["id"],
    "author" => $row["author"],
    "title" => $row["title"],
    "description" => $row["description"],
    "url" => $row["url"],
    "source" => $row["source"],
    "image" => $row["image"],
    "category" => $row["category"],
    "published_at" => $row["published_at"]
  );
  
  array_push($posts, $post);
}

// output the posts array as JSON
header('Content-Type: application/json');
echo json_encode($posts);

// close the database connection
mysqli_close($conn);
