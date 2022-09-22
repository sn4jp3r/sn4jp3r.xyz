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
    
    <title>SN4JP3R - Rejestracja</title> 
</head>
<body id="dbLogin">
    <div id="dbAuth" class="dbAuth__login">
        <form accept-charset="utf-8" method="post" action="signup.php">
            <div class="dbAuth__logo">
                <img src="assets/img/dbLogo__black.png" alt="dottbuff.eu">
            </div>

            <?php if (isset($_GET['error'])) { ?>
                <div class="dbAlert dbAlert__danger">
                    <div class="errors" role="alert">
                        <i class="bx bxs-error icon"></i><?php echo $_GET['error']; ?> 
                    </div>
                </div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <div class="dbAlert dbAlert__success">
                    <div class="success" role="alert">
                        <i class="bx bxs-error icon"></i><?php echo $_GET['success']; ?> 
                    </div>
                </div>
            <?php } ?>

            <div class="dbAuth__pad">
                <ul class="dbAuth__form">
                    <li class="dbAuth__form--row">
                        <div class="dbAuth__form--row__content">
                            <input type="text" class="form-control form-control-user" id="name" name="fname"
                                placeholder="Nazwa użytkownika (min. 3 znaki)" value="" required="">
                        </div>
                    </li>
                    <li class="dbAuth__form--row">
                        <div class="dbAuth__form--row__content">
                            <input type="email" class="form-control form-control-user" id="email" name="uname"
                                placeholder="Adres email" value="" required="">
                        </div>
                    </li>
                    <li class="dbAuth__form--row">
                        <div class="dbAuth__form--row__content">
                            <input type="password" class="form-control form-control-user" id="password" name="pass"
                                placeholder="Hasło  (min. 6 znaków)" required="">
                        </div>
                    </li>
                    <!-- <li class="dbAuth__form--row">
                        <div class="dbAuth__form--row__content">
                            <input type="password" class="form-control form-control-user" id="confpassword"
                                name="confpassword" placeholder="Powtórz hasło" required="">
                        </div>
                    </li> -->
                    <li class="dbAuth__form--row">
                        <div class="dbAuth__form--row__content">
                            <button type="submit" name="submit">
                                <i class="fa-solid fa-door-open"></i> Zarejestruj się </button>
                        </div>
                    </li>
                </ul>
                <p>Posiadasz już konto? <a href="index.php">Zalgouj się!</a></p>
            </div>
        </form>
    </div>
</body>

</html>