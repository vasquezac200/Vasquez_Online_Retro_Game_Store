document.addEventListener('DOMContentLoaded', function() {
    searchGames();
    gameInfo()  });



function searchGames(event) {
window.searchGames = function searchGames(event) {
            event.preventDefault();

            const searchValue = document.getElementById("searchInput").value;

            window.location.href = "searchgames.php?keyword=" + encodeURIComponent(searchValue);
        }
    };


function gameInfo(event, gameId) 
{
window.gameInfo = function gameInfo(event, gameId) {
    event.preventDefault();
    window.location.href = "gameinfo.php?gameId=" + encodeURIComponent(gameId);
}
}

if (localStorage.getItem("isloggedIn") === "true") 
{
    // Hides login and signin buttons 
    document.getElementById("loginTabButton").style.display = "none";
    document.getElementById("signinTabButton").style.display = "none";

    // Shows logged in account buttons
    document.getElementById("ordersTabButton").style.display = "block";
    document.getElementById("myCartTabButton").style.display = "block";
    document.getElementById("myAccountTabButton").style.display = "block";


} 
else 
{
    // Shows login and signin buttons 
    document.getElementById("loginTabButton").style.display = "block";
    document.getElementById("signinTabButton").style.display = "block";

    // Hides logged in account buttons
    document.getElementById("ordersTabButton").style.display = "none";
    document.getElementById("myCartTabButton").style.display = "none";
    document.getElementById("myAccountTabButton").style.display = "none";
}

