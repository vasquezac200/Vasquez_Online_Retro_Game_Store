<?php
    include("servertest.php");
    $gameID  = $_GET["gameId"] ?? "";
    $game = $conn->query("SELECT * FROM retro_game_store.game_information WHERE gameID =" . $gameID);
    #$game = $conn->query("SELECT games.gameID AS gameID, gameName, genreName, platformName orderItemID, quantity, unit_price FROM games JOIN genres ON genres.genreID = games.genreID LEFT JOIN orderItems ON orderItems.gameID = games.gameID WHERE games.gameID =" . $gameID);

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
        <?php if ($game): ?>
            <?php foreach ($game as $row): ?>
            <h1><?php echo $row['game']?></h1>
            <h3>Genre: <?php echo $row['genre']?></h3>
            <h3>Platform: <?php echo $row['platform']?></h3>
            <h3>Release Date: <?php $date= $row['releaseDate']; $newDate = DateTime::createFromFormat('Y-m-d', $date); echo $newDate->format('F j, Y');?></h3>
            <p></p>
            <div class="game-card-footer">
              <?php if ($row['quantity'] != null && $row['quantity'] != 0):?>
              <a class="button primary" href="cartprocess.php?gameID=<?php echo $row['gameID'];?>">Add to Cart</a>
              <span class="price">$<?php echo $row['price'] ?></span>
              <h5>Items in stock: <?php echo $row['quantity']?></h5>
              <?php else:?>
              <h3>Sorry, but we don't have that game in stock right now. :/</h3>
              <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
        </article>
    </section>
    <footer>
      <p>Created for a Database Project ::: The COL of Aidan Section 19</p>
      <nav class="footer-nav"></nav>
    </footer>
</body>
</html>