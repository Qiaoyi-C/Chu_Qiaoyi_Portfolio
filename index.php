<?php
require_once('includes/connect.php'); 

try {
    $stmt = $pdo->query("
    SELECT p.id, p.title, p.image, GROUP_CONCAT(c.name ORDER BY c.name SEPARATOR ', ') AS category
    FROM Project p
    LEFT JOIN project_category pc ON p.id = pc.project_id
    LEFT JOIN category c ON pc.category_id = c.id
    GROUP BY p.id, p.title, p.image");
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
    <title>Joy's Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
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
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <nav id="topbar-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="hero-bk">
        <section class="grid-con hero">
            <div class="col-span-full m-col-span-full l-col-span-full">
                <h1 class="hero-h1">Hello, I'm <span class="highlight">Joy</span></h1>
                <p class="hero-p">I'm a UI/UX & Graphic Designer</p>
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/qiao-yi-chu-978721199/" target="_blank">
                        <img src="images/LinkedIn.svg" class="hero-icon" alt="linkedin icon">
                    </a>
                    <a href="https://github.com/Qiaoyi-C" target="_blank">
                        <img src="images/Github.svg" class="hero-icon" alt="github icon">
                    </a>
                    <a href="https://dribbble.com/joychu" target="_blank">
                        <img src="images/Dribbble.svg" class="hero-icon" alt="dribbble icon">
                    </a>
                </div>

            <div class="hero-image">
                <img src="images/hero 2.png" alt="Joy Chu">
            </div>
        </section>
    </div>

    <!-- Portfolio Section -->
    <div class="port-bk">
    <svg class="wave-bg" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg">
        <path fill="#C5896F" fill-opacity="1" d="M0,160C480,250,960,100,1440,160V320H0Z"></path>

    </svg>

    <section class="portfolio grid-con">
        <h2 class="port-title col-start-1 col-end-5 m-col-span-full l-col-span-full">Portfolio</h2>
        
        <div class="portfolio-row col-span-full m-col-span-full l-col-span-full"> 
            <?php 
            $count = 0; 
            foreach ($projects as $row): 
                if ($count >= 3) break; 
                $count++; 
            ?>
                <div class="card">
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
            <?php endforeach; ?>
        </div>

        <div class="box col-start-1 col-end-5 m-col-span-full l-col-span-full">
            <a href=""><a href="portfolio.php" class="button-link">MORE</a> </a> 
        </div>
    </section>
</div>

 <!-- video -->
<section class="grid-con">
    <div class="video col-span-full m-col-span-full l-col-span-full">
            <video controls preload="metadata" poster="images/video.png">
                <source src="video/intro.mp4" type="video/mp4">
                <source src="video/intro.webm" type="video/webm">
            <p>Your browser does not support the video tag.</p>
            </video>
            <div class="video-controls hidden" id="video-controls">
                <button id="play-button"><i class="fa fa-play-circle-o"></i></button>
                <button id="pause-button"><i class="fa fa-pause-circle-o"></i></button>
                <button id="stop-button"><i class="fa fa-stop-circle-o"></i></button>
                <i class="fa fa-volume-up"></i>
                <input type="range" id="change-vol" step="0.05" min="0" max="1" value="1">
                <button id="full-screen"><i class="fa fa-arrows-alt"></i></button>
            </div>
    </div>
</section>



    <!-- About Section -->
    <section class="about-bk grid-con">
    <!-- About Section -->
    <div class="about col-span-full m-col-start-1 m-col-end-7 l-col-start-1 l-col-end-7">
        <h2 class="info-h2">About</h2>
        <p class="info-p">
            I possess three years of dedicated experience in UI design, fueled by a strong passion for the field. 
            Proficient in utilizing Figma and the Adobe suite, I bring a wealth of design expertise to the table. 
            My commitment lies in crafting exceptional user experiences and visually captivating designs.
        </p>
        <div class="stats">
            <div>
                <span class="number">50+</span>
                <p class="small-p">Project Completed</p>
            </div>
            <div>
                <span class="number">3+</span>
                <p class="small-p">Year of Experience</p>
            </div>
        </div>
        <div class="about-bt">
            <a href="https://profile.indeed.com/p/qiaoyic-9vzpkc7" class="button-link">Download my Resume</a>
        </div>
    </div>

    <!-- Experience Section -->
    <div class="experience col-start-1 col-end-5 m-col-start-7 m-col-end-13 l-col-start-7 l-col-end-13">
        <h2 class="info-h2">Experience</h2>
        <div class="timeline">
            <div class="exp-item">
                <span class="dot"></span>
                <div class="content">
                    <h3>Graphic Designer Internship</h3>
                    <p>Historia Studios, Alberta, Canada</p>
                    <p class="date">Jan 2025 - Present</p>
                </div>
            </div>
            <div class="exp-item">
                <span class="dot"></span>
                <div class="content">
                    <h3>UI/UX Designer</h3>
                    <p>7 You Technology Co, Taipei, Taiwan</p>
                    <p class="date">Jun 2021 - Jan 2022</p>
                </div>
            </div>
            <div class="exp-item">
                <span class="dot"></span>
                <div class="content">
                    <h3>UI/UX Designer</h3>
                    <p>Cyberuranus Inc., Taipei, Taiwan</p>
                    <p class="date">Sep 2020 - Dec 2022</p>
                </div>
            </div>
            <div class="exp-item">
                <span class="dot"></span>
                <div class="content">
                    <h3>UI/UX Designer</h3>
                    <p>Cmoney Technology CO., LTD, Taipei, Taiwan</p>
                    <p class="date">May 2018 - Aug 2020</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Skill Section -->
    <div class="skills col-span-full m-col-span-full l-col-span-full">
        <h2 class="info-h2">Skill</h2>
        <div class="skill-icons">
            <img src="images/figma.svg" alt="Figma">
            <img src="images/photoshop.svg" alt="Photoshop">
            <img src="images/illustrator.svg" alt="Illustrator">
            <img src="images/aftereffects.svg" alt="After Effects">
            <img src="images/premiere.svg" alt="Premiere Pro">
        </div>
        <div class="skill-icons">
            <img src="images/xd.svg" alt="Adobe XD">
            <img src="images/html5.svg" alt="HTNL 5">
            <img src="images/css.svg" alt="CSS">
            <img src="images/javascript.svg" alt="Javascript">
        </div>
    </div>

    
</section>

    </section>

    
    
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.0/ScrollTrigger.js"></script>
    <script src="js/main.js"></script>
    <script src="js/thirdparty.js"></script>
</body>
</html>