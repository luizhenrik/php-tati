<?php 
session_start();
session_destroy();
echo json_encode(array('success' => 1, 'message' => "Você está deslogado"));