<?php require_once 'header.php' ?>
    <div class="container">
        <header class="header">
            <nav class="nav">
                <ul class="nav-left">
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="login.php"  class="active">Log in</a></li>
                </ul>
                <div class="logo-container">
                    <img src="assets/images/logo.jpg" alt="logo" class="logo-top">
                </div>
                <ul class="nav-right">
                    <li class="nav-item"><a href="signup.php">Sign up</a></li>
                    <li class="nav-item"><a href="about.php">About us</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <h1 class="login-heading">Log in</h1>
            <?php if(isset($_GET['error'])) { ?>
                <?php if($_GET['error'] == "true") { ?>
                    <div style="color: red;text-align:center;font-size:2rem;"><?php echo $_GET['msg'] ?></div>
                <?php } else if($_GET['error'] == "false") { ?>
                    <div style="color: green;text-align:center;font-size:2rem;"><?php echo $_GET['msg'] ?></div>
                <?php } ?>
            <?php } ?>
            <form class="login-form" action="includes/login.inc.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Email..." required>
                <input type="password" name="password" id="password" placeholder="Password..." required>
                <button type="submit" name="submit">Log in</button>
            </form>
            <p class="form-alt">Not yet a member? <a href="signup.php">Signup</a></p>
        </main>
    </div>
<?php require_once 'footer.php' ?>
