<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    set_include_path("../php");
    require_once("Account.php");

    require_once("redirect_known.php");
    require_once("fun_redirect_to_home.php");
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Börcsök Balázs Róbert,Illés Árpád"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta keywords="CSS,wiki,learning,general,description"/>
        <meta name="description" content="CSS wiki"/>

        <title>Bejelentkezés</title>
        
        <link rel="stylesheet" type="text/css" href="../css/base.css"/>
        <link rel="stylesheet" type="text/css" href="../css/reg.css"/>
        
        <link rel="icon" type="image/png" href="../media/icons/Logo.png"/>

        <style></style>
        <script></script>     
    </head>

    <body>
        <div class="flex-column-container">
                
                <header id="top"> <!--Főcím-->
                        A &quot;nagy&quot; CSS wiki: kezdőlap
                </header> 
                    
                <nav> <!--Menü-->
                        <ul class="flex-row-container">
                            <li><a href="home.php#top">Kezdőlap</a></li>
                            <li><a href="animations.php#top">Animációk</a></li>
                            <?php require_once("modify_navbar.php"); ?>
                        </ul>
                </nav>

            <div class="flex-row-container responsive">
                <aside class="flex-column-container">
                    <h1>Kapcsolódó weblapok</h1>
                    <ul>
                        <li><a href="https://en.wikipedia.org/wiki/Cascading_Style_Sheets" target="_blank">A CSS Wikipádia oldala</a></li>
                        <li><a href="reg.php#top">Nincs fiókod? Bejelentkezés</a></li>
                    </ul>
                </aside> 

                <main class="flex-column-container">
                    <form method="POST">
                        <label for="usrlogin">Felhasználónév<br/>
                            <input type="text" id="usr" name="userlogin" placeholder="Felhasználónév" required>
                        </label><br/>
                        <label for="pwdlogin">Jelszó<br/>
                            <input type="password" id="pwd" name="pwdlogin" placeholder="password" required><br/>
                        </label> <br/>
                        <div id="div_button" class="flex-row-container">
                            <button type="submit" value="SubmitLogin" name="SubmitLogin">Belépés</button>
                            <button type="cancel" value="Reset" name="reset">Mégse</button>
                        </div>
                        <?php
                            if(isset($_POST["SubmitLogin"])) {
                                $username=$_POST["userlogin"];
                                $password=$_POST["pwdlogin"];
                                
                                require_once("build_accounts_array.php");

                                $recognized=false;
                                foreach ($accounts as $account) {             
                                    if ($account->getUsername()==$username and $account->getPassword()==$password) {
                                        $recognized=true;
                                        break;
                                    }
                                }

                                if($recognized==true) {
                                    echo "<div class=\"php-announcement\">Szia $username!</div>";
                                    redirect_to_home();
                                    $_SESSION["username"]=$username;
                                }
                                if($recognized==false) {
                                    echo "<div class=\"php-error-announcement\">Ilyen felhasználónév-jelszó páros nincs!";
                                    unset($username);
                                    unset($password);
                                }
                            }
                        ?>
                    </form>
                </main>
            </div>
            
            <footer>
                <div class="flex-column-container">
                    <div>
                        <div id="footer-left">Készítette: Illés Árpád és Börcsök Balázs Róbert</div>
                        <div id="footer-right">A "nagy" CSS wiki&copy;</div>
                    </div>
                </div>

                <div class="flex-row-container">
                    Social media:
                        <a href="https://github.com/IPlayZed?tab=repositories" target="_blank" class="tooltip flex-row-container">
                            <img src="../media/pictures/borcsokbalazsrobert_stackoverflow_profile.jpg" alt="Börcsök Balázs Róbert: StackOverflow" >
                            <span class="tooltip-text">GitHub</span>
                        </a>
                </div>
            </footer>

        </div>  
    </body>
    
</html>