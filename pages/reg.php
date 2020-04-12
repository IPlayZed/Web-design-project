<?php 
    if (!isset($_SESSION)) {
        session_start();
    } 
    set_include_path("../php");
    include_once("Account.php");
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Börcsök Balázs Róbert,Illés Árpád"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <!--A viewport szélességét az eszköz képernyőszélességnek állítja be, 1-szeres nagyítás.-->
        <meta keywords="CSS,wiki,learning,general,description"/>
        <meta name="description" content="CSS wiki"/>

        <title>Regisztráció</title>
        
        <link rel="stylesheet" type="text/css" href="../css/base.css">
        <link rel="stylesheet" type="text/css" href="../css/reg.css"/>
        
        <link rel="icon" type="image/png" href="../media/icons/Logo.png"/>

        <style>
        </style>
        <script></script>     
    </head>

    <body>
        <div class="flex-column-container">
                
                <header id="top"> <!--Főcím-->
                        A &quot;nagy&quot; CSS wiki: Regisztráció
                </header> 
                    
                <nav> <!--Menü-->
                        <ul class="flex-row-container">
                            <li><a href="home.php#top">Kezdőlap</a></li>
                            <li><a href="animations.php#top">Animációk</a></li>
                            <?php
                                if(isset($_SESSION["username"])) {
                                    echo "<li><a href=\"personalrepo.php#top\">Saját gyűjtemény</a></li>";                           
                                    echo "<li><a href=\"profile.php#top\">Profilom</a></li>";
                                }
                                else {
                                    echo "<li><a href=\"reg.php#top\">Regisztráció</a></li>";
                                }
                            ?>
                        </ul>
                </nav>
            </div>

            <div class="flex-row-container responsive">
                <aside class="flex-column-container"> <!--Hasznos linkek az adott oldalhoz-->
                    <h1>Kapcsolódó weblapok</h1>
                    <ul>
                        <li><a href="https://en.wikipedia.org/wiki/Cascading_Style_Sheets" target="_blank">A CSS Wikipádia oldala</a></li>
                        <li><a href="login.php#top">Van fiókod? Bejelentkezés</a></li>
                    </ul>
                </aside>
                <main class="flex-column-container flex-pf-center">
                        <form class="flex-column-container" method="POST">
                            <label for="email">E-mail<br>
                                <input type="email" id="email" name="email" placeholder="user@email.com" required></label>
                            <label for="usr">Felhasználónév<br>
                                <input type="text" id="usr" name="usr" placeholder="Felhasználónév" required></label>
                            <label for="pwd">Jelszó<br>
                                <input type="password" id="pwd" name="pwd" placeholder="password" required></label>
                            <label for="pwd_again">Jelszó újra<br>
                                <input type="password" id="pwd_again" name="pwd_again" placeholder="password" required></label>
                            <label for="date">Születési dátum<br>
                                <input type="date" name="date" placeholder="01/01/2020" min="1900-01-01" required></label>
                            <label for="gender">Neme<br>
                                <select id="gender" name="gender">
                                    <option value="not_set">Nincs megadva</option>
                                    <option value="male">Férfi</option>
                                    <option value="female">Nő</option>
                                </select><hr>
                            </label>
                            <div id="div_button" class="flex-row-container">
                                <button type="submit" value="Submit" name="submit">Elfogad</button>
                                <button type="cancel" value="Reset" name="reset">Mégse</button>
                            </div>
                            <?php
                            //Mivel regisztrálni csak akkor tud, ha még nincs bejelentkezve, így ebben az esetben elég ilyenkor beolvasni.
                            //Létrehozok egy tömböt, megnyitom a felhasználói adatokat eltároló fájlt és kiolvasom belőle soronként 
                            //a szöveget temporális változókban, kreálok egy új bejegyzést a konstruktorral a tömbben és növelem az indexet.                        
                                $accounts = [];
                                $readDB=fopen("../data/accounts.txt","r") or die("Could not open DB for read!");
                                $i=0;
                                while(!feof($readDB)) {
                                    $tempEmail=fgets($readDB);
                                    $tempUsername=fgets($readDB);
                                    $tempPassword=fgets($readDB);
                                    $tempBorn=fgets($readDB);
                                    $tempGender=fgets($readDB);
                                    $accounts[$i]=new Account(trim($tempEmail),trim($tempUsername),trim($tempPassword),trim($tempBorn),trim($tempGender));
                                    $i++;
                                }
                                $currentindex=count($accounts)-1;

                                /*var_dump($accounts[0]->getUsername());
                                var_dump($accounts[1]->getUsername());
                                var_dump($accounts[0]->getUsername()==$accounts[1]->getUsername());*/
                                if (isset($_POST["submit"])) {   //ha nem fut le, akkor nincs deklaráció                             
                                    $email = $_POST["email"];
                                    $username = $_POST["usr"];
                                    $password = $_POST["pwd"];
                                    $password_again = $_POST["pwd_again"];
                                    $born = date("d/m/Y", strtotime($_POST["date"]));
                                    $gender = $_POST["gender"];
                                    
                                    if ($password !== $password_again) {
                                        die("A jelszavak nem egyeznek!");
                                    }

                                    foreach ($accounts as $account) {
                                        //$corrigated_username=$username." ";
                                        $current=$account->getUsername();
                                        echo "corrigate_username: "; var_dump($username); echo "<br>";
                                        echo "account_getusername: "; var_dump($current); echo "<br>";
                                        var_dump($current == $username); echo "<br>";              
                                        if ($account->getUsername() == $username) {
                                            die("<div class=\"reg-failed\">A $username felhasználónév már foglalt!</div>");
                                        }
                                    }

                                    if ($gender==="not_set") {
                                        echo "Nem nincs megadva, egyes funkciók lehet, hogy nem lesznek elérhetőek!<br/>";
                                    }
                                
                                //Ha minden rendben van, akkor új bejegyzés létrehozása a tömbben.
                                $accounts[$currentindex]=new Account($email,$username,$password,$born,$gender);
                                
                                //Fájl megnyitása, ahova kiíratom.
                                $accountDB=fopen("../data/accounts.txt","a") or die("Can't open users DB!");
                                
                                //A fájl végéhez csatolás
                                //var_dump($accounts[$arrlength-1]);
                                $accounts[$currentindex]->writeToFile($accountDB); //Beleírja a fájlba
                                
                                //A sor hossza megnőtt.
                                $arrlength=count($accounts);
                                
                                //A felhasználó mostmár felismert.
                                $_SESSION["username"]=$username;
                                /*echo "Visszairányítás a kezdőlapra 3 másodpercen belül.";
                                header('Refresh: 3; URL=home.php#top');*/
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