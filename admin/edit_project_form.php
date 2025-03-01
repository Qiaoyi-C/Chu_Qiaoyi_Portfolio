<!DOCTYPE html>
<html lang="en">
<?php
require_once('../includes/connect.php');

$projectId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($projectId <= 0) {
    die('No project ID');
}

$query = 'SELECT * FROM Project WHERE id = :projectId';
$stmt = $pdo->prepare($query);
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die('專案不存在或 ID 無效');
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>

<<form action="edit_project.php" method="POST">
    <input name="pk" type="hidden" value="<?php echo $row['id']; ?>">

    <label for="title">Project Title:</label>
    <input name="title" type="text" value="<?php echo htmlspecialchars($row['title']); ?>" required><br><br>

    <label for="image">Project Thumbnail:</label>
    <input name="image" type="text" required value="<?php echo htmlspecialchars($row['image']); ?>"><br><br>

    <label for="background">Project Background:</label>
    <textarea name="background" required><?php echo htmlspecialchars($row['background']); ?></textarea><br><br>

    <label for="description">Project Description:</label>
    <textarea name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea><br><br>

    <label for="problem">Problem:</label>
    <textarea name="problem" required><?php echo htmlspecialchars($row['problem']); ?></textarea><br><br>

    <label for="solution">Solution:</label>
    <textarea name="solution" required><?php echo htmlspecialchars($row['solution']); ?></textarea><br><br>

    <label for="video">Video URL:</label>
    <input name="video" type="text" value="<?php echo htmlspecialchars($row['video']); ?>"><br><br>

    <input name="submit" type="submit" value="Done">
</form>

<?php
$stmt = null;
?>
</body>
</html>