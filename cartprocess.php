<?php
session_start();
include('servertest.php');

$gameID = intval($_GET['gameID'] ?? 0);
$userID = intval($_SESSION['userID'] ?? 0);

if ($userID <= 0) {
    header("Location: /vasquezrgs/login.html");
    exit;
}

if ($gameID <= 0) {
    header("Location: /vasquezrgs/games.php");
    exit;
}

$loadExistingCart = $conn->query("SELECT cartID FROM cart WHERE userID = $userID AND status = 'active'");

if ($loadExistingCart && $loadExistingCart->num_rows > 0) {
    $row = $loadExistingCart->fetch_assoc();
    $cartID = intval($row['cartID']);
} else {
    $newCart = "INSERT INTO cart (userID, status) VALUES ($userID, 'active')";

    if ($conn->query($newCart) === TRUE) {
        $cartID = $conn->insert_id;
    } else {
        die("Failed to create cart.");
    }
}

$conn->query("INSERT INTO orderItems (cartID, gameID) VALUES ($cartID, $gameID)");

header("Location: /vasquezrgs/cart.php");
exit;
?>
