<html>
<?php
$cell = 0;
//connect to the running database server and the specific database
require_once('includes/connect.php');

//create a query to run in SQL
$query = 'SELECT `id`, `title`, `image` FROM `Project` ';

//run the query to get back the content
$results = mysqli_query($connect, $query);
?>

<head>
<script src="https://cdn.tailwindcss.com"></script>

<style>
section {
    margin: 75px 0 55px 0;
}

.myform {
    margin: 20px;
}

.grid {
    display: grid;
    grid-template-columns: repeat(12, 80px);
}

.left {
    grid-columns: 1/7;
}

.right {
    grid-columns: 7/13;
}
</style>

</head>

<body>
<header></header>

<?php
// Iterate through the results
while ($row = mysqli_fetch_array($results)) {
    echo '<section>';

    $cell = $cell + 1;

    // Determine layout position based on $cell
    if ($cell % 2 > 0) {
        echo '<div class="col-start-1 col-span-6">';  
    } else {
        echo '<div class="col-start-6 col-span-6">';
    }

    // Display the project data
    echo '<div class="md:flex">
            <div class="md:shrink-0">
                <a href="details.php?id=' . $row['id'] . '">
                    <img class="h-48 w-full object-cover md:h-full md:w-48" src="images/' . htmlspecialchars($row['image']) . '" alt="Project Image">
                </a>
            </div>
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">' . htmlspecialchars($row['title']) . '</div>
                <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">' . htmlspecialchars($row['description']) . '</a>
            </div>
          </div>
        </div>
    </section>';
}
?>

<footer>
<?php
echo date('l jS \of F Y h:i:s A');
?>
</footer>
</body>
</html>
