<?php
require_once('../includes/connect.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('No ID');
}

$projectId = (int) $_GET['id']; 

$query = 'SELECT id FROM Project WHERE id = :projectId';
$stmt = $pdo->prepare($query);
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$project = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$project) {
    die('No project');
}

$query = 'DELETE FROM Project WHERE id = :projectId';
$stmt = $pdo->prepare($query);
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();

$stmt = null;
header('Location: project_list.php');
exit();
?>
