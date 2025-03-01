<?php
require_once('includes/connect.php'); 

try {
    $stmt = $pdo->query("SELECT id, title, image FROM Project");
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
    die('錯誤: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Joy Chu</title>
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>

    <!-- Header -->
    <div class="header">
    <header id="header-long" class="grid-con">       
        <div id="logo" class="box col-start-1 col-end-2 m-col-span-full l-col-start-1 l-col-end-2">
            <a href="index.html"><img src="images/logo.svg" alt="logo"></a>
        </div>
        <div id="menu" class="box col-start-2 col-end-5 m-col-span-full l-col-start-2 l-col-end-5">
            <img src="images/menu.svg" alt="hamburger menu icon">
        </div>
        <nav id="sidebar-menu" >
            <div id="close-menu"><img src="images/close.svg" alt="close icon"></div>            
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <nav id="topbar-menu" >
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

    </header>
</div>

    <!-- Portfolio Section -->
    <div class="portfolio-bk">
    <section class="grid-con portfolio-bk">
    <h2 class="port-title col-start-1 col-end-5 m-col-span-full l-col-span-full">Portfolio</h2>

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
                <p class="project-title"><?= htmlspecialchars($row['title']) ?></p>
            </div>
        </a>
        </div>

        </div> <!-- End of card div -->
    <?php endforeach; ?>
</section>
</div>

    <!-- Footer -->
    <div class="footer-bk">
        <footer id="footer" class="grid-con">
            <div id="footer-logo" class="box col-span-full m-col-start-1 m-col-end-5 l-col-start-1 l-col-end-5">
                <img src="images/logo.svg" alt="logo">
            </div>
        
            <nav id="footer-menu" class="box m-col-start-6 m-col-end-13 l-col-start-6 l-col-end-13">
                <ul>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        
            <div id="footer-copyright" class="col-span-full">
                <p>&copy; 2024 Joy Chu. All Rights Reserved.</p>
            </div>
        </footer>
    </div>

    <script src="js/main.js"></script>
</body>
</html>
