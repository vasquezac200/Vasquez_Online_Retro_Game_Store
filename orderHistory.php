<?php
session_start();
    include("servertest.php");

    $userID = $_SESSION['userID'] ?? null;

    if ($userID === null) {
        header("Location: /vasquezrgs/login.html");
        exit;
    }

    $showOrders = $conn->query("SELECT * FROM retro_game_store.orders_with_games JOIN cart ON cart.cartID = orders_with_games.`Cart Number`  WHERE cart.userID = " . $userID);

?>

<!DOCTYPE html>
<html lang="en_US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/vasquezrgs/icon.ico" type="image/ico">
  <title>Vasquez Retro Game Store</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style.css?v=4">
  <script src="index.js" defer></script>
  <script src="index.js?v=2" defer></script>

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
          <p>Classic games, collector bundles, and pixel-era favorites.</p>
        </div>
      </div>

      <nav class="nav-actions" aria-label="Account actions">
        <a class="button secondary" id="gamesTabButton" href="/vasquezrgs/games.php">Games</a>
        <a hidden class="button secondary" id="ordersTabButton" href="/vasquezrgs/orderHistory.php">Order History</a>
        <a hidden class="button secondary" id="myCartTabButton" href="/vasquezrgs/cart.php">My Cart</a>
        <a hidden class="button primary" id="myAccountTabButton" href="/vasquezrgs/profile.php">My Account</a>
        <a hidden class="button secondary" id="loginTabButton" href="/vasquezrgs/login.html">Login</a>
        <a hidden class="button primary" id="signinTabButton" href="/vasquezrgs/signin.html">Sign Up</a>
      </nav>
    </header>

    <section class="hero">
        <article class="hero-panel">
        <span class="eyebrow">My Orders</span>
        <?php $totalPrice = 0;?>
        <?php if ($showOrders && $showOrders->num_rows > 0): ?>
            <?php foreach ($showOrders as $row): ?>
            <article class="game-card">
                <span class="tag">Order Number: <?php echo $row['Status'] ?></span>
            <h4><?php echo $row['Game Name']?></h4>
              <span class="price">Order Total: $<?php echo $row['Total Price']?></span>
              
            </article>

            <?php $cartID =  $row['cartID']?>
        <?php endforeach; ?>
      
        <?php else: ?>
            <h3><?php echo "Looks like you haven't ordered any cool games yet!"; ?></h3>
            <a class="button secondary" id="gamesTabButton" href="/vasquezrgs/games.php">Click here to buy some games</a>
        <?php endif; ?>
        </article>
    </section>
    <footer>
      <p>Created for a Database Project ::: The COL of Aidan Section 19</p>
      <nav class="footer-nav"></nav>
    </footer>
</body>
</html>