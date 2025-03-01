<?php
require_once('../includes/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 取得表單資料
    $title = trim($_POST['title']);
    $background = trim($_POST['background']); // 修正空格錯誤
    $description = trim($_POST['description']);
    $problem = trim($_POST['problem']);
    $solution = trim($_POST['solution']);
    $created_date = trim($_POST['created_date']);

    // 圖片處理
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = time() . '_' . basename($_FILES['image']['name']); // 確保唯一檔名
        $target_dir = "../uploads/";
        $target_file = $target_dir . $image_name;

        // 確保目標資料夾存在
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // 移動上傳的檔案
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            die('圖片上傳失敗');
        }
    } else {
        die('請選擇圖片');
    }

    // 處理影片（如果有上傳）
    $video = null;
    if (!empty($_FILES['video']['name'])) {
        $video_name = time() . '_' . basename($_FILES['video']['name']);
        $video_target = "../uploads/videos/" . $video_name;

        if (!is_dir("../uploads/videos/")) {
            mkdir("../uploads/videos/", 0777, true);
        }

        if (move_uploaded_file($_FILES['video']['tmp_name'], $video_target)) {
            $video = $video_name; // 存檔案名稱
        }
    }

    // 插入資料庫
    $query = "INSERT INTO Project (title, image, background, description, problem, solution, video, created_date) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title, $image_name, $background, $description, $problem, $solution, $video, $created_date]);

    $stmt = null;
    header('Location: project_list.php');
    exit();
}
?>
