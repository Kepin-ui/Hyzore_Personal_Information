<?php
include './conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="./src/css/project.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');
    </style>
    <title>Hyzore Project Collection</title>
    <link rel="icon" href="./src/img/hyzore.jpg" />
</head>

<body>
    <header>
        <h1 style="font-family: 'Montserrat', sans-serif;">Hyzore Project Collection</h1>
    </header>

    <main>
        <?php
        $limit = 10;
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $homepage = ($page > 1) ? ($page * $limit) - $limit : 0;

        $previous = $page - 1;
        $next = $page + 1;

        $data = mysqli_query($conn, "SELECT * FROM project");
        $amount_data = mysqli_num_rows($data);
        $amount_page = ceil($amount_data / $limit);

        $project_data = mysqli_query($conn, "SELECT * FROM project ORDER BY timestamp DESC limit $homepage, $limit");
        $no = $homepage + 1;
        while ($d = mysqli_fetch_array($project_data)) {
            ?>
            <section class="projects">
                <div class="project">
                    <div class="thumbnail">
                        <img src="<?php echo $d['image'] ?>" alt="Project Thumbnail">
                        <p class="timestamp" style="font-family: 'Montserrat', sans-serif;"><?php echo $d['timestamp'] ?> </p>
                    </div>
                    <div class="project-details">
                        <h2 style="font-family: 'Montserrat', sans-serif;"><?php echo $d['title'] ?></h2>
                        <p class="sub" style="font-family: 'Montserrat', sans-serif;"><?php echo $d['subtitle'] ?></p>
                        <br>
                        <a style="font-family: 'Montserrat', sans-serif;" href="<?php echo $d['link'] ?>" target="_blank">View</a>
                    </div>
                </div>
            </section>
            <?php
        }
        ?>
        <div class="pagination">
            <a <?php if ($page > 1) { echo "href='?page=$previous'"; } ?>><<</a>
                <?php
                for ($x = 1; $x <= $amount_page; $x++) {
                ?>
            <a href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
                <?php
                }
                ?>
            <a <?php if ($page < $amount_page) { echo "href='?page=$next'"; } ?>>>></a>
        </div>
    </main>
    <footer>
        <?php
        $query = "SELECT timestamp FROM project ORDER BY timestamp DESC LIMIT 1";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $latestTimestamp = $row['timestamp'];
        }
        ?>
        <p style="font-family: 'Montserrat', sans-serif;">&copy;2023 Hyzore Project. All rights reserved.<br>Last Update: <?php echo $latestTimestamp ?>
        </p>
    </footer>
</body>
</html>