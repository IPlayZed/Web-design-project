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

        <style></style>
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
                            <li><a href="personalrepo.php#top">Saját gyűjtemény</a></li> <!--Majd itt lehet kiválasztani a sütikbe elmentett animációkat/stílusokat.-->
                            <li><a href="profile.php#top">Profilom</a></li>
                        </ul>
                </nav>
            </div>

            <div class="flex-row-container responsive">
                <aside class="flex-column-container">
                    <h1>Kapcsolódó weblapok</h1>
                    <ul>
                        <li><a href="https://en.wikipedia.org/wiki/Cascading_Style_Sheets" target="_blank">A CSS Wikipádia oldala</a></li>
                    </ul>
                </aside>
                <main>
                    <form class="flex-column-container flex-pf-center" action="profile.php" method="POST"> <!-- php -->
                        <label for="email">E-mail<br>
                            <input type="email" id="email" name="email" value="E-mail" required></label>
                        <label for="usr">Felhasználónév<br>
                            <input type="text" id="usr" name="usr" value="Felhasználónév" required></label>
                        <label for="pw">Jelszó<br>
                            <input type="password" id="pwd" name="pwd" value="" required></label>
                        <label for="pwd_again">Jelszó újra<br>
                            <input type="password" id="pwd_again" name="pwd" value="" required></label>
                        <label for="date">Születési dátum<br>
                            <input type="date" name="date" value="" min="1900-01-01"></label>
                        <label for="gender">Neme<br>
                            <select id="gender" name="gender">
                                <option value="male">Férfi</option>
                                <option value="female">Nő</option>
                                <option value="helo">Helikopter</option>
                                <option value="train">Tehervonat</option>
                            </select><hr>
                        </label>
                        <div id="div_button" class="flex-row-container">
                            <button type="submit" value="Elfogad" name="elkuld">Elfogad</button>
                            <button type="reset" value="Reset">Mégse</button>
                        </div>

                        <?php //lecsekkolom h minden mező ki van e töltve
                            if (isset($_GET["elkuld"])!=true) {
                                echo "Nem töltötte ki helyesen az űrlapot!";
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