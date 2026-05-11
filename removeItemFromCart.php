<?php
session_start();
include("servertest.php");

$userID = $_SESSION["userID"] ?? null;

if ($userID === null) {
    header("Location: /vasquezrgs/login.html");
    exit;
}

$gameID = $_GET['gameID'] ?? null;

if ($gameID > 0) {
    $conn->query("DELETE orderItems FROM orderItems JOIN cart ON cart.cartID = orderItems.cartID WHERE userID = ". $userID ." AND gameID = " . $gameID);
}

header("Location: /vasquezrgs/cart.php");
exit;
?>
