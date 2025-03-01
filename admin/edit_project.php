<?php
require_once('../includes/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['pk'];
    $title = trim($_POST['title']);
    $image = trim($_POST['image']);
    $background = trim($_POST['background']);
    $description = trim($_POST['description']);
    $problem = trim($_POST['problem']);
    $solution = trim($_POST['solution']);
    $video = trim($_POST['video']);

    if ($id <= 0) {
        die('No ID');
    }

    $query = "UPDATE Project SET title = ?, image = ?, background = ?, description = ?, problem = ?, solution = ?, video = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title, $image, $background, $description, $problem, $solution, $video, $id]);

    $stmt = null;
    header('Location: project_list.php');
    exit();
}
?>