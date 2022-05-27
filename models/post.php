<?php
class post {
    // DB stuff
    private $conn;
    private $table = 'produk_gitar';

    // Post Properties
    public $id_gitar;
    public $nama_gitar;
    public $harga_gitar;
    public $jenis_gitar;
    public $deskripsi_gitar;
    public $stok_gitar;
    public $gambar_gitar;

    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    // Get Posts
    public function read() {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id_gitar';
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Post atau Deatil.php
    public function read_single() {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_gitar = ?';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id_gitar);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        if (!empty($row)) {
        $this->nama_gitar = $row['nama_gitar'];
        $this->harga_gitar = $row['harga_gitar'];
        $this->jenis_gitar = $row['jenis_gitar'];
        $this->deskripsi_gitar = $row['deskripsi_gitar'];
        $this->stok_gitar = $row['stok_gitar'];
        $this->gambar_gitar = $row['gambar_gitar'];        
        } 
  
  }

  // Create Post
  public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . '
        SET
          nama_gitar = :nama_gitar,
          harga_gitar = :harga_gitar,
          jenis_gitar = :jenis_gitar,
          deskripsi_gitar = :deskripsi_gitar,
          stok_gitar = :stok_gitar,
          gambar_gitar = :gambar_gitar';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->nama_gitar = htmlspecialchars(strip_tags($this->nama_gitar)); 
      $this->harga_gitar = htmlspecialchars(strip_tags($this->harga_gitar)); 
      $this->jenis_gitar = htmlspecialchars(strip_tags($this->jenis_gitar)); 
      $this->deskripsi_gitar = htmlspecialchars(strip_tags($this->deskripsi_gitar)); 
      $this->stok_gitar = htmlspecialchars(strip_tags($this->stok_gitar)); 
      $this->gambar_gitar = htmlspecialchars(strip_tags($this->gambar_gitar)); 
      
      // Blind data
      $stmt->bindParam(':nama_gitar', $this->nama_gitar);
      $stmt->bindParam(':harga_gitar', $this->harga_gitar);
      $stmt->bindParam(':jenis_gitar', $this->jenis_gitar);
      $stmt->bindParam(':deskripsi_gitar', $this->deskripsi_gitar);
      $stmt->bindParam(':stok_gitar', $this->stok_gitar);
      $stmt->bindParam(':gambar_gitar', $this->gambar_gitar);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      
      return false;
    }
  
  // Update Post
  // Update Post
  public function update() {
    // Create query
    $query = 'UPDATE ' . $this->table . '
      SET
        nama_gitar = :nama_gitar,
        harga_gitar = :harga_gitar,
        jenis_gitar = :jenis_gitar,
        deskripsi_gitar = :deskripsi_gitar,
        stok_gitar = :stok_gitar,
        gambar_gitar = :gambar_gitar
      WHERE
        id_gitar = :id_gitar';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->nama_gitar = htmlspecialchars(strip_tags($this->nama_gitar)); 
    $this->harga_gitar = htmlspecialchars(strip_tags($this->harga_gitar)); 
    $this->jenis_gitar = htmlspecialchars(strip_tags($this->jenis_gitar)); 
    $this->deskripsi_gitar = htmlspecialchars(strip_tags($this->deskripsi_gitar)); 
    $this->stok_gitar = htmlspecialchars(strip_tags($this->stok_gitar)); 
    $this->gambar_gitar = htmlspecialchars(strip_tags($this->gambar_gitar)); 
    $this->id_gitar = htmlspecialchars(strip_tags($this->id_gitar));

    // Blind data
    $stmt->bindParam(':nama_gitar', $this->nama_gitar);
    $stmt->bindParam(':harga_gitar', $this->harga_gitar);
    $stmt->bindParam(':jenis_gitar', $this->jenis_gitar);
    $stmt->bindParam(':deskripsi_gitar', $this->deskripsi_gitar);
    $stmt->bindParam(':stok_gitar', $this->stok_gitar);
    $stmt->bindParam(':gambar_gitar', $this->gambar_gitar);
    $stmt->bindParam(':id_gitar', $this->id_gitar);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);
    
    return false;
  }

  // Delete Post
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id_gitar = :id_gitar';
    
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id_gitar = htmlspecialchars(strip_tags($this->id_gitar));

    // Bind data
    $stmt->bindParam(':id_gitar', $this->id_gitar);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);
    
    return false;
  }

}
