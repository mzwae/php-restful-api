<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  // Intantiate DB and connect to DB
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $category = new Category($db);

  // Get ID from URL
  $category->id = isset($_GET['id']) ? $_GET['id'] : die("Please specify the id first!");

  // Get post
  $category->read_single();

  // Create array
  $cat_arr = array(
    'id' => $category->id,
    'name' => $category->name,
    'created_at' => $category->created_at
  );

  // Create JSON
  print_r(json_encode($cat_arr));
