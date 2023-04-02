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
$url = "http://api.mediastack.com/v1/news?access_key=API_KEY&languages=en&countries=us&date=" . date("Y-m-d");

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

//storing the news
foreach ($news["data"] as $article) {
  $author = mysqli_real_escape_string($conn, $article["author"]);
  $title = mysqli_real_escape_string($conn, $article["title"]);
  $description = mysqli_real_escape_string($conn, $article["description"]);
  $url = mysqli_real_escape_string($conn, $article["url"]);
  $source = mysqli_real_escape_string($conn, $article["source"]["name"]);
  $image = mysqli_real_escape_string($conn, $article["image"]);
  $category = mysqli_real_escape_string($conn, $article["category"]);
  $published_at = mysqli_real_escape_string($conn, $article["published_at"]);

  $sql = "INSERT INTO posts (author, title, description, url, source, image, category, published_at) 
          VALUES ('$author', '$title', '$description', '$url', '$source', '$image', '$category', '$published_at')";
  mysqli_query($conn, $sql);
}

//retreiving from database
$sql = "SELECT * FROM posts ORDER BY published_at DESC LIMIT 30";
$result = mysqli_query($conn, $sql);

$news_items = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $news_item = array(
      'id' => $row['id'],
      'author' => $row['author'],
      'title' => $row['title'],
      'description' => $row['description'],
      'url' => $row['url'],
      'source' => $row['source'],
      'image' => $row['image'],
      'category' => $row['category'],
      'published_at' => $row['published_at']
    );
    array_push($news_items, $news_item);
  }
}

// Encode the news items array to JSON format
$json = json_encode($news_items);

// Output the JSON response
echo $json;

?>
