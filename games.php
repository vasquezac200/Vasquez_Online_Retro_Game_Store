<?php 
    include("serverTest.php");
    $gameboyGames = $conn->query("SELECT * FROM retro_game_store.game_information WHERE platformID = 6 OR platformID = 7 OR platformID = 8;");
    $playstationGames = $conn->query("SELECT * FROM retro_game_store.game_information WHERE platformID = 11 OR platformID = 12 OR platformID = 13;")


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
  <script src="index.js" searchGames(event) defer></script>

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


      <nav class="nav-actions" aria-label="Account actions">
        <a class="button secondary" id="gamesTabButton" href="/vasquezrgs/games.php">Games</a>
        <a hidden class="button secondary" id="ordersTabButton" href="/vasquezrgs/orderHistory.php">Order History</a>
        <a hidden class="button secondary" id="myCartTabButton" href="/vasquezrgs/cart.php">My Cart</a>
        <a hidden class="button primary" id="myAccountTabButton" href="/vasquezrgs/profile.php">My Account</a>
        <a hidden class="button secondary" id="loginTabButton" href="/vasquezrgs/login.html">Login</a>
        <a hidden class="button primary" id="signinTabButton" href="/vasquezrgs/signin.html">Sign Up</a>
      </nav>
    </header>

    <main>
      <article class="hero-panel">
    <section>
      
        <div class="hero">
          <h2 class="hero-title">List of Games to Try</h2>
          <div class="question-container">
          <p>Still looking for a game you want? Try searching it up!</p>
          <input id="searchInput" type="text" placeholder="Search games, genres, consoles">
          <a class="button secondary" href="" onclick="searchGames(event)">Search</a>
        </div>
        </div>
      </section> 

      
    <section>
        <div class="catalog-grid">
          <h3 style="text-align: right;"class="section-title">Gameboy Collections</h3>
          
        
          <div class="games-list">
          <?php if ($gameboyGames != null): ?>
                <?php foreach ($gameboyGames as $row): ?>
                <article class="game-card">
                <span class="tag"><?php echo $row['genre'] ?></span>
            <h4><?php echo $row['game']?></h4>
            <p></p>
            <div class="game-card-footer">
              <a class="button secondary" href="#" onclick="gameInfo(event, <?php echo $row['gameID'];?>)">More Info</a>
              <?php if ($row['quantity'] != null or  $row['quantity'] != 0):?>
              <a class="button primary" href="cartprocess.php?gameID=<?php echo $row['gameID'];?>">Add to Cart</a>
              <span class="price">$<?php echo $row['price'] ?></span>
              <?php else:?>
              <h3>OUT OF STOCK</h3>
              <?php endif; ?>
            </div>
            </article>
            <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
        <br><br><br>
      </section>

      <section>
        <div class="catalog-grid">
          <h3 style="text-align: right;" class="section-title">Playstation Classics</h3>
          
          <div class="games-list">
          <?php if ($playstationGames != null): ?>
                <?php foreach ($playstationGames as $row): ?>
                <article class="game-card">
                <span class="tag"><?php echo $row['genre'] ?></span>
            <h4><?php echo $row['game']?></h4>
            <p></p>
            <div class="game-card-footer">
              <a class="button secondary" href="#" onclick="gameInfo(event, <?php echo $row['gameID'];?>)">More Info</a>
              <?php if ($row['quantity'] != null or  $row['quantity'] != 0):?>
              <a class="button primary" href="cartprocess.php?gameID=<?php echo $row['gameID'];?>">Add to Cart</a>
              <span class="price">$<?php echo $row['price'] ?></span>
              <?php else:?>
              <h3>OUT OF STOCK</h3>
              <?php endif; ?>
            </div>
            </article>
            <?php endforeach; ?>
            <?php endif; ?>
          </div>
          </div>
        <br><br><br>
      </section>

    </article>

    <footer>
      <p>Created for a Database Project ::: The COL of Aidan Section 19</p>
      <nav class="footer-nav"></nav>
    </footer>
</body>
</html>
