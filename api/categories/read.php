<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  // Intantiate DB and connect to DB
  $category = new Category();
  $db = $database->connect();

  // Instantiate category object
  $post = new Category($db);


  // Category read query
  $result = $category->read();

  // Get number of categories
  $num = $result->rowCount();

  if ($num > 0) {
    // Category array
    $cat_arr = array();
    $cat_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $post_item = array(
        'id' => $id,
        'name' => $name
      );

      array_push($cat_arr['data'], $cat_item);
    }
    // Turn into JSON and output
    echo json_encode($cat_arr);
  } else { // No categories
    echo json_encode(
      array('message' => 'No Categories Found')
    );

  }

 ?>
