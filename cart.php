<?php
    
    session_start();
    include("servertest.php");

    $userID = $_SESSION['userID'] ?? null;

    if ($userID === null) {
        header("Location: /vasquezrgs/login.html");
        exit;
    }
    $user = $conn->query("SELECT * FROM users WHERE userID = " . $userID . ";");
    $cart = $conn->query("SELECT * FROM cart WHERE userID =" . $userID);
    $showCart = $conn->query("SELECT * FROM retro_game_store.games_in_cart JOIN retro_game_store.game_information ON retro_game_store.game_information.gameID = retro_game_store.games_in_cart.gameID WHERE `userID's_cart` = " . $userID);
    
  
    
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
        <span class="eyebrow">My Cart</span>
        <?php $totalPrice = 0;?>
        <?php if ($showCart && $showCart->num_rows > 0): ?>
            <?php foreach ($showCart as $row): ?>
            <article class="game-card">
                <span class="tag"><?php echo $row['genre'] ?></span>
            <h4><?php echo $row['game']?></h4>
            <p></p>
            <div class="game-card-footer">
              <a class="button secondary" href="" onclick="gameInfo(event, <?php echo $row['gameID'];?>)">More Info</a>
              <a class="button primary" href="removeItemFromCart.php?gameID=<?php echo $row['gameID'];?>">Remove from Cart</a>
              <span class="price">$<?php echo $row['price']; $totalPrice += $row['price']?></span>
              
            </article>

            <?php $cartID =  $row['cartID']?>
        <?php endforeach; ?>
        

        <form action="orderProcess.php" method="post">

        <div class="form-field">
            <label for="fullName">Full Name</label>
            <input
              type="name"
              id="fullName"
              name="fullName"
              placeholder="Enter your Full Name"
              required
            
            >
          </div>

        <div class="form-field">
            <label for="address">Address</label>
            <input
              type="text"
              id="address"
              name="address"
              placeholder="Enter your Mailing Address"
              required
              
            >
          </div>

          <div class="form-field">
            <label for="city">City</label>
            <input
              type="text"
              id="city"
              name="city"
              placeholder="Enter your City"
              required
              
            >
          </div>

          <div class="form-field">
            <label for="state">State</label>
            <input
              type="text"
              id="state"
              name="state"
              placeholder="Enter your State"
              required
              
            >
          </div>

          <div class="form-field">
            <label for="zip">Zip</label>
            <input
              type="text"
              id="zip"
              name="zip"
              placeholder="Enter your Zip Code"
              
              >
          </div>

          <div class="form-field">
            <label for="ccn">Credit Card Number</label>
            <input
              type="text"
              id="ccn"
              name="ccn"
              placeholder="Enter your Credit Card Number"
              required
              
            >
          </div>


          <div class="form-field">
            <label for="cvv">CVV</label>
            <input
              type="text"
              id="cvv"
              name="cvv"
              placeholder="Enter your CVV"
             
            >
          </div>
          <br>
          <div class="form-row">
            <h3 class="price">Your Total: $<?php echo $totalPrice?></h3>
            <?php $_SESSION["cartID"] = $cartID;
                    $_SESSION["totalPrice"] = $totalPrice;?>
            <button class="button primary" href="" onclick="">Proceed to Checkout</button>
          </div>
            </form>
        
        <?php else: ?>
            <h3><?php echo "This cart is empty! Better get lookin'!"; ?></h3>
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