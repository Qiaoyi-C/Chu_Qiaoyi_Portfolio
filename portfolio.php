<?php
require_once('includes/connect.php'); 

try {
    // 取得所有專案及其類別（用 GROUP_CONCAT 合併類別）
    $stmt = $pdo->query("
        SELECT p.id, p.title, p.image, 
               GROUP_CONCAT(c.name ORDER BY c.name SEPARATOR ', ') AS category
        FROM Project p
        LEFT JOIN project_category pc ON p.id = pc.project_id
        LEFT JOIN category c ON pc.category_id = c.id
        GROUP BY p.id
    ");
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Joy Chu</title>
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

    <!-- Portfolio Section -->
    <div class="portfolio-bk">
        <section class="grid-con portfolio-bk">
            <h2 class="portpage-title col-start-1 col-end-5 m-col-span-full l-col-span-full">Selected Works</h2>

            <?php
            $cell = 0;
            foreach ($projects as $row): 
                if ($cell == 3) {
                    $cell = 1; 
                } else {
                    $cell++;
                }

                if ($cell == 1) {
                    echo '<div class="card col-start-1 col-span-4">';
                } else if ($cell == 2) {
                    echo '<div class="card col-start-5 col-span-4">';
                } else {
                    echo '<div class="card col-start-9 col-span-4">';
                }
            ?>
                <div>
                    <a href="project.php?id=<?= htmlspecialchars($row['id']) ?>" class="portfolio-link">
                        <div class="portfolio-item">
                            <img src="images/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                            <div class="category-container">
                                <?php 
                                    $categories = explode(', ', $row['category']);
                                    foreach ($categories as $category): 
                                ?>
                                    <span class="category"><?= htmlspecialchars($category) ?></span>
                                <?php endforeach; ?>
                            </div>
                            <p class="project-title"><?= htmlspecialchars($row['title']) ?></p>
                        </div>
                    </a>
                </div>
                </div> <!-- End of card div -->
            <?php endforeach; ?>
        </section>
    </div>

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
                        <li><a href="index.php#contact">Contact</a></li>
                    </ul>
                </nav>

                <!-- Copyright -->
                <div class="footer-copyright">
                    <p>&copy; <?php echo date("Y"); ?> Created by Joy Chu</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
