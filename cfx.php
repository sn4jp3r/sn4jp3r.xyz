<?php 
    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/cfx.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!----===== FontAwesome CSS ===== -->
    <link href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" rel="stylesheet">
    
    <title>SN4JP3R.xyz</title> 


    <script>
        (function (root, factory) { if (typeof define === 'function' && define.amd) { define([], factory); } else if (typeof module === 'object' && module.exports) { module.exports = factory(); } else { root.ping = factory(); }
        }(this, function () {
            /**
             * @param  {String} url
             * @return {Promise}
             * 
             */
            function request_image(url) {
                return new Promise(function(resolve, reject) {
                    var img = new Image();
                    img.onload = function() { resolve(img); };
                    img.onerror = function() { reject(url); };
                    img.src = url + '?random-no-cache=' + Math.floor((1 + Math.random()) * 0x10000).toString(16);
                });
            }
            /**
             * @param  {String} url
             * @param  {Number} multiplier
             * @return {Promise}
             */
            function ping(url, multiplier) {
                return new Promise(function(resolve, reject) {
                    var start = (new Date()).getTime();
                    var response = function() { 
                        var delta = ((new Date()).getTime() - start);
                        delta *= (multiplier || 1);
                        resolve(delta); 
                    };
                    request_image(url).then(response).catch(response);
                    
                    setTimeout(function() { reject(Error('Timeout')); }, 5000);
                });
            }
            return ping;
        }));

        var do_ping = function() {
            ping(document.getElementById('playersJson').value).then(function(delta) {
                //document.getElementById('ilePing').innerHTML = "Server ping: " + delta + "ms";
            }).catch(function(error) {
                alert(String(error));
            });
        };
    </script>
</head>
<body onload='enableDarkMode()'>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="assets/img/logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">SN4JP3R</span>
                    <span class="profession">Development</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="dashboard.php">
                            <i class='bx bxs-home icon' ></i>
                            <span class="text nav-text">Strona Główna</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="statystyki.php">
                            <i class='bx bxs-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Statystyki</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="powiadomienia.php">
                            <i class='bx bxs-bell icon'></i>
                            <span class="text nav-text">Powiadomienia</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="license/list.php">
                            <i class='bx bxs-file-plus icon' ></i>
                            <span class="text nav-text">Lista Licencji</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="zdjecia.php">
                            <i class='bx bxs-image icon' ></i>
                            <span class="text nav-text">Zdjęcia</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="download.php">
                            <i class='fa-solid fa-download icon' ></i>
                            <span class="text nav-text">Pobieranie</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="obf.php">
                            <i class='fa-solid fa-file-lock icon' ></i>
                            <span class="text nav-text">Obfuscator</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="cfx.php">
                            <i class='fa-solid fa-radar icon' ></i>
                            <span class="text nav-text">CFX-Finder</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="https://discord.gg/KHq8kRusmA">
                            <i class='bx bxl-discord-alt icon' ></i>
                            <span class="text nav-text">Discord</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="../profil.php">

                        <i class='bx bxs-user icon' ></i>
                        <span class="text nav-text">Profil</span>
                    </a>
                </li>
                <li class="">
                    <a href="../logout.php">
                        <i class='bx bxs-log-out icon' ></i>
                        <span class="text nav-text">Wyloguj</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bxs-moon icon moon'></i>
                        <i class='bx bxs-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Light mode</span>

                    <div id="toggle-switch" class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>

    <div class="snContent">
        
		<div class="form__group field">
			<input type="text" id="visualzCfx" class="form__field" placeholder="wpisz link serwera" required />
            <label for="name" class="form__label">Wpisz Link cfx.re</label>
		</div>

		<button class="snContent__button" id="visualzBtn" onclick="do_ping()">Szukaj</button>

        <div class="box">
			<div class="ServerName" id="serverName">Server Name:</div>
			<div id="serverGamebuild">Gamebuild:</div>
			<div id="serverPlayers">Players:</div>
			<div id="serverOnesync">Onesync:</div>
			<div id="serverAddress">Server Ip Address:</div>
			<!-- Się wyjebało i nie działa
			<div id="ilePing">Server ping: </div> 
			-->
			<div id="playersJson">Players json:</div>
			<div id="dynamicJson">Dynamic json:</div>
			<div id="infoJson">Info json:</div>
			<div id="serverCountry">Country:</div>
			<div id="serverISP">ISP:</div>
			<div id="serverOwner">Owner Profile:</div>
			<div id="ping"></div>
	    </div>

        <footer id="snFooter">
            <span class="snFooter__copyright">
                Powered
            <i class="fa-solid fa-heart"></i>
                by
            <a href="https://sn4jp3r.pl" alt="sn4jp3r.pl">sn4jp3r.xyz</a>
            <br>
                Copyright ©
            <a href="https://sn4jp3r.pl" alt="sn4jp3r.pl">sn4jp3r.xyz</a>
                All Rights Reserved.
            </span>
         </footer>
    </div>




    <script src="assets/js/script.js"></script>
    <script src="assets/js/cfx2.js"></script>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>