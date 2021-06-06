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
                    <li class="nav-item"><a href="home.php" class="active">Home</a></li>
                    <li class="nav-item"><a href="add-complain.php">add complain</a></li>
                </ul>
                <div class="logo-container">
                    <img src="assets/images/logo.jpg" alt="logo" class="logo-top">
                </div>
                <ul class="nav-right">
                    <li class="nav-item"><a href="complains.php">complains</a></li>
                    <li class="nav-item"><a href="logout.php">logout</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <?php $name = get_user_name($conn, $_SESSION['user_id']) ?>
            <h1 class="homepage-heading"><span class="text-blue-1">Welcome</span> <?php echo $name["firstname"] . " " . $name["lastname"] ?></h1>
            <h2>Protection, preservation, conservation and the promotion in theory and practice the principles of environmental practice.</h2>
            <section class="article-container">
                <?php 
                    $blogs = get_blog_summary($conn);
                ?>
                <?php if($blogs === false) { ?>
                    <div style="color:red;font-size:3rem;text-align:center;">No blog yet!!!</div>
                <?php } else { ?>
                    <?php while($blog = $blogs->fetch(PDO::FETCH_ASSOC)) { ?>
                        <article class="blog">
                            <h2 class="blog-heading"><?php echo $blog['title'] ?></h2>
                            <p class="blog-content"><?php echo substr($blog['body'], 0, 200) . "..." ?></p>
                            <button class="contact-btn-primary" data-blog_id="<?php echo $blog['id'] ?>">read more</button>
                        </article>
                    <?php } ?>
                <?php } ?>
            </section>
        </main>
    </div>
<?php require_once 'footer.php' ?>
