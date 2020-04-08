<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Börcsök Balázs Róbert,Illés Árpád"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <!--A viewport szélességét az eszköz képernyőszélességnek állítja be, 1-szeres nagyítás.-->
        <meta keywords="CSS,wiki,learning,general,description"/>
        <meta name="description" content="CSS wiki"/>

        <title>Profil</title>
        
        <link rel="stylesheet" type="text/css" href="../css/base.css">
        <link rel="stylesheet" type="text/css" href="../css/reg.css"/>
        <link rel="stylesheet" type="text/css" href="../css/profile.css"/>      

        <link rel="icon" type="image/png" href="../media/icons/Logo.png"/>

        <style></style>
        <script></script>     
    </head>

    <body>
        <div class="flex-column-container">
                
                <header id="top"> <!--Főcím-->
                        A &quot;nagy&quot; CSS wiki: Profilom
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
                        <li><a href="https://en.wikipedia.org/wiki/Cascading_Style_Sheets">A CSS Wikipédia oldala</a></li>
                    </ul>
                </aside>

                <main class="flex-column-container">
                    <div class="flex-row-container" id="responsive">
                        <div class="flex-column-comtainer">
                            <img src="../media/pictures/default_avatar.png" id="avatar" alt="usr img"> <!--profilképnek hely -->
                        </div>
                        <div class="flex-column-container">
                            <h2>Saját adataim</h2>
                            <p><b>Felhasználónév:</b> "user"</p>
                            <p><b>Név:</b> "Firstname Lastname"</p>
                            <p><b>Szül. Dátum:</b> "XXXX.XX.XX"</p>
                            <p><b>Nem:</b> "igen"</p>
                        </div>
                    </div>
                    <div class="flex-column-container">
                        <h3>Hasznos linkek</h3>
                        <a href="">Saját oldal létrehozása</a></li><br>
                        <a href="">Saját oldal</a></li><br>
                        <a href="">Látogatott linkek</a></li><br>
                        <a href="">Jelszó változtatás</a></li><br>
                    </div>
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