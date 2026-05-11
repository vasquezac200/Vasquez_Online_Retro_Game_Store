USE retro_game_store;
DELIMITER //

#This trigger has accessed to the orderItems table which automatically 
DROP TRIGGER IF EXISTS autoPlacePriceAndQuantity//
CREATE TRIGGER autoPlacePriceAndQuantity
BEFORE INSERT ON orderItems
FOR EACH ROW
BEGIN
	SELECT price INTO @gamePrice
    FROM games
    WHERE gameID = NEW.gameID;
    
    SET NEW.unit_price = @gamePrice;
    
    IF NEW.quantity IS NULL THEN
    SET NEW.quantity = 1;
    END IF;

END//

#This trigger has access to the website which subtracts the remaining stock in the games table after the user has successfully ordered the games.
DROP TRIGGER IF EXISTS removeGamesInStockAfterOrdering//
CREATE TRIGGER removeGamesInStockAfterOrdering
AFTER UPDATE ON cart 
FOR EACH ROW
BEGIN
	IF NEW.status = 'completed' THEN
		UPDATE games
        JOIN orderItems ON orderItems.gameID = games.gameID
        SET games.quantity = games.quantity - orderItems.quantity
        WHERE orderItems.cartID = NEW.cartID;
    END IF;
END//

#This trigger prevents adding a negative value to the unit_price on games when inserting a new row.
DROP TRIGGER IF EXISTS preventInsertNegativePrice //
CREATE TRIGGER preventInsertNegativePrice
BEFORE INSERT ON orderItems
FOR EACH ROW
BEGIN
	IF (NEW.unit_price < 0)
    THEN SIGNAL SQLSTATE '45000' SET message_text = "VALUE UNDER 0";
    END IF;
END //

#This trigger prevents adding a negative value to the unit_price on games when updating an existing row.
DROP TRIGGER IF EXISTS preventUpdateNegativePrice //
CREATE TRIGGER preventUpdateNegativePrice
BEFORE UPDATE ON orderItems
FOR EACH ROW
BEGIN
	IF (NEW.unit_price < 0)
    THEN SIGNAL SQLSTATE '45000' SET message_text = "VALUE UNDER 0";
    END IF;
END //

#This event can delete old existing orders that are older than 30 days.
DROP EVENT IF EXISTS cleanOldOrders //
CREATE EVENT cleanOldOrders
ON SCHEDULE EVERY 1 DAY
DO 
BEGIN
	DELETE FROM orders WHERE orderDate < (NOW() - INTERVAL 30 DAY);
    INSERT INTO audit_log VALUES (NOW(), 'Orders Cleared');
END //

DELIMITER ;