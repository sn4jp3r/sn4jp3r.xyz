<?php 
    include "db_conn.php";
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
    <link rel="stylesheet" href="assets/css/todo.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!----===== FontAwesome CSS ===== -->
    <link href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" rel="stylesheet">
    
    <title>SN4JP3R.xyz</title> 
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
                    <a href="profil.php">

                        <i class='bx bxs-user icon' ></i>
                        <span class="text nav-text">Profil</span>
                    </a>
                </li>
                <li class="">
                    <a href="logout.php">
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
        <div class="snContent__title">
            <h2>Do Zrobienia</h2>
        </div>

        <div class="main-section">
            <div class="add-section">
                <form action="app/add.php" method="POST" autocomplete="off">
                    <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                        <input type="text" 
                            name="title" 
                            style="border-color: #ff6666"
                            placeholder="To pole jest wymagane" />
                    <button type="submit">Dodaj  <i class='bx bxs-message-square-add icon' ></i></button>

                    <?php }else{ ?>
                    <input type="text" 
                            name="title" 
                            placeholder="Co chciałbyś zrobić ?" />
                    <button type="submit">Dodaj  <i class='bx bxs-message-square-add icon' ></i></button>
                    <?php } ?>
                </form>
            </div>
            <?php
                $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
            ?>
                <div class="show-todo-section">
                    <?php if($todos->rowCount() <= 0){ ?>
                    <div class="todo-item">
                    <div class="empty">
                        <img src="assets/img/f.png" width="100%" />
                        <img src="assets/img/Ellipsis.gif" width="80px">
                    </div>
                    </div>
                </div>
            <?php } ?>   
            
            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>Utworzono: <?php echo $todo['date_time'] ?></small> 
                </div>
            <?php } ?>

        </div>

        <!-- <footer id="snFooter">
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
         </footer> -->
    </div>




    <script src="assets/js/script.js"></script>
    
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>