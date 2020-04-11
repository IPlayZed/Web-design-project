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
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta keywords="CSS,wiki,learning,general,description"/>
        <meta name="description" content="CSS wiki"/>

        <title>A "nagy" CSS wiki</title>
        
        <link rel="stylesheet" type="text/css" href="../css/base.css"/>
        <link rel="stylesheet" type="text/css" href="../css/personalrepo.css">
        
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

            <div class="flex-row-container responsive">
                <aside class="flex-column-container">
                    <h1>Kapcsolódó weblapok</h1>
                    <ul>
                        <li><a href="https://en.wikipedia.org/wiki/Cascading_Style_Sheets" target="_blank">A CSS Wikipádia oldala</a></li>
                    </ul>
                </aside> 

                <main class="flex-column-container">
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