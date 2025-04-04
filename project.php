<?php
require_once('includes/connect.php'); 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $project_id = intval($_GET['id']);

    $stmt = $pdo->prepare("SELECT * FROM Project WHERE id = :id");
    $stmt->execute(['id' => $project_id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
        echo "<p>Project not found.</p>";
        exit;
    }

    $stmt = $pdo->prepare("SELECT image FROM project_images WHERE project_id = :id");
    $stmt->execute(['id' => $project_id]);
    $images = $stmt->fetchAll(PDO::FETCH_COLUMN); 

    $stmt = $pdo->prepare("
        SELECT c.name 
        FROM category c
        JOIN project_category pc ON c.id = pc.category_id
        WHERE pc.project_id = :id
    ");
    $stmt->execute(['id' => $project_id]);
    $categories = $stmt->fetchAll(PDO::FETCH_COLUMN); 

} else {
    echo "<p>Invalid Project ID.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - <?php echo htmlspecialchars($project['title']); ?></title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <div class="header-bk">
    <div class="header">
        <header id="header-long" class="grid-con">
            <div id="logo" class="box col-start-1 col-end-3 m-col-span-full l-col-start-1 l-col-end-2">
                <a href="index.php"><img src="images/logo.svg" alt="logo"></a>
            </div>
            <div id="menu" class="box col-start-3 col-end-5 m-col-span-full l-col-start-2 l-col-end-5">
                <img src="images/menu.svg" alt="hamburger menu icon">
            </div>
            <nav id="sidebar-menu">
                <div id="close-menu"><img src="images/close.svg" alt="close icon"></div>            
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </nav>
            <nav id="topbar-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </nav>
        </header>
    </div>
    </div>

    <!-- Case Study -->
    <main>
        <div class="pro-bk">
        <section class="case-study">
            <h2><?php echo htmlspecialchars($project['title']); ?></h2>
            
            <div class="grid-con">
                <div class="background col-start-1 col-end-5 m-col-start-1 m-col-end-7 l-col-start-1 l-col-end-7">
                    <h3>Background</h3>
                    <p><?php echo nl2br(htmlspecialchars($project['background'])); ?></p>
                </div>

                <div class="images col-start-1 col-end-5 m-col-start-7 m-col-end-13 l-col-start-7 l-col-end-13">
                    <img src="images/<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                </div>

                <div class="problem col-span-full">
                    <h3>Problem</h3>
                    <p><?php echo nl2br(htmlspecialchars($project['problem'])); ?></p>
                </div>

                <div class="description col-span-full">
                    <h3>Description</h3>
                    <p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                </div>

                <div class="solution col-span-full">
                    <h3>Solution</h3>
                    <p><?php echo nl2br(htmlspecialchars($project['solution'])); ?></p>
                </div>

                <div class="pro-video col-span-full">
                <?php if (!empty($project['video'])): ?>
                    <div class="video-container">
                        <iframe src="video/<?php echo htmlspecialchars($project['video']); ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                <?php else: ?>
                    <p><?php echo nl2br(htmlspecialchars($project['video'])); ?></p>
                <?php endif; ?>
                </div>

                <div class="lot-images images col-span-full">
                <?php foreach ($images as $image): ?>
                    <img src="images/<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                <?php endforeach; ?>
                </div>

                <div class="categories col-start-1 col-end-5 m-col-start-1 m-col-end-7 l-col-start-1 l-col-end-7">
                    <h3>Categories</h3>
                    <p><?php echo htmlspecialchars(implode(', ', $categories)); ?></p>
                </div>

                <div class="created-dat col-start-1 col-end-5 m-col-start-1 m-col-end-7 l-col-start-1 l-col-end-7">
                    <h3>Created Date</h3>
                    <p><?php echo htmlspecialchars($project['created_date']); ?></p>
                </div>

            </div>
        </section>
        </div>
    </main>

    <div class="footer-bk">
    <footer id="footer">
        <div class="footer-container grid-con">
            <!-- Logo -->
            <div class="footer-logo col-span-full ">
                <img src="images/logo.svg" alt="logo">
            </div>

            <!-- Menu -->
            <nav class="footer-menu">
                <ul>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>

            <!-- Copyright -->
            <div class="footer-copyright">
                <p>&copy; <?php echo date("Y"); ?> Created by Joy Chu</p>
            </div>
        </div>
    </footer>
    </div>

    <script src="js/main.js"></script>
</body>
</html>
