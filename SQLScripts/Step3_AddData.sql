USE retro_game_store;

INSERT INTO users (fName, lName, email, username, password, creationDate)
VALUES
('Aidan', 'Vasquez', 'aidan.vasquez05@example.com', 'aidan28', 'thesecretglitch0909!', '2026-04-01'), 
('Liam', 'Carter', 'liam.carter21@example.com', 'liamc21', 'GameOn123!', '2026-04-01'),
('Sophia', 'Mitchell', 'sophia.mitchell88@example.com', 'smitchell88', 'RetroFan456!', '2026-04-02'),
('Noah', 'Bennett', 'noah.bennett34@example.com', 'noahb34', 'PixelHero789!', '2026-04-03'),
('Emma', 'Reed', 'emma.reed17@example.com', 'emmare17', 'ArcadeStar101!', '2026-04-04'),
('Mason', 'Flores', 'mason.flores55@example.com', 'masonf55', 'Controller202!', '2026-04-05'),
('Olivia', 'Hayes', 'olivia.hayes90@example.com', 'ohayes90', 'LevelUp303!', '2026-04-06'),
('Ethan', 'Ward', 'ethan.ward66@example.com', 'ethanw66', 'QuestMode404!', '2026-04-07'),
('Ava', 'Brooks', 'ava.brooks11@example.com', 'avab11', 'BossFight505!', '2026-04-08'),
('Lucas', 'Price', 'lucas.price72@example.com', 'lucasp72', 'CoinOp606!', '2026-04-09'),
('Mia', 'Cooper', 'mia.cooper29@example.com', 'miac29', 'Victory707!', '2026-04-10');


INSERT INTO platforms(platformID, platformName, company)
VALUES 
('1', 'NES (Nintendo Entertain System)', 'Nintendo'),
('2', 'SNES (Super Nintendo Entertainment System)', 'Nintendo'),
('3', 'Nintendo 64', 'Nintendo'),
('4', 'GameCube', 'Nintendo'),
('5', 'Wii', 'Nintendo'),
('6', 'Game Boy', 'Nintendo'),
('7', 'Game Boy Color', 'Nintendo'),
('8', 'Game Boy Advance', 'Nintendo'),
('9', 'Nintendo DS', 'Nintendo'),
('10', 'Nintendo 3DS', 'Nintendo'),
('11', 'PlayStation (PS1)', 'Sony'),
('12', 'PlayStation 2 (PS2)', 'Sony'),
('13', 'PlayStation 3 (PS3)', 'Sony'),
('14', 'PlayStation Portable (PSP)', 'Sony'),
('15', 'PlayStation Vita', 'Sony'),
('16', 'Xbox', 'Microsoft'),
('17', 'Xbox 360', 'Microsoft'),
('18', 'Sega Master System', 'Sega'),
('19', 'Sega Genesis (Mega Drive)', 'Sega'),
('20', 'Sega Saturn', 'Sega'),
('21', 'Dreamcast', 'Sega'),
('22', 'Game Gear', 'Sega');

INSERT INTO genres(genreID, genreName)
VALUES
('1', 'Action'),
('2', 'Adventure'),
('3', 'Puzzle'),
('4', 'Role-Playing (RPG)'),
('5', 'Simulation'),
('6', 'Survival'),
('7', 'Horror'),
('8', 'Shooter (FPS / TPS)'),
('9', 'Sandbox'),
('10', 'Racing'),
('11', 'Party/Sports'),
('12', 'Rhythm'),
('13', 'Compilation'),
('14', 'Platformer');


INSERT INTO games(gameName, genreID, releaseDate, platformID, quantity, price)
VALUES
-- Game Boy
('Kirbys Dream Land', 14, '1992-04-27', 6, 7, 24.99),
('Super Mario Land', 14, '1989-04-21', 6, 9, 19.99),
('Pokemon Red', 4, '1996-02-27', 6, 4, 59.99),
('Pokemon Blue', 4, '1996-02-27', 6, 4, 59.99),
('Tetris', 3, '1989-06-14', 6, 12, 14.99),
('Pokemon Yellow', 4, '1998-09-12', 6, 5, 64.99),

-- GBC
('Pokemon Gold', 4, '1999-11-21', 7, 5, 69.99),
('Pokemon Silver', 4, '1999-11-21', 7, 5, 69.99),
('Pokemon Crystal', 4, '2000-12-14', 7, 2, 129.99),
('Zelda: Links Awakening DX', 1, '1998-12-01', 7, 4, 54.99),
('Pokemon Trading Card Game', 4, '1998-12-18', 7, 3, 39.99),
('Wario Land 3', 14, '2000-03-21', 7, 4, 44.99),

-- GBA
('Pokemon Ruby and Sapphire', 4, '2002-11-21', 8, 6, 74.99),
('Pokemon FireRed and LeafGreen', 4, '2004-01-29', 8, 5, 89.99),
('Mario Kart: Super Circuit', 10, '2001-07-21', 8, 6, 29.99),
('The Legend of Zelda: Minish Cap', 1, '2004-11-04', 8, 3, 84.99),
('Metroid Fusion', 8, '2002-11-18', 8, 4, 49.99),

-- DS
('New Super Mario Bros.', 2, '2006-05-15', 9, 10, 24.99),
('Pokemon SoulSilver', 4, '2009-12-09', 9, 3, 139.99),
('Pokemon HeartGold', 4, '2009-12-09', 9, 3, 139.99),
('Pokemon Platinum', 4, '2008-09-13', 9, 4, 119.99),
('The Legend of Zelda: Phantom Hourglass', 1, '2007-06-23', 9, 5, 34.99),
('Pokemon Black', 4, '2010-09-18', 9, 5, 79.99),
('Pokemon White', 4, '2010-09-18', 9, 5, 79.99),
('Mario Kart DS', 10, '2005-11-14', 9, 7, 24.99),
('Nintendogs', 5, '2005-04-21', 9, 8, 14.99),

