<?php 
    if (!isset($_SESSION)) {
        session_start();
    } 
    set_include_path("../php");
    require_once("Account.php");

    require_once("redirect_unknown.php");
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Börcsök Balázs Róbert,Illés Árpád"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <!--A viewport szélességét az eszköz képernyőszélességnek állítja be, 1-szeres nagyítás.-->
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
                            <li><a href="personalrepo.php#top">Saját gyűjtemény</a></li>
                            <li id="current"><a href="profile.php#top">Profilom</a></li>
                        </ul>
                </nav>

            <div class="flex-row-container responsive">
                <aside class="flex-column-container">
                    <h1>Kapcsolódó weblapok</h1>
                    <ul>
                        <li><a href="https://en.wikipedia.org/wiki/Cascading_Style_Sheets">A CSS Wikipédia oldala</a></li>
                        <li><a href="../php/logout.php">Kijelentkezés</a></li>
                    </ul>
                </aside>

                <main class="flex-column-container">
                    <div class="flex-row-container" id="responsive">
                        <div>
                            <?php
                                if(file_exists("../data/profilepics/".$_SESSION["username"].".jpg")) {
                                    $profilepath="../data/profilepics/".$_SESSION["username"].".jpg";
                                }
                                else if(file_exists("../data/profilepics/".$_SESSION["username"].".png")) { 
                                    $profilepath="../data/profilepics/".$_SESSION["username"].".png";
                                }
                                else if(file_exists("../data/profilepics/".$_SESSION["username"].".jpeg")) {
                                    $profilepath="../data/profilepics/".$_SESSION["username"].".jpeg";
                                }
                                else{
                                    $profilepath="../data/profilepics/default_avatar.png";
                                }
                                echo "<img src=\"$profilepath\" id=\"avatar\" alt=\"user image\">";
                            ?>
                        </div>
                        <div class="flex-column-container">
                            <h1>Saját adataim</h1>
                            <p><b>Felhasználónév:</b><?php echo $_SESSION["username"] ?></p>
                        </div>
                    </div>
                    <form method="POST" enctype="multipart/form-data" class="flex-row-container">
                        <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
                        <input type="file" name="image" accept="image/*">
                        <input type="submit" name="Upload" value="feltoltes">
                        <?php
                            if(isset($_POST["Upload"])) {
                                print_r($_FILES);
                                $valid_ext=["jpg", "jpeg", "png"];
                                $ext=pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);

                                if(in_array($ext,$valid_ext)) {
                                    if($_FILES["image"]["error"]===0) {
                                        if($_FILES["image"]["error"]<200000000) {
                                            $dir_dest="../data/profilepics/". $_SESSION["username"]. ".". $ext;
                                            move_uploaded_file($_FILES["image"]["tmp_name"], $dir_dest);
                                            echo "A feltöltés sikeres volt!<br/>";
                                        }
                                        else {
                                            echo "Maxmimum 200 MB méretű lehet a feltölteni kívánt fájl!";
                                        }
                                    }
                                    else {
                                        echo "Valami hiba történt feltöltés közben, próbálja újra! <br/>";
                                    }
                                }
                                else {
                                    echo "Csak a .jpg, .jpeg és .png fájlkiterjesztések elfogadhatóak! <br/>";
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