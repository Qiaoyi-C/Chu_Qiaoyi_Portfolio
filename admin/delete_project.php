<?php
require_once('../includes/connect.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('No ID');
}

$projectId = (int) $_GET['id']; 

// 開始一個交易
$pdo->beginTransaction();

try {
    // 確保這個 Project 存在
    $query = 'SELECT id FROM Project WHERE id = :projectId';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
    $stmt->execute();
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
        throw new Exception('No project');
    }

    // 刪除 Media 表中的資料
    $stmt = $pdo->prepare("DELETE FROM Media WHERE id = (SELECT media_id FROM Project WHERE id = :id)");
    $stmt->execute(['id' => $projectId]);

    // 刪除 Project 表中的資料
    $stmt = $pdo->prepare("DELETE FROM Project WHERE id = :id");
    $stmt->execute(['id' => $projectId]);

    // 提交交易
    $pdo->commit();

    // 重定向
    header('Location: project_list.php');
    exit();
} catch (Exception $e) {
    // 發生錯誤，回滾交易
    $pdo->rollBack();
    die('Error: ' . $e->getMessage());
}
?>