-- 3DS
('Mario Kart 7', 10, '2011-12-01', 10, 8, 24.99),
('Pokemon X', 4, '2013-10-12', 10, 6, 34.99),
('Pokemon Y', 4, '2013-10-12', 10, 6, 34.99),
('Pokemon Omega Ruby', 4, '2014-11-21', 10, 5, 39.99),
('Luigis Mansion Dark Moon', 1, '2013-03-24', 10, 4, 29.99),
('Pokemon Sun', 4, '2016-11-18', 10, 5, 29.99),
('Pokemon Moon', 4, '2016-11-18', 10, 5, 29.99),
('Super Mario 3D Land', 2, '2011-11-03', 10, 6, 24.99),

-- PS1
('Gran Turismo', 10, '1997-12-23', 11, 5, 24.99),
('Final Fantasy VII', 4, '1997-01-31', 11, 3, 69.99),
('Crash Bandicoot', 14, '1996-09-09', 11, 6, 29.99),
('Resident Evil 2', 7, '1998-01-21', 11, 4, 49.99),
('Tony Hawks Pro Skater 2', 11, '2000-09-20', 11, 5, 34.99),

-- PS2
('GTA San Andreas', 1, '2004-10-26', 12, 8, 24.99),
('Gran Turismo 3', 10, '2001-04-28', 12, 5, 14.99),
('GTA Vice City', 1, '2002-10-29', 12, 6, 19.99),
('Kingdom Hearts', 4, '2002-03-28', 12, 4, 29.99),
('Shadow of the Colossus', 1, '2005-10-18', 12, 3, 39.99),

-- PS3
('GTA V', 1, '2013-09-17', 13, 6, 19.99),
('The Last of Us', 1, '2013-06-14', 13, 5, 19.99),
('Uncharted 3', 1, '2011-11-01', 13, 4, 14.99),
('LittleBigPlanet', 14, '2008-10-27', 13, 5, 12.99),
('Call of Duty Modern Warfare 2', 8, '2009-11-10', 13, 7, 14.99),
('Minecraft: PlayStation 3 Edition', 9, '2013-12-18', 13, 6, 24.99),

-- PSP
('GTA Liberty City Stories', 1, '2005-10-24', 14, 5, 24.99),
('GTA Vice City Stories', 1, '2006-10-31', 14, 4, 34.99),
('Monster Hunter Freedom Unite', 4, '2008-03-27', 14, 4, 29.99),
('God of War Chains of Olympus', 1, '2008-03-04', 14, 3, 39.99),
('Persona 3 Portable', 4, '2009-11-01', 14, 2, 119.99),

-- PS Vita
('Minecraft', 9, '2014-10-14', 15, 6, 19.99),
('Uncharted Golden Abyss', 1, '2011-12-17', 15, 3, 29.99),
('Persona 4 Golden', 4, '2012-06-14', 15, 3, 89.99),

-- Xbox
('Halo 1', 8, '2001-11-15', 16, 5, 19.99),
('Forza Motorsport', 10, '2005-05-03', 16, 4, 14.99),
('Halo 2', 8, '2004-11-09', 16, 6, 24.99),
('Halo Combat Evolved', 8, '2001-11-15', 16, 4, 24.99),
('Fable', 4, '2004-09-14', 16, 3, 19.99),

-- Xbox 360
('Kinect Adventures', 11, '2010-11-04', 17, 9, 9.99),
('GTA V (360)', 1, '2013-09-17', 17, 5, 19.99),
('Halo 3', 8, '2007-09-25', 17, 6, 14.99),
('Skyrim', 4, '2011-11-11', 17, 5, 19.99),
('Forza Horizon', 10, '2012-10-23', 17, 4, 24.99),

-- Master System
('Alex Kidd in Miracle World', 14, '1986-11-01', 18, 3, 44.99),
('Sonic the Hedgehog', 14, '1991-10-25', 18, 4, 34.99),
('Wonder Boy III', 2, '1989-01-01', 18, 2, 59.99),

-- Genesis
('Sonic the Hedgehog', 14, '1991-06-23', 19, 6, 19.99),
('Sonic the Hedgehog 2', 14, '1992-11-24', 19, 5, 24.99),
('Mortal Kombat', 1, '1993-09-13', 19, 4, 29.99),
('Streets of Rage 2', 1, '1992-12-20', 19, 3, 49.99),
('Golden Axe', 1, '1989-01-01', 19, 4, 24.99),

-- Saturn
('Virtua Fighter 2', 1, '1994-12-01', 20, 2, 69.99),
('Sega Rally Championship', 10, '1994-12-29', 20, 3, 54.99),
('Daytona USA', 10, '1995-04-01', 20, 3, 49.99),

-- Dreamcast
('Sonic Adventure', 14, '1998-12-23', 21, 5, 39.99),
('Crazy Taxi', 10, '2000-01-24', 21, 4, 34.99),
('Shenmue', 1, '1999-12-29', 21, 2, 89.99),
('Jet Set Radio', 1, '2000-06-29', 21, 3, 64.99),
('SoulCalibur', 1, '1999-08-03', 21, 4, 44.99),

-- Game Gear
('Sonic the Hedgehog 2', 14, '1992-11-21', 22, 4, 29.99),
('Columns', 3, '1990-01-01', 22, 5, 14.99),
('Sonic Chaos', 14, '1993-10-25', 22, 3, 34.99);