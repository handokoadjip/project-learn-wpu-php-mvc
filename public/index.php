<?php 

if( !session_id() ) session_start();
// ambil satu file yang mengandung banyak pengambilan file || Tekink bootstraping
require_once "../app/init.php";

// menyelesaikan proses bootstraping
$app = new App;