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

// Get ID
$post->id_gitar = isset($_GET['id_gitar']) ? $_GET['id_gitar'] : die();

  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'id_gitar' => $post->id_gitar,
    'nama_gitar' => $post->nama_gitar,
    'harga_gitar' => $post->harga_gitar,
    'jenis_gitar' => $post->jenis_gitar,
    'deskripsi_gitar' => $post->deskripsi_gitar,
    'stok_gitar' => $post->stok_gitar,
    'gambar_gitar' => $post->gambar_gitar    
  );

  // Make JSON
  print_r(json_encode($post_arr));