<?php
session_start();
include 'database.php';
include 'classes/Posts.php';

header('Location: /app/views/home.php');

$post = new Posts($pdo);
$post->addPost();

