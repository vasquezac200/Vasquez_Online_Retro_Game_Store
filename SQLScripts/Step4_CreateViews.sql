USE retro_game_store;

#Shows the full information for each game.
CREATE OR REPLACE VIEW game_information AS
SELECT games.gameID AS 'gameID', games.platformID AS 'platformID',  gameName AS 'game', genreName AS 'genre', platformName AS 'platform', releaseDate, quantity, price
FROM games 
	JOIN genres ON genres.genreID = games.genreID
	JOIN platforms ON platforms.platformID = games.platformID;
    
#Shows only the games in stock with only a few available copy left.
CREATE OR REPLACE VIEW low_in_stock_games AS
SELECT games.gameID AS 'gameID', games.platformID AS 'platformID',  gameName AS 'game', genreName AS 'genre', platformName AS 'platform', releaseDate, quantity, price
FROM games
	JOIN genres ON genres.genreID = games.genreID
    JOIN platforms ON games.platformID = platforms.platformID
WHERE quantity < 3;

#Shows the games listed in cart 
CREATE OR REPLACE VIEW games_in_cart AS
SELECT cart.cartID, cart.userID AS "userID's_cart", cart.created AS "cartCreationDate", orderItems.gameID, orderItems.orderID
FROM cart
	JOIN orderItems ON orderItems.cartID = cart.cartID;

CREATE OR REPLACE VIEW orders_with_games AS
SELECT orders.orderID AS "Order Number", orders.cartID AS "Cart Number", orders.fullName AS "Full Name", orders.orderDate AS "Order Placed", orders.status AS "Status", games.gameID AS "Game Number", games.gameName AS "Game Name", orderItems.quantity AS "Total Items", orders.totalAmount AS "Total Price"
FROM orders
JOIN orderItems ON orderItems.cartID = orders.cartID
JOIN games ON games.gameID = orderItems.gameID;