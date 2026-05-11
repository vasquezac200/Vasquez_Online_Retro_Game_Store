<?php
    include("serverTest.php");

    $result = "Please fill out every field before creating an account.";
    $subResult = null;

        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $creationDate = date('Y-m-d');

        $sql = "INSERT INTO users (fName, lName, email, username, password, creationDate) VALUES ('$fname', '$lname', '$email', '$username', '$password', '$creationDate');";

        if ($conn->query($sql) === TRUE) {
          $result = "New account created successfully!";
          $subResult = "Now try to log in with that account.";
        } 
        else {
          $result = "CRITICAL ERROR";
          $subResult = $conn->error;
        }
?>

<!DOCTYPE html>
<html lang="en_US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/vasquezrgs/logo.ico" type="image/ico">
  <title>Sign In | Vasquez Retro Game Store</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style.css?v=4">

</head>
<body>
  <div class="page-shell">
    <header class="topbar">
      <div class="brand">
        <div>
          <img class="brand-logo" src="logo.svg" alt="The Vasquez Retro Game Store Logo">
          <p class="version">BETA</p>
          <p>Classic games, collector bundles, and pixel-era favorites.</p>
        </div>
      </div>
      <nav class="nav-actions" aria-label="Site navigation">
        <a class="button secondary" href="/vasquezrgs/index.html">Home</a>
        <a class="button secondary" href="/vasquezrgs/games.php">Games</a>
        <a class="button primary" href="/vasquezrgs/login.html">Login</a>
        <a class="button primary" href="/vasquezrgs/signin.html">Sign In</a>
      </nav>
    </header>
    <main class="auth-layout">
      <section class="auth-panel">
        <span class="eyebrow">Member Sign In</span>
        <h2 class="auth-title"><?php echo $result ?></h2>
        <p class="auth-copy"><?php echo $subResult?></p>
        <a class ="button secondary" onclick="window.location.href='/vasquezrgs/index.html'">Click here to return to homepage.</a>

       
      </section>
    </main>
  </div>

  <script>
    src="index.js"
  </script>
</body>
</html>
