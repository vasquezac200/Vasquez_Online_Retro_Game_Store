# Vasquez Retro Game Store
![VRGS Logo](logo.svg)

A PHP and MySQL web application for browsing, searching, and viewing retro video games. The project was built for a database course and runs locally through XAMPP.

## Features

- Retro game storefront homepage
- Game catalog grouped by platform families
- Game search by keyword
- Individual game information pages
- User sign-up and login pages
- Shared navigation that changes based on login state
- MySQL database scripts for schema, seed data, views, procedures, functions, triggers, and events

## Tech Stack

- PHP
- MySQL / MariaDB
- HTML
- CSS
- JavaScript
- XAMPP

## Project Structure

```text
vasquezrgs/
+-- SQLScripts/
|   +-- Step1_CreateDatabase.sql
|   +-- Step2_CreateTables.sql
|   +-- Step3_AddData.sql
|   +-- Step4_CreateViews.sql
|   +-- Step5_CreateProcedures&Functions.sql
|   +-- Step6_CreateTriggers&Events.sql
+-- serverTest.php #The global server for this project.
+-- index.html
+-- signin.html
+-- signin.php
+-- login.html
+-- login.php
+-- games.php
+-- searchgames.php
+-- gameinfo.php
+-- profile.php
+-- logout.php
+-- cart.php
+-- cartProcess.php #Backend PHP file that adds an item from the cart.
+-- removeItemFromCart.php #Backend PHP file that removes an item from the cart.
+-- orderProcess.php
+-- orderHistory.php
+-- index.js #The only global Javascript file that controls some of the front end.
+-- style.css #The global stylist for the website.
+-- logo.svg #The vector image of the website logo.
+-- icon.ico #The website's icon.
+-- icon.svg #The website's icon as PNG format.
+-- package.json
+-- package-lock.json
```

## Setup

1. Install and open XAMPP.
2. Start Apache and MySQL from the XAMPP control panel.
3. Place this folder inside:

```text
C:\Users\aidan\Desktop\xampp\htdocs\vasquezrgs
```

4. Open phpMyAdmin or another MySQL client.
5. Run the SQL files in this order:

```text
SQLScripts/Step1_CreateDatabase.sql
SQLScripts/Step2_CreateTables.sql
SQLScripts/Step3_AddData.sql
SQLScripts/Step4_CreateViews.sql
SQLScripts/Step5_CreateProcedures&Functions.sql
SQLScripts/Step6_CreateTriggers&Events.sql
```

6. Check the database connection settings in `serverTest.php`:

```php
$db_server = "localhost";
$db_user = "root";
$db_password = "Password9999";
$db_schema = "retro_game_store";
```

Update the username or password if your local XAMPP MySQL settings are different.

7. Visit the site in your browser:

```text
http://localhost/vasquezrgs/
```

## Main Pages

- `index.html` - homepage and game search entry point
- `games.php` - catalog page with game listings
- `searchgames.php` - keyword search results
- `gameinfo.php` - details for a selected game
- `signin.html` / `signin.php` - account creation
- `login.html` / `login.php` - login flow
- `profile.php` - account/profile page

## Database Objects

The database is named `retro_game_store` and includes tables for:

- `users`
- `games`
- `genres`
- `platforms`
- `orders`
- `orderItems`

The SQL scripts also define:

- `game_information` view
- `last_in_stock_games` view
- procedures for updating game prices and quantities
- functions for finding game and user IDs
- triggers that prevent negative game prices
- an event intended to clean up old orders

Note: `Step6_CreateTriggers&Events.sql` references an `audit_log` table in the cleanup event. If you use that event, make sure an `audit_log` table exists or update the event.

## Notes

- The project is designed to run through Apache/PHP in XAMPP, not by opening files directly from the filesystem.
- Login state is currently handled on the frontend with `localStorage`.
- The included `node_modules` and `package.json` are not required for the main PHP storefront pages unless you are adding Node-based tooling.
