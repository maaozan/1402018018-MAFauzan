<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/post.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

  // Blog post query
  $result = $post->read();
  // Get row count
  $num = $result->rowCount();

    // Check if any posts
    if($num > 0) {
        // Post array
        $posts_arr = array();
        //$posts_arr['data'] = array();
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
         
          $post_item = array(
            'id_gitar' => $id_gitar,
            'nama_gitar' => $nama_gitar,
            'harga_gitar' => $harga_gitar,
            'jenis_gitar' => $jenis_gitar,
            'deskripsi_gitar' => $deskripsi_gitar,
            'stok_gitar' => $stok_gitar,
            'gambar_gitar' => $gambar_gitar
          );
    
          // Push to "data"
          array_push($posts_arr, $post_item);
          //array_push($posts_arr['data'], $post_item);
        }
    
        // Turn to JSON & output
        echo json_encode($posts_arr);
    
      } else {
        // No Posts
        echo json_encode(
          array('message' => 'No Posts Found')
        );
      }