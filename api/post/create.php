<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/database.php';
include_once '../../models/post.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$post->nama_gitar = $data->nama_gitar;
$post->harga_gitar = $data->harga_gitar;
$post->jenis_gitar = $data->jenis_gitar;
$post->deskripsi_gitar = $data->deskripsi_gitar;
$post->stok_gitar = $data->stok_gitar;
$post->gambar_gitar = $data->gambar_gitar;

// Create post
if($post->create()) {
    echo json_encode(
        array('message' => 'Post Created')
    );
} else {
    echo json_encode(
        array('message' => 'Post Not Created')
    );
}