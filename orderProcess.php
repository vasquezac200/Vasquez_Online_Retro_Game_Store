<?php
    session_start();
    include("serverTest.php");
    
    $userID = $_SESSION['userID'] ?? null;

    if ($userID === null) {
        header("Location: /vasquezrgs/index.html");
        exit;
    }

    $cartID = $_SESSION['cartID'] ?? null;
    $fullName = $_POST['fullName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $CCN = $_POST['ccn'];
    $CVV = $_POST['cvv'];
    $totalPrice = $_SESSION["totalPrice"];

    $sql = "INSERT INTO orders (cartID, fullName, mailingAddress, city, state, zip, totalAmount, orderDate) VALUES ('$cartID','$fullName','$address','$city','$state', '$zip','$totalPrice','2020-02-01')";

    if ($conn->query($sql) === TRUE) {
          $result = "Order Placed Successfully!";
          $subResult = "Have fun with yout new games! :)";
          $changeCartStatus = $conn->query("UPDATE cart SET status = 'completed' WHERE cartID = '$cartID'");
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
        <span class="eyebrow">Ordered</span>
        <h2 class="auth-title"><?php echo $result?></h2>
        <p class="auth-copy"><?php echo $subResult?></p>
        <a class ="button secondary" onclick="" href="/vasquezrgs">Click here to return to homepage.</a>
        


       
      </section>
    </main>
  </div>

  <script src="index.js"></script>
</body>
</html>
