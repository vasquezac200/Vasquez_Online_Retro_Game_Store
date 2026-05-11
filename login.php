<?php
    session_start();
    include("serverTest.php");

    $sql = "SELECT * FROM users";

    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $userID = null;
    $isLoggedIn = false;
    
    $result = $conn->query("SELECT userID, fName, lName FROM users WHERE username = '$username' AND password = '$password'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fName = $row['fName'];
        $lName = $row['lName'];
        $userID = $row['userID'];
        $_SESSION['userID'] = $userID;
        $isLoggedIn = true;
        $result = "Welcome " . $fName . "!"; 
        $subResult = "Now you are ready to order some games.";
    } else {
        $result = "Invalid Login!";
        $subResult = "Username or password is incorrect.";
    }

?>
<!DOCTYPE html>
<html lang="en_US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/vasquezrgs/logo.ico" type="image/ico">
  <title>Log In | Vasquez Retro Game Store</title>
  <link rel="stylesheet" href="style.css?v=4">

</head> 
<body>
  <div class="page-shell">
    <header class="topbar">
      <div class="brand">
        <div>
          <a href="/vasquezrgs/index.html">
          <img class="brand-logo" src="logo.svg" alt="The Vasquez Retro Game Store Logo">
        </a>
        </div>
      </div>

      <nav class="nav-actions" aria-label="Site navigation">
        <a class="button secondary" href="/vasquezrgs/games.php">Games</a>
        <a class="button primary" href="/vasquezrgs/signin.html">Sign Up</a>
      </nav>
    </header>
    <main class="auth-layout">
      <section class="auth-panel">
        <span class="eyebrow">Member Login</span>
        <h2 class="auth-title"><?php echo $result?></h2>
        <p class="auth-copy"><?php echo $subResult?></p>
        <?php if($isLoggedIn == false):?>
          <div>
        <a class ="button primary" onclick="" href="/vasquezrgs/login.html">Click here to try again.</a>
        </div>
        <?php endif?>
        <br>
        <div>
        <a class ="button secondary" onclick="" href="/vasquezrgs">Click here to return to homepage.</a>
        </div>


       
      </section>
    </main>
  </div>

  <?php if ($isLoggedIn): ?>
  <script>
    localStorage.setItem("isloggedIn", "true");
  </script>
  <?php else: ?>
  <script>
    localStorage.setItem("isloggedIn", "false");
  </script>
  <?php endif; ?>

  <script src="index.js"></script>
</body>
</html>
