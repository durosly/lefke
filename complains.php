<?php
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: login.php");
    }

    require_once 'includes/Database.php';
    require_once 'includes/functions.php';
?>
<?php require_once 'header.php' ?>
    <div class="container">
        <header class="header">
            <nav class="nav">
                <ul class="nav-left">
                    <li class="nav-item"><a href="home.php">Home</a></li>
                    <li class="nav-item"><a href="add-complain.php">add complain</a></li>
                </ul>
                <div class="logo-container">
                    <img src="assets/images/logo.jpg" alt="logo" class="logo-top">
                </div>
                <ul class="nav-right">
                    <li class="nav-item"><a href="complains.php" class="active">complains</a></li>
                    <li class="nav-item"><a href="logout.php">logout</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <h1 class="homepage-heading"><span class="text-blue-1">Welcome</span> Micheal Nathan</h1>
            <h2>Some of the issues stated</h2>
            <?php if(isset($_GET['error'])) { ?>
                <?php if($_GET['error'] == "false") { ?>
                    <div style="color: green;text-align:center;font-size:2rem;"><?php echo $_GET['msg'] ?></div>
                <?php } ?>
            <?php } ?>
            <section class="article-container">
                <?php $complains = get_complain($conn); ?>
                <?php if($complains === false) { ?>
                    <div style="color: green;text-align:center;font-size:2rem;">No record found.</div>
                <?php } else { ?>
                    <?php while($row = $complains->fetch(PDO::FETCH_ASSOC)) { ?>
                        <article class="blog">
                            <p class="blog-user"><?php echo $row['firstname'] . " " . $row['lastname'] ?></p>
                            <p class="blog-category"><?php echo $row['category'] ?></p>
                            <p class="blog-date">Noticed: <?php echo $row['date'] ?></p>
                            <p class="blog-content"><?php echo $row['message'] ?></p>
                        </article>
                    <?php } ?>
                <?php } ?>
            </section>
        </main>
    </div>
<?php require_once 'footer.php' ?>
