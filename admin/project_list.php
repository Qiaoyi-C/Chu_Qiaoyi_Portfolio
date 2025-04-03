<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>

<div class="container">

    <h1>Project List</h1>

    <?php
    session_start();
    if (!isset($_SESSION['username'])){
      header('Location: login_form.php');  
    }

    require_once('../includes/connect.php');
    $stmt = $pdo->prepare('
    SELECT Project.id, Project.title, Media.filename 
    FROM Project 
    JOIN Media ON Project.media_id = Media.id 
    ORDER BY Media.id DESC
');

    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="project-list">'.
                $row['title'].
                '<a href="edit_project_form.php?id='.$row['id'].'">edit</a>'.
                '<a href="delete_project.php?id='.$row['id'].'">delete</a>'.
             '</div>';
    }

    $stmt = null;
    ?>

    <br><br><br>

    <h3>Add a New Project</h3>
    <form action="add_project.php" method="post" enctype="multipart/form-data">
    <label for="title">Project Title </label>
    <input name="title" type="text" required><br><br>

    <label for="image">Project Image </label>
    <input name="image" type="file" required><br><br>

    <label for="background">Project Background </label>
    <textarea name="background"></textarea><br><br>

    <label for="description">Project Description </label>
    <textarea name="description" required></textarea><br><br>

    <label for="problem">Project Problem </label>
    <textarea name="problem" required></textarea><br><br>

    <label for="solution">Project Solution </label>
    <textarea name="solution" required></textarea><br><br>

    <label for="video">Project Video </label>
    <input name="video" type="file"><br><br>

    <label for="category">Category </label>
    <input name="category" type="text" required><br><br> 

    <label for="created_date">Project Date </label>
    <textarea name="created_date" required></textarea><br><br>

    <input name="submit" type="submit" value="Add">
    </form>


    <br><br><br>
    <a href="logout.php" class="logout">Log Out</a>

</div>

</body>
</html>
