<?php
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: login.php");
    }
?>
<?php require_once 'header.php' ?>
    <div class="container">
        <header class="header">
            <nav class="nav">
                <ul class="nav-left">
                    <li class="nav-item"><a href="home.php">Home</a></li>
                    <li class="nav-item"><a href="add-complain.php"  class="active">add complain</a></li>
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
            <h1 class="login-heading">What is wrong with the environment around you?</h1>
            <?php if(isset($_GET['error'])) { ?>
                <?php if($_GET['error'] == "true") { ?>
                    <div style="color: red;text-align:center;font-size:2rem;"><?php echo $_GET['msg'] ?></div>
                <?php } else if($_GET['error'] == "false") { ?>
                    <div style="color: green;text-align:center;font-size:2rem;"><?php echo $_GET['msg'] ?></div>
                <?php } ?>
            <?php } ?>
            <form class="login-form" action="includes/add-complain.inc.php" method="POSt">
                <textarea name="message" id="message" placeholder="we can't wait to hear from you..." required></textarea>
                <div class="date-container">
                    <label for="date">When was this noticed?</label>
                    <input type="date" name="date" id="date" max="<?php echo date("Y-m-d") ?>" required>
                </div>
                <div class="category-container">
                    <label for="category">Category</label>
                    <select name="category" id="category" required>
                        <option value="land">Land</option>
                        <option value="air">Air</option>
                        <option value="water">Water</option>
                    </select>
                </div>
                <div class="agreement-container">
                    <input type="checkbox" name="agree" id="agree">
                    <label for="agree">I agree that the information provided above is accurate</label>
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>
        </main>
    </div>
<?php require_once 'footer.php' ?>
