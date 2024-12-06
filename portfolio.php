<?php
// 連接資料庫
require_once('includes/connect.php');

// 從資料庫中只選擇 title 和 image 欄位
$query = "SELECT id, title, image FROM Project";
$result = mysqli_query($connect, $query);

if (!$result) {
    die('Query Failed: ' . mysqli_error($connect));
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
    <section class="grid-con portfolio-bk">
    <h2 class="port-title col-start-1 col-end-5 m-col-span-full l-col-span-full">Portfolios</h2>
    <?php
    // A solution for resolving grid columns on a page. $cell is a counting variable, initialized to 0 outside the loop.
    $cell = 0;

    // Start fetching the data from the database
    while ($row = mysqli_fetch_assoc($result)): 
        // Determine the grid position for each portfolio item based on $cell value
        if ($cell == 3) {
            $cell = 1; // Reset to the first column after the third item
        } else {
            $cell++;
        }

        // Assign grid classes based on $cell value
        if ($cell == 1) {
            echo '<div class="card col-start-1 col-span-4">';
        } else if ($cell == 2) {
            echo '<div class="card col-start-5 col-span-4">';
        } else {
            echo '<div class="card col-start-9 col-span-4">';
        }
        ?>
        <div>
        <a href="project.php?id=<?php echo $row['id']; ?>" class="portfolio-link">
            <div class="portfolio-item">
                <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                <p class="project-title"><?php echo $row['title']; ?></p>
            </div>
        </a>
        </div>

        </div> <!-- End of card div -->
    <?php endwhile; ?>
</section>


    

    
    <!-- Footer -->
    <div class="footer-bk">
        <footer id="footer" class="grid-con">
            <div id="footer-logo" class="box col-span-full m-col-start-1 m-col-end-5 l-col-start-1 l-col-end-5">
                <img src="images/logo.svg" alt="logo">
            </div>
        
            <nav id="footer-menu" class="box m-col-start-6 m-col-end-13 l-col-start-6 l-col-end-13">
                <ul>
                    <li><a href="portfolios.html">Portfolios</a></li>
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
