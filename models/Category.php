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
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get categories
    public function read()
    {
        // Create query
        $query = 'SELECT
    id, name, created_at
  FROM
    ' . $this->table . '
  ORDER BY created_at DESC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get single category
    public function read_single()
    {
        $query = 'SELECT
  id, name, created_at
FROM
  ' . $this->table . ' p
WHERE
  p.id = ?
LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->created_at = $row['created_at'];
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' .
        $this->table . '
    SET
      name = :name';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Sanitize data
        $this->name = htmlspecialchars(strip_tags($this->name));

        // Bind data
        $stmt->bindParam(':name', $this->name);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s. \n", $stmt->error);
        return false;
    }
}
