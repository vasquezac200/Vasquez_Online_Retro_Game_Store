USE retro_game_store;

DELIMITER //

#Changes the price for one game that is in stock.
CREATE PROCEDURE update_game_price(selected_gameID INT, newPrice DECIMAL(10,2))
BEGIN
	IF newPrice IS NULL THEN
		SET newPrice = 50.00;
	END IF;
    
    UPDATE orderItems
	SET unit_price = newPrice 
	WHERE gameID = selected_gameID;
END//

#Changed the price for Pokemon Yellow from $59.99 to $79.99.
#CALL retro_game_store.update_game_price(18, 79.99);

#Changes the quantity amount of an item in stock.
CREATE PROCEDURE update_quantity_amount(selected_gameID INT, newAmount INT)
BEGIN
    UPDATE orderItems
	SET quantity = newAmount 
	WHERE gameID = selected_gameID;
END//

#Changed the quantity for Super Mario 64 from 2 to 5.
#CALL retro_game_store.update_quantity_amount(7, 5);

#Calls out a gameID by finding its game name. (Will be used for quick search)
CREATE FUNCTION search_gameID_by_name(game_name VARCHAR(50))
RETURNS INT 
DETERMINISTIC READS SQL DATA
BEGIN
	DECLARE game_id_var INT;
    
    SELECT gameID INTO game_id_var
    FROM games
    WHERE gameName LIKE CONCAT('%', game_name, '%')
    LIMIT 1; 
    
    RETURN(game_id_var);
END//

#Calls out a userID by finding its username. (Will be used for logging in user)
CREATE FUNCTION search_userID_by_username(user_name VARCHAR(50))
RETURNS INT 
DETERMINISTIC READS SQL DATA
BEGIN
	DECLARE user_id_var INT;
    
    SELECT userID INTO user_id_var
    FROM users
    WHERE username = user_name
    LIMIT 1; 
    
    RETURN(user_id_var);
END//

DELIMITER ;
