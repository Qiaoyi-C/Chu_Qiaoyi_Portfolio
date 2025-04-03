<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login_form.php');
    exit();
}

require_once('../includes/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Retrieve form data
        $title = trim($_POST['title']);
        $category = trim($_POST['category']); // Added category
        $background = trim($_POST['background']);
        $description = trim($_POST['description']);
        $problem = trim($_POST['problem']);
        $solution = trim($_POST['solution']);
        $created_date = trim($_POST['created_date']);

        // Check if an image is uploaded
        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
            die('Please select an image');
        }

        // Image processing
        $allowed_image_types = ['jpg', 'jpeg', 'png', 'gif'];
        $image_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        if (!in_array($image_extension, $allowed_image_types)) {
            die('Invalid image format, only JPG, JPEG, PNG, GIF are allowed');
        }

        // Generate a unique name for the image
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target_dir = "../uploads/";
        $target_file = $target_dir . $image_name;

        // Ensure the target directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            die('Image upload failed');
        }

        // Insert into the Media table, get the media_id
        $stmt = $pdo->prepare("INSERT INTO Media (filename) VALUES (:filename)");
        $stmt->execute(['filename' => $image_name]);
        $media_id = $pdo->lastInsertId();

        if (!$media_id) {
            die('Failed to get media ID');
        }

        // Video processing (optional)
        $video = null;
        if (!empty($_FILES['video']['name']) && $_FILES['video']['error'] === 0) {
            $allowed_video_types = ['mp4', 'mov', 'avi'];
            $video_extension = strtolower(pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION));

            if (!in_array($video_extension, $allowed_video_types)) {
                die('Invalid video format, only MP4, MOV, AVI are allowed');
            }

            $video_name = time() . '_' . basename($_FILES['video']['name']);
            $video_target_dir = "../uploads/videos/";
            $video_target_file = $video_target_dir . $video_name;

            if (!is_dir($video_target_dir)) {
                mkdir($video_target_dir, 0777, true);
            }

            if (move_uploaded_file($_FILES['video']['tmp_name'], $video_target_file)) {
                $video = $video_name;
            }
        }

        // Insert into the Project table (including category)
        $stmt = $pdo->prepare("INSERT INTO Project (title, category, background, description, problem, solution, created_date, media_id, video) 
                               VALUES (:title, :category, :background, :description, :problem, :solution, :created_date, :media_id, :video)");
        $stmt->execute([
            'title' => $title,
            'category' => $category,
            'background' => $background,
            'description' => $description,
            'problem' => $problem,
            'solution' => $solution,
            'created_date' => $created_date,
            'media_id' => $media_id,
            'video' => $video
        ]);

        // Redirect to the project list page
        header('Location: project_list.php');
        exit();
    } catch (Exception $e) {
        die('Error occurred: ' . $e->getMessage());
    }
}
?>
