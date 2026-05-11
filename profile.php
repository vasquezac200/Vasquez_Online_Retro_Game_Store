<?php 
    session_start();
    include("servertest.php");
    $userID = $_SESSION['userID'] ?? null;
    
    $user = $conn->query("SELECT * FROM users WHERE userID = " . $userID . ";");

?> 
<!DOCTYPE html>
<html lang="en_US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/vasquezrgs/logo.ico" type="image/ico">
  <title>Vasquez Retro Game Store</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style.css?v=4">
  <script src="index.js"></script>
  

</head>
<body>
  <div class="page-shell">
    <header class="topbar">
      <div class="brand">
        <div>
          <a href="/vasquezrgs/index.html">
          <img class="brand-logo" src="logo.svg" alt="The Vasquez Retro Game Store Logo">
          <p class="version">BETA</p>
        </a>
        </div>
      </div>

      <div>
        <nav class="nav-actions" aria-label="Site navigation">
        <a class="button secondary" href="/vasquezrgs/games.php">Games</a>
        <a class="button primary" href="/vasquezrgs/signin.html">Sign Up</a>
      </nav>
    </header>
    </div>

        <article class="hero-panel">
            <?php if ($user): ?>
            <?php foreach ($user as $row): ?>
            <span class="eyebrow">Account Info</span>
            <h1><?php echo $row['username']?></h1>
            <h3>Full Name: <?php echo $row['fName'] . " ".  $row['lName']?></h3>
            <h3>Email: <?php echo $row['email']?></h3>
            <h3>Joined: <?php $date= $row['creationDate']; $newDate = DateTime::createFromFormat('Y-m-d', $date); echo $newDate->format('F j, Y');?></h3>
            <?php endforeach; ?>
            <?php endif; ?>
          <a class="button primary" href="/vasquezrgs/logout.php" id="logoutButton">Log-Out From Account</a>
          <a class="button primary">Delete Account</a>
          

          </div>
        </article>
      </section>
    </main>
    
  </div>
  <script> 
    const logOutButton = document.getElementById("logoutButton");

    logOutButton.addEventListener("click", () => {
        localStorage.setItem("isloggedIn", "false");
        
    });
  </script>
  
</body>
</html>
