
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="assets/css/login.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>SN4JP3R - Strona logowania</title> 
</head>
<body>

    <body id="dbLogin">
        <div id="dbAuth" class="dbAuth__login">
        <form accept-charset="utf-8" method="post" action="login.php">
            <div class="dbAuth__logo">
                <img src="assets/img/dbLogo__black.png" alt="dottbuff.eu">
            </div>
            <?php if (isset($_GET['error'])) { ?>
                <div class="dbAlert dbAlert__danger">
                    <i class="bx bxs-error icon"></i><?php echo $_GET['error']; ?>    
                </div>
            <?php } ?>
            <div class="dbAuth__pad">
                <ul class="dbAuth__form">
                    
                    

                    <input type="hidden" name="csrf_test_name" value="e609db99c4f2148ac2aacfe74d1b28f1">
                    <li class="dbAuth__form--row">
                        <div class="dbAuth__form--row__content">
                            <input type="email" class="form-control form-control-user" name="uname" id="email" placeholder="Adres email" value="">
                        </div>
                    </li>
                    <li class="dbAuth__form--row">
                        <div class="dbAuth__form--row__content">
                        <input type="password" class="form-control form-control-user" name="pass" id="password" placeholder="Hasło">
                        </div>
                    </li>
                    <li class="dbAuth__form--row">
                        <div class="dbAuth__form--row__content">
                        <button data-sitekey="6LdzUAYfAAAAACbbePRKCfY_p-aU1ByhgxuBwwdb" type="submit" name="submit">
                        <i class="fa-solid fa-lock"></i> Zaloguj się </button>
                        </div>
                    </li>
                </ul>
                <p>Nie posiadasz konta? <a href="register.php">Zarejestruj się!</a></p>
            </div>
        </form>
    </div>
</body>
</html>