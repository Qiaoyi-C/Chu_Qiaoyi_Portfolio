<?php
// 確保連接資料庫
require_once('includes/connect.php');

// 驗證並獲取 URL 中的 id
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $project_id = intval($_GET['id']);

    // 查詢專案基本資訊
    $query = "SELECT * FROM Project WHERE id = $project_id";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $project = mysqli_fetch_assoc($result); // 獲取專案詳細資料
    } else {
        echo "<p>Project not found.</p>";
        exit;
    }

    // 查詢該專案的所有圖片
    $image_query = "SELECT image FROM project_images WHERE project_id = $project_id";
    $image_result = mysqli_query($connect, $image_query);

    $images = [];
    if ($image_result && mysqli_num_rows($image_result) > 0) {
        while ($row = mysqli_fetch_assoc($image_result)) {
            $images[] = $row['image']; // 將圖片路徑儲存到陣列
        }
    }
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
            <nav id="sidebar-menu">
                <div id="close-menu"><img src="images/close.svg" alt="close icon"></div>            
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <nav id="topbar-menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <!-- Case Study -->
    <main >
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

                <div class="images col-span-full">
                <?php foreach ($images as $image): ?>
                    <img src="images/<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                <?php endforeach; ?>
                </div>

                <div class="created-dat col-start-1 col-end-5 m-col-start-1 m-col-end-7 l-col-start-1 l-col-end-7">
                    <h3>Created Date</h3>
                    <p><?php echo htmlspecialchars($project['created_date']); ?></p>
                </div>

            </div>
        </section>
    </main>

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