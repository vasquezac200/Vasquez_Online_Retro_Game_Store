<?php
    include("servertest.php");
    $keyword  = $_GET["keyword"] ?? "";
    echo "You searched for " . htmlspecialchars($keyword);
    
    $sql = $conn->query("SELECT games.gameID AS gameID, gameName, genreName, quantity, price FROM games JOIN genres ON genres.genreID = games.genreID JOIN platforms ON platforms.platformID = games.platformID  WHERE gameName LIKE '%" . $keyword . "%' OR genreName LIKE '%" . $keyword . "%' OR platformName LIKE '%" . $keyword . "%';")

?>

<!DOCTYPE html>
<html lang="en_US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Retro Online Game Store</title>
  <link rel="stylesheet" href="style.css?v=4">
  <script src="index.js" defer></script>

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
    <section>
        <div class="hero">
          <h2 class="hero-title">List of Games to Try</h2>
          <div class="question-container">
          <p>Still looking for the game you want?</p>
          <input id="searchInput" type="text" placeholder="Search games, genres, consoles">
          <a class="button secondary" href="#" onclick="searchGames(event)">Search</a>
        </div>
        </div>
      </section> 

      <section>
        <div class="catalog-grid">
          <h3 style="text-align: right;" class="section-title">Searching for <?php echo $keyword?> </h3>
          
          <div class="games-list">
          <?php if ($sql && $sql->num_rows > 0): ?>
            <?php foreach ($sql as $row): ?>
                <article class="game-card">
                <span class="tag"><?php echo $row['genreName'] ?></span>
            <h4><?php echo $row['gameName']?></h4>
            <p></p>
            <div class="game-card-footer">
              <a class="button secondary" href="" onclick="gameInfo(event, <?php echo $row['gameID'];?>)">More Info</a>
              <?php if ($row['quantity'] != null && $row['quantity'] != 0):?>
              <a class="button primary" href="cartprocess.php?gameID=<?php echo $row['gameID'];?>">Add to Cart</a>
              <span class="price">$<?php echo $row['price'] ?></span>
              <?php else:?>
              <h3>OUT OF STOCK</h3>
              <?php endif; ?>
            </div>
            </article>
            <?php endforeach; ?>
          <?php else: ?>
            <h3>Hmm... Sorry, doesn't seem like we have that game.</h3>
            <?php endif; ?>
          </div>
          </div>
        <br><br><br>
      </section>
  

    <footer>
      <p>Created for a Database Project ::: The COL of Aidan Section 19</p>
      <nav class="footer-nav"></nav>
    </footer>
</body>
</html>
