<?php
/**
 *
 */
class Category
{
private $conn;
private $table = 'categories';

// Properties
public $id;
public $name;
public $created_at;

// Constructor with DB
public function __construct($db){
  $this->conn = $db;
}

// Get categories
public function read(){
  // Create query
}
}


 ?>
