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
        <link rel="stylesheet" href="assets/css/obfuscator.css">

        <!----===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

        <!----===== FontAwesome CSS ===== -->
        <link href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" rel="stylesheet">

        <title>SN4JP3R.xyz</title>

        <script src="assets/js/obf.js"></script>

        <script>if (!sessionStorage.getItem("_swa") && document.referrer.indexOf(location.protocol + "//" + location.host) !== 0) { fetch("https://counter.dev/track?" + new URLSearchParams({ referrer: document.referrer, screen: screen.width + "x" + screen.height, user: "mlodyr.xyz", utcoffset: "1" })) }; sessionStorage.setItem("_swa", "1");</script>
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
                                <i class='bx bxs-home icon'></i>
                                <span class="text nav-text">Strona Główna</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="statystyki.php">
                                <i class='bx bxs-bar-chart-alt-2 icon'></i>
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
                                <i class='bx bxs-file-plus icon'></i>
                                <span class="text nav-text">Lista Licencji</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="zdjecia.php">
                                <i class='bx bxs-image icon'></i>
                                <span class="text nav-text">Zdjęcia</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="download.php">
                                <i class='fa-solid fa-download icon'></i>
                                <span class="text nav-text">Pobieranie</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="obf.php">
                                <i class='fa-solid fa-file-lock icon'></i>
                                <span class="text nav-text">Obfuscator</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="cfx.php">
                                <i class='fa-solid fa-radar icon'></i>
                                <span class="text nav-text">CFX-Finder</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="https://discord.gg/KHq8kRusmA">
                                <i class='bx bxl-discord-alt icon'></i>
                                <span class="text nav-text">Discord</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <li class="">
                        <a href="profil.php">

                            <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">Profil</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="logout.php">
                            <i class='bx bxs-log-out icon'></i>
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

            <section class="hero">
                <h1 class="title">Obfuscator</h1>
                <p>Stworzony wyłącznie dla FiveM'a jednak jest to bardzo proste zabezpieczenie, możliwe do odkodowania</br>Wystarczy, ze wybierzesz plik .lua, lub .txt i klikniesz przyciska zaszyfruj a strona zrobi reszte za ciebie</p>
            </section>
                <section class="section">
                    <div class="container">
                                <div class="form">
                                    <div class="field">
                                        <label class="label">Wybierz plik:</label>
                                        <div class="control">
                                            <div class="file has-name">
                                                <label class="file-label">
                                                    <input class="file-input" type="file" accept=".lua,.txt" id="file">
                                                    <span class="file-cta"><span class="file-icon"><svg class="svg-inline--fa fa-upload fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="upload" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                                                                </path>
                                                            </svg></span><span class="file-label">Wybierz...</span></span>
                                                    <span class="file-name" id="file-name">Brak wybranego pliku.</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="checkbox">
                                        Byte Code
                                        <input type="checkbox" id="bytecode"> </label>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <button class="button is-link is-medium" id="encrypt" ><span class="file-icon"><svg class="svg-inline--fa fa-download fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                            </svg></span> Zaszyfruj</button>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </section>

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
        <script src="assets/js/obf2.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>