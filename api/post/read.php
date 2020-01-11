<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Intantiate DB and connect to DB
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);


  $result = $post->read();

  // Get number of blogs
  $num = $result->rowCount();

  if ($num > 0) {
    $posts_arr = array();
    $posts_arr['data'] = array();
    while ($a <= 10) {
      // code...
    }
  } else {

  }

 ?>
